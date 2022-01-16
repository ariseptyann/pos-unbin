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

}
