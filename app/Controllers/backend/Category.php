<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Models\CategoryModel;

class Category extends BaseController
{
    public $model;
    public $output = [
        'sukses'    => false,
        'pesan'     => '',
        'data'      => []
    ];

    public function __construct()
    {
        $this->model = new CategoryModel();
    }

    public function index()
    {
        $data['categorys'] = $this->model->getCategory()->getResult();
        return view('backend/category/index', $data);
    }

    public function create()
    {
        $data['parents'] = $this->model->getCategory()->getResult();
        return view('backend/category/create', $data);
    }

    public function store()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'parent_id'     => $this->request->getVar('parent_id'),
                'name'          => $this->request->getVar('name')
            ];

            $simpan = $this->model->saveCategory($data);
            if ($simpan) {
                $this->output['sukses'] = true;
            }

            echo json_encode($this->output);
            // echo '<pre>';print_r($data);exit;
        }
    }

    public function edit($id)
    {
        $data['category'] = $this->model->getCategoryById($id)->getRow();
        $data['parents'] = $this->model->getCategory()->getResult();
        return view('backend/category/edit', $data);
    }

    public function update()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'parent_id'     => $this->request->getVar('parent_id'),
                'name'          => $this->request->getVar('name')
            ];

            $id     = $this->request->getVar('category_id');
            $simpan = $this->model->updateCategory($data, $id);
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
            $hapus = $this->model->deleteCategory($this->request->getVar('id'));
            if ($hapus) {
                $this->output['sukses'] = true;
            }

            echo json_encode($this->output);
        }
    }
}
