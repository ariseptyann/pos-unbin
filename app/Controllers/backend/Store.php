<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Models\StoreModel;

class Store extends BaseController
{
    public $model;
    public $output = [
        'sukses'    => false,
        'pesan'     => '',
        'data'      => []
    ];

    public function __construct()
    {
        $this->model = new StoreModel();
    }

    public function index()
    {
        $data['stores'] = $this->model->getStore()->getResult();
        return view('backend/store/index', $data);
    }

    public function create()
    {
        return view('backend/store/create');
    }

    public function save()
    {
        if ($this->request->isAJAX()) {
            $logo       = $this->request->getFile('logo');
            $fileName   = $logo->getClientName();

            $data = [
                'name'      => $this->request->getVar('name'),
                'logo'      => $fileName,
                'address'   => $this->request->getVar('address'),
                'about'     => $this->request->getVar('about')
            ];

            $simpan = $this->model->saveStore($data);
            $logo->move(ROOTPATH . 'public/uploads/store/', $fileName);
            if ($simpan) {
                $this->output['sukses'] = true;
            }

            echo json_encode($this->output);
            // echo '<pre>';print_r($data);exit;
        }
    }

    public function edit($id)
    {
        $data['store'] = $this->model->getStoreById($id)->getRow();
        return view('backend/store/edit', $data);
    }

    public function update()
    {
        if ($this->request->isAJAX()) {

            if (!empty($this->request->getFile('logo')->getClientName())) {
                $logo       = $this->request->getFile('logo');
                $fileName   = $logo->getClientName();

                $data = [
                    'name'      => $this->request->getVar('name'),
                    'logo'      => $fileName,
                    'address'   => $this->request->getVar('address'),
                    'about'     => $this->request->getVar('about')
                ];

                $logo->move(ROOTPATH . 'public/uploads/store/', $fileName);
            }else{
                $logo = $this->model->getStoreById($this->request->getVar('store_id'))->getRow();
                $data = [
                    'name'      => $this->request->getVar('name'),
                    'logo'      => $logo->logo,
                    'address'   => $this->request->getVar('address'),
                    'about'     => $this->request->getVar('about')
                ];
            }

            $id     = $this->request->getVar('store_id');
            $simpan = $this->model->updateStore($data, $id);
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
            $hapus = $this->model->deleteStore($this->request->getVar('id'));
            if ($hapus) {
                $this->output['sukses'] = true;
            }

            echo json_encode($this->output);
        }
    }
}
