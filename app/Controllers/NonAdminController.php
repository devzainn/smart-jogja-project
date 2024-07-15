<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\About;
use CodeIgniter\HTTP\ResponseInterface;

class NonAdminController extends BaseController
{
    public function index()
    {
        return view('nonadmin/v_home');
    }

    public function about()
    {
        $aboutModel = new About();
        $data['detail_about'] = $aboutModel->find(1)['detail_about'];
        return view('nonadmin/v_about', $data);
    }

    public function thankyou()
    {
        return view('nonadmin/v_thankyou');
    }

    public function guidline()
    {
        return view('nonadmin/v_guidline');
    }

    public function editAbout()
    {
        $aboutModel = new About();
        $data['detail_about'] = $aboutModel->find(1)['detail_about'];
        return view('admin/about/v_form_edit', $data);
    }

    public function updateAbout()
    {
        $aboutModel = new About();
        $newData = [
            'id' => 1,
            'detail_about' => $this->request->getPost('detail_about')
        ];
        $aboutModel->save($newData);
    
        session()->setFlashdata('success', 'Detail About berhasil diubah');
        return redirect()->to('/about/edit');
    }    
}
