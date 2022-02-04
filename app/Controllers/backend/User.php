<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class User extends BaseController
{
    public $model;
    public $output = [
        'sukses'    => false,
        'pesan'     => '',
        'data'      => []
    ];

    public function __construct()
    {
        $this->model = new UsersModel();
    }

    public function index()
    {
        $data['users'] = $this->model->getUser()->getResult();
        return view('backend/user/index', $data);
    }

    public function create()
    {
        return view('backend/user/create');
    }

    public function store()
    {
        //validasi
        // $rules = [
        //     'name'      => 'required',
        //     'username'  => 'required',
        //     'password'  => 'required'
        // ];

        if ($this->request->isAJAX()) {
            $data = [
                'status'    => 2,
                'name'      => $this->request->getVar('name'),
                'username'  => $this->request->getVar('username'),
                'password'  => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];

            $simpan = $this->model->saveUser($data);
            if ($simpan) {
                $this->output['sukses'] = true;
            }

            echo json_encode($this->output);
            // echo '<pre>';print_r($data);exit;
        }
    }

    public function edit($id)
    {
        $data['user'] = $this->model->getUserById($id)->getRow();
        return view('backend/user/edit', $data);
    }

    public function update()
    {
        if ($this->request->isAJAX()) {
            // jika password tidak kosong
            if (!empty($this->request->getVar('password'))) {
                $data = [
                    'name'      => $this->request->getVar('name'),
                    'username'  => $this->request->getVar('username'),
                    'password'  => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
                ];
            }else{
                $data = [
                    'name'      => $this->request->getVar('name'),
                    'username'  => $this->request->getVar('username'),
                ];
            }

            $id     = $this->request->getVar('user_id');
            $simpan = $this->model->updateUser($data, $id);
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
            $hapus = $this->model->deleteUser($this->request->getVar('id'));
            if ($hapus) {
                $this->output['sukses'] = true;
            }

            echo json_encode($this->output);
        }
    }
}
