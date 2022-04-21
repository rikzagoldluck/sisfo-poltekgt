<?php

namespace App\Controllers;

use App\Models\NilaiPerMKModel;
use App\Models\StudentModel;

class Login extends BaseController
{
    protected $session;
    public function __construct()
    {
        $this->session = session();
    }
    public function index()
    {
        $data = [
            "title" => "Login"
        ];
        helper(['form']);
        return view('auth/login', $data);
    }

    public function auth()
    {
        // $session = session();
        $model = new StudentModel();
        $mkModel = new NilaiPerMKModel();
        $nim = htmlspecialchars($this->request->getVar('nim'));
        $password = htmlspecialchars($this->request->getVar('password'));
        $data = $model->where('nim', $nim)->first();


        $sql = "SELECT namamk, status FROM nilaiakademik WHERE nim = ? AND status = 0";
        $result = $mkModel->query($sql, [$nim])->getResultArray();

        $sql1 = "SELECT  kelas FROM nilaiakademik WHERE nim = ? ORDER BY id DESC LIMIT 1";
        $kelas = $mkModel->query($sql1, [$nim])->getResultArray();

        function cekStatusMk($array)
        {
            foreach ($array as $value) {
                if (!$value['status']) {
                    return false;
                }
            }
            return true;
        };

        $statusSurvey = cekStatusMk($result);

        if ($data) {
            $pass = $data['password'];
            $verify_pass = $password === $pass;
            if ($verify_pass) {
                $ses_data = [
                    'user_nim'      => $data['nim'],
                    'user_name'     => $data['nama'],
                    'user_jk'       => strtolower($data['jeniskelamin']),
                    'logged_in'     => ($data['status'] === 'Aktif' ? TRUE : FALSE),
                    'survey_filled' => $statusSurvey,
                    'user_kelas'    => $kelas[0]['kelas']
                ];


                $this->session->set($ses_data);
                return redirect()->to('/student');
            } else {
                $this->session->setFlashdata('msg', 'Password salah');
                return redirect()->to('/login');
            }
        } else {
            $this->session->setFlashdata('msg', 'NIM salah');
            return redirect()->to('/login');
        }
    }
    public function logout()
    {
        // $session = session();
        $this->session->destroy();
        return redirect()->to('/login');
    }
}
