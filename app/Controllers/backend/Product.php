<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\CategoryModel;

class Product extends BaseController
{
    public $model;
    public $output = [
        'sukses'    => false,
        'pesan'     => '',
        'data'      => []
    ];

    public function __construct()
    {
        $this->model = new ProductModel();
    }

    public function index()
    {
        $data['products'] = $this->model->getProduct()->getResult();
        return view('backend/product/index', $data);
    }

    public function create()
    {
        $category           = new CategoryModel();
        $data['categorys']  = $category->getCategory()->getResult();
        return view('backend/product/create', $data);
    }

    public function store()
    {

        if ($this->request->isAJAX()) {
            $image      = $this->request->getFile('image');
            $fileName   = $image->getClientName();

            $data = [
                'category_id'   => $this->request->getVar('category_id'),
                'name'          => $this->request->getVar('name'),
                'sku'           => $this->request->getVar('sku'),
                'unit'          => $this->request->getVar('unit'),
                'image'         => $fileName,
                'stok'          => $this->request->getVar('stok'),
                'price_buy'     => $this->request->getVar('price_buy'),
                'price_sell'    => $this->request->getVar('price_sell'),
                'discount'      => $this->request->getVar('discount'),
                'description'   => $this->request->getVar('description')
            ];

            $simpan = $this->model->saveProduct($data);
            $image->move(ROOTPATH . 'public/uploads/product/', $fileName);
            if ($simpan) {
                $this->output['sukses'] = true;
            }

            echo json_encode($this->output);
            // echo '<pre>';print_r($data);exit;
        }
    }

    public function edit($id)
    {
        $category           = new CategoryModel();
        $data['categorys']  = $category->getCategory()->getResult();
        $data['product']    = $this->model->getProductById($id)->getRow();
        return view('backend/product/edit', $data);
    }

    public function update()
    {
        if ($this->request->isAJAX()) {

            if (!empty($this->request->getFile('image')->getClientName())) {
                $image      = $this->request->getFile('image');
                $fileName   = $image->getClientName();
                $data = [
                    'category_id'   => $this->request->getVar('category_id'),
                    'name'          => $this->request->getVar('name'),
                    'sku'           => $this->request->getVar('sku'),
                    'unit'          => $this->request->getVar('unit'),
                    'image'         => $fileName,
                    'stok'          => $this->request->getVar('stok'),
                    'price_buy'     => $this->request->getVar('price_buy'),
                    'price_sell'    => $this->request->getVar('price_sell'),
                    'discount'      => $this->request->getVar('discount'),
                    'description'   => $this->request->getVar('description')
                ];
                $image->move(ROOTPATH . 'public/uploads/product/', $fileName);
            }else{
                $data = [
                    'category_id'   => $this->request->getVar('category_id'),
                    'name'          => $this->request->getVar('name'),
                    'sku'           => $this->request->getVar('sku'),
                    'unit'          => $this->request->getVar('unit'),
                    'stok'          => $this->request->getVar('stok'),
                    'price_buy'     => $this->request->getVar('price_buy'),
                    'price_sell'    => $this->request->getVar('price_sell'),
                    'discount'      => $this->request->getVar('discount'),
                    'description'   => $this->request->getVar('description')
                ];
            }

            $id     = $this->request->getVar('product_id');
            $simpan = $this->model->updateProduct($data, $id);
            if ($simpan) {
                $this->output['sukses'] = true;
                $this->output['data']   = $data;
            }

            echo json_encode($this->output);
        }
    }

    public function delete()
    {
        if ($this->request->isAJAX()) {
            $hapus = $this->model->deleteProduct($this->request->getVar('id'));
            if ($hapus) {
                $this->output['sukses'] = true;
            }

            echo json_encode($this->output);
        }
    }
}
