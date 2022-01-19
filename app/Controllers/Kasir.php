<?php

namespace App\Controllers;
use App\Models\UsersModel;

class Kasir extends BaseController
{

    public function index()
    {
        return view('layouts/kasir/template');
    }

    public function login()
    {
        $users = new UsersModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $dataUser = $users->where([
            'username' => $username,
        ])->first();
        if ($dataUser) {
            if (password_verify($password, $dataUser->password)) {
                if ($dataUser->status == 2) {
                    session()->set([
                        'user_id' => $dataUser->user_id,
                        'username' => $dataUser->username,
                        'name' => $dataUser->name,
                        'logged_in' => TRUE
                    ]);
                    return redirect()->to('/kasir');
                } else {
                    session()->setFlashdata('error', 'Anda bukan kasir');
                    return redirect()->back();
                }
            } else {
                session()->setFlashdata('error', 'Username & Password Salah');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', 'Username & Password Salah');
            return redirect()->back();
        }
    }

    function logout()
    {
        session()->destroy();
        return redirect()->to('/kasir');
    }

    public function loadData()
    {
        return view('layouts/kasir/loadData');
    }

    public function db()
    {
        return \Config\Database::connect();
    }

    public function addCart()
    {
        $cashier_id = $this->request->getVar('cashier_id');
        $product_id = $this->request->getVar('product_id');
        $customer_id = $this->request->getVar('customer_id');
        $no_order = $this->request->getVar('no_order');

        $product = $this->db()->query("SELECT * FROM `products` WHERE `product_id` = '$product_id'")->getRow();
        if (empty($product)) {
            $st = 0;
        } else {

            $checkNoOrder = $this->db()->query("SELECT * FROM `carts` WHERE `cashier_id` != '$cashier_id' AND `no_order` = '$no_order'")->getRow();
            if (!empty($checkNoOrder)) {
                $st = 2;
            } else {

                $st = 1;
                $productCart = $this->db()->query("SELECT * FROM `carts` WHERE `cashier_id` = '$cashier_id' AND `no_order` = '$no_order' AND `product_id` = '$product_id'")->getRow();
                if (!empty($productCart)) {
                    $qty = $productCart->qty + 1;
                    $total = $qty * $productCart->price;
                    $this->db()->query("UPDATE `carts` SET
                        `qty` = '$qty',
                        `total` = '$total'
                        WHERE `cashier_id` = '$cashier_id' AND `customer_id` = '$customer_id' AND `product_id` = '$product_id' AND `no_order` = '$no_order'
                    ");
                } else {
                    $qty = 1;
                    if ($product->discount != NULL) {
                        $priceSell = $product->price_sell - $product->discount;
                    } else {
                        $priceSell = $product->price_sell;
                    }
                    
                    $total = $qty * $priceSell;
                    $this->db()->query("INSERT INTO `carts` (cashier_id,customer_id,product_id,no_order,qty,price,total) VALUES (
                        '$cashier_id',
                        '$customer_id',
                        '$product_id',
                        '$no_order',
                        '$qty',
                        '$priceSell',
                        '$total'
                    )");
                }

            }

        }
        
        $cart = $this->db()->query("SELECT COUNT(`cart_id`) AS `total_item`, SUM(`total`) AS `total_price` FROM `carts` WHERE `cashier_id` = '$cashier_id'")->getRow();
        echo json_encode(array(
            'st' => $st,
            'totalItem' => number_format($cart->total_item,0,'','.'),
            'totalPrice' => number_format($cart->total_price,0,'','.'),
        ));
        die();
    }

    public function deleteAllCart()
    {
        $cashier_id = $this->request->getVar('cashier_id');
        if (empty($cashier_id)) {
            $st = 0;
        } else {
            $st = 1;
            $this->db()->query("DELETE FROM `carts` WHERE `cashier_id` = '$cashier_id'");
        }
        echo json_encode(array(
            'st' => $st
        ));
        die();
    }

}
