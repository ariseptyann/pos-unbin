<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Models\HomeModel;

class Home extends BaseController
{
    public $model;

    public function __construct()
    {
        $this->model = new HomeModel();
    }

    public function index()
    {
        $data['product'] = $this->model->getProductToday()->getResult();
        // echo '<pre>';print_r($cek);exit;
        return view('backend/home', $data);
    }
}
