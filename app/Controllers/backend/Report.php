<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Models\ReportModel;

class Report extends BaseController
{
    public $model;

    public function __construct()
    {
        $this->model = new ReportModel();
    }

    public function index()
    {
        if (!$this->request->getVar('start_date')) {
            return view('backend/report/index');
        }

        $data['report'] = $this->model->getData($this->request->getVar('start_date'), $this->request->getVar('finish_date'))->getResult();
        // echo '<pre>';print_r($data);exit;
        return view('backend/report/index', $data);
    }
}
