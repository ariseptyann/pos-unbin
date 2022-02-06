<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class Login extends BaseController
{
    public function index()
    {
        return view('backend/login');
    }

    public function auth()
    {
        $session    = session();
        $model      = new UsersModel();
        $username   = $this->request->getVar('username');
        $password   = $this->request->getVar('password');
        $data       = $model->where('username', $username)->first();

        if($data){
            $pass = $data->password;
            $verify_pass = password_verify($password, $pass);
            // verifikasi password
            if($verify_pass){
                // set data ke session
                $ses_data = [
                    'user_id'       => $data->user_id,
                    'username'      => $data->username,
                    'name'          => $data->name,
                    'status'        => $data->status,
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);

                $session->setFlashdata('success', 'Anda berhasil login!');
                return redirect()->to('/backend/home/index');
            }else{
                $session->setFlashdata('error', 'Password Salah');
                return redirect()->to('/backend/login');
            }
        }else{
            $session->setFlashdata('error', 'Username & Password salah');
            return redirect()->to('/backend/login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/backend/login');
    }
}
