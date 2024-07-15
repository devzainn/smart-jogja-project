<?php

namespace App\Controllers\AdminController;

use App\Controllers\BaseController;
use App\Models\CriteriaModel;
use App\Models\IndicatorModel;
use CodeIgniter\HTTP\ResponseInterface;

class CriteriaController extends BaseController
{
    public function index()
    {
        $criteriaModel = new CriteriaModel();

        $criteria = $criteriaModel->getCriteriaWithNormalizedWeight();

        $groupedCriteria = [];
        foreach ($criteria as $criterion) {
            $groupedCriteria[$criterion['indicator_name']][] = $criterion;
        }

        $data['groupedCriteria'] = $groupedCriteria;

        return view('admin/kriteria/v_list_criteria', $data);
    }

    public function formCriteria()
    {
        $indicatorModel = new IndicatorModel();
        $data['indicators'] = $indicatorModel->getIndicators();
        return view('admin/kriteria/v_form_create_criteria',$data);
    }

    public function store()
    {
        $criteriaModel = new CriteriaModel();

        $data = [
            'indicator_id' => $this->request->getPost('indicator_id'),
            'name' => $this->request->getPost('name'),
            'weight' => $this->request->getPost('weight'),
        ];

        $criteriaModel->save($data);

        $criteriaModel->getCriteriaWithNormalizedWeight();

        return redirect()->to('/list-criteria');
    }

    public function edit($id)
    {
        $criteriaModel = new CriteriaModel();
        $indicatorModel = new IndicatorModel();

        $data['criteria'] = $criteriaModel->find($id);
        $data['indicators'] = $indicatorModel->getIndicators();

        return view('admin/kriteria/v_form_edit_criteria', $data);
    }

    public function update($id)
    {
        $criteriaModel = new CriteriaModel();

        $data = [
            'indicator_id' => $this->request->getPost('indicator_id'),
            'name' => $this->request->getPost('name'),
            'weight' => $this->request->getPost('weight'),
            'normalized_weight' => $this->request->getPost('normalized_weight'),
        ];

        $criteriaModel->update($id, $data);

        $criteriaModel->getCriteriaWithNormalizedWeight();

        return redirect()->to('/list-criteria');
    }

    public function delete($id)
    {
        $criteriaModel = new CriteriaModel();
        $criteriaModel->delete($id);

        $criteriaModel->getCriteriaWithNormalizedWeight();

        return redirect()->to('/list-criteria');
    }
}
