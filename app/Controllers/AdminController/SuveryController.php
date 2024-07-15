<?php

namespace App\Controllers\AdminController;

use App\Controllers\BaseController;
use App\Models\CriteriaModel;
use App\Models\RespondentModel;
use App\Models\ResponseModel;
use App\Models\SubCriteriaModel;
use CodeIgniter\HTTP\ResponseInterface;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class SuveryController extends BaseController
{
    public function index()
    {
        $responseModel = new ResponseModel();
        $data['responses'] = $responseModel->getAllResponse();
        $data['title'] = 'List Respondents';
        return view('admin/survey/v_list_data_survey',$data);
    }

    public function responsesByQuality($quality)
    {
        $responseModel = new ResponseModel();
        $data['responses'] = $responseModel->where('quality', $quality)->getAllResponse();
        $data['title'] = ucfirst(str_replace('-', ' ', $quality)) . ' Responses';
        return view('admin/survey/v_list_data_survey', $data);
    }

    public function formSurvey()
    {
        return view('admin/survey/v_form_create_survey');
    }

    public function showSurveyForm()
    {
        $criteriaModel = new CriteriaModel();
        $subCriteriaModel = new SubCriteriaModel();

        $criteria = $criteriaModel->findAll();
        $subCriteria = $subCriteriaModel->findAll();

        $groupedSubCriteria = [];
        foreach ($subCriteria as $sub) {
            $groupedSubCriteria[$sub['criteria_id']][] = $sub;
        }

        return view('nonadmin/v_survey', [
            'criteria' => $criteria,
            'groupedSubCriteria' => $groupedSubCriteria
        ]);
    }

    public function submitResponse()
    {
        $respondentModel = new RespondentModel();
        $responseModel = new ResponseModel();
        // $responseDetailModel = new ResponseDetailModel();
        $subCriteriaModel = new SubCriteriaModel();
        $criteriaModel = new CriteriaModel();

        $respondentData = [
            'name' => $this->request->getPost('name'),
            'nik' => $this->request->getPost('nik'),
            'address' => $this->request->getPost('address'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone')
        ];

        $respondentModel->insert($respondentData);
        $respondent_id = $respondentModel->getInsertID();

        $responseData = [
            'respondent_id' => $respondent_id,
            'response_date' => date('Y-m-d H:i:s')
        ];

        $responseModel->insert($responseData);
        $response_id = $responseModel->getInsertID();

        $subCriteriaResponses = $this->request->getPost('sub_criteria');

        $totalNormalizedWeight = 0;
        $totalUtilityScore = 0;

        foreach ($subCriteriaResponses as $criteria_id => $sub_criteria_id) {
            $subCriteria = $subCriteriaModel->find($sub_criteria_id);
            $utility_score = $subCriteria['utility_score'];

            $subCriteriaList = $subCriteriaModel->where('criteria_id', $criteria_id)->findAll();
            $utility_scores = array_column($subCriteriaList, 'utility_score');
            $min_utility_score = min($utility_scores);
            $max_utility_score = max($utility_scores);

            $survey_result = ($utility_score - $min_utility_score) / ($max_utility_score - $min_utility_score);

            // Simpan ke detail response
            $responseDetailData = [
                'response_id' => $response_id,
                'sub_criteria_id' => $sub_criteria_id,
                'survey_result' => $survey_result
            ];

            // $responseDetailModel->insert($responseDetailData);

            $criteria = $criteriaModel->find($criteria_id);
            $normalized_weight = $criteria['normalized_weight'];

            $totalNormalizedWeight += $normalized_weight;

            $totalUtilityScore += $survey_result * $normalized_weight;
        }

        $quality = '';
        $totalUtilityScore = $totalUtilityScore / $totalNormalizedWeight;

        if ($totalUtilityScore >= 0 && $totalUtilityScore <= 0.39) {
            $quality = 'Belum Memuaskan';
        } elseif ($totalUtilityScore >= 0.4 && $totalUtilityScore <= 0.59) {
            $quality = 'Cukup Memuaskan';
        } elseif ($totalUtilityScore >= 0.6 && $totalUtilityScore <= 1) {
            $quality = 'Memuaskan';
        }

        $responseModel->update($response_id, [
            'survey_result' => $totalUtilityScore,
            'quality' => $quality
        ]);

        return redirect()->to('/thankyou');
    }

    public function generateReport()
    {
        $responseModel = new ResponseModel();
        $responses = $responseModel->getAllResponse();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'Respondent Name');
        $sheet->setCellValue('B1', 'Response Date');
        $sheet->setCellValue('C1', 'Survey Result');
        $sheet->setCellValue('D1', 'Quality');

        $row = 2;
        foreach ($responses as $response) {
            $sheet->setCellValue('A' . $row, $response['respondent_name']);
            $sheet->setCellValue('B' . $row, $response['response_date']);
            $sheet->setCellValue('C' . $row, $response['survey_result']);
            $sheet->setCellValue('D' . $row, $response['quality']);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'survey_report.xlsx';
        
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '"'); 
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit();
        return redirect()->to('/dashboard');
    }
}
