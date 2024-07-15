<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\RespondentModel;
use App\Models\ResponseModel;
use CodeIgniter\HTTP\ResponseInterface;

class AdminController extends BaseController
{
    public function index()
    {
        $data = [];
        return view('auth/v_auth', $data);
    }

    public function register()
    {
        $rules = [
            'username' => ['rules' => 'required|min_length[4]|max_length[100]'],
            'email' => ['rules' => 'required|min_length[4]|max_length[100]|valid_email'],
            'password' => ['rules' => 'required|min_length[8]|max_length[255]'],
        ];


        if ($this->validate($rules)) {
            $model = new AdminModel();
            $data = [
                'username'    => $this->request->getVar('username'),
                'email'    => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $model->save($data);
            return redirect()->to('/list-user');
        } else {
            echo "gagal";
        }
    }

    public function login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $adminModel = new AdminModel();

        $admin = $adminModel->where('username', $username)->first();

        if ($admin !== null) {
            if (password_verify($password, $admin['password'])) {
                $ses_data = [
                    'id' => $admin['id'],
                    'username' => $admin['username'],
                    'isLoggedIn' => TRUE
                ];
                session()->set($ses_data);
                return redirect()->to('/dashboard');
            } else {
                session()->setFlashdata('error', 'Invalid password.');
                return redirect()->to('/')->withInput();
            }
        } else {
            session()->setFlashdata('error', 'Username not found.');
            return redirect()->to('/')->withInput();
        }
    }

    public function logout()
    {
        $session = \Config\Services::session();
        $session->destroy();
        return redirect()->to('/');
    }

    public function dashboard()
    {
        $respondentModel = new RespondentModel();
        $responseModel = new ResponseModel();

        $totalRespondents = $respondentModel->countAllResults();

        $satisfactoryResponses = $responseModel->where('quality', 'Memuaskan')->countAllResults();
        $moderatelySatisfactoryResponses = $responseModel->where('quality', 'Cukup Memuaskan')->countAllResults();
        $unsatisfactoryResponses = $responseModel->where('quality', 'Belum Memuaskan')->countAllResults();

        $data = [
            'totalRespondents' => $totalRespondents,
            'satisfactoryResponses' => $satisfactoryResponses,
            'moderatelySatisfactoryResponses' => $moderatelySatisfactoryResponses,
            'unsatisfactoryResponses' => $unsatisfactoryResponses,
        ];

        return view('admin/dashboard/v_dashboard', $data);
    }

    public function guidline()
    {
        return view('admin/guidline/v_guidline');
    }
}
