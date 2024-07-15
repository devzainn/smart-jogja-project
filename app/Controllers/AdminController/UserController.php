<?php

namespace App\Controllers\AdminController;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use CodeIgniter\HTTP\ResponseInterface;

class UserController extends BaseController
{
    public function index()
    {
        $adminModel = new AdminModel();
        $data['admin'] = $adminModel->getAdmins();
        $data['username'] = session()->get('username');
        return view('admin/user/v_list_user', $data);
    }

    public function createuser()
    {
        return view('admin/user/v_form_create_user');
    }

    public function delete($id)
    {
        $userModel = new AdminModel();
        $userModel->delete($id);

        return redirect()->to('/list-user');
    }
}
