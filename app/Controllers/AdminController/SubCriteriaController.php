<?php

namespace App\Controllers\AdminController;

use App\Controllers\BaseController;
use App\Models\CriteriaModel;
use App\Models\SubCriteriaModel;
use CodeIgniter\HTTP\ResponseInterface;

class SubCriteriaController extends BaseController
{
    public function index()
    {
        $subCriteriaModel = new SubCriteriaModel();

        $subCriterias = $subCriteriaModel->getAllSubCriteria();

        $groupedSubCriteria = [];
        foreach ($subCriterias as $subCriteria) {
            $groupedSubCriteria[$subCriteria['criteria_name']][] = $subCriteria;
        }

        $data['groupedSubCriteria'] = $groupedSubCriteria;

        return view('admin/sub-kriteria/v_list_sub_criteria', $data);
    }

    public function create()
    {
        $criteriaModel = new CriteriaModel();
        $data['criterias'] = $criteriaModel->findAll();
        return view('admin/sub-kriteria/v_form_create_sub_criteria', $data);
    }

    public function store()
    {
        $subCriteriaModel = new SubCriteriaModel();

        $data = [
            'criteria_id' => $this->request->getPost('criteria_id'),
            'name' => $this->request->getPost('name'),
            'utility_score' => $this->request->getPost('utility_score'),
        ];

        $subCriteriaModel->save($data);

        return redirect()->to('/list-sub-criteria');
    }

    public function edit($id)
    {
        $subCriteriaModel = new SubCriteriaModel();
        $criteriaModel = new CriteriaModel();

        $data['subcriteria'] = $subCriteriaModel->find($id);
        $data['criterias'] = $criteriaModel->findAll();

        return view('admin/sub-kriteria/v_form_edit_sub_criteria', $data);
    }

    public function update($id)
    {
        $subCriteriaModel = new SubCriteriaModel();
        $criteriaModel = new CriteriaModel();

        $data = [
            'criteria_id' => $this->request->getPost('criteria_id'),
            'name' => $this->request->getPost('name'),
            'utility_score' => $this->request->getPost('utility_score'),
        ];

        $subCriteriaModel->update($id, $data);

        $criteriaModel->getCriteriaWithNormalizedWeight();

        return redirect()->to('/list-sub-criteria');
    }
}
