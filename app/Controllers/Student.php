<?php

namespace App\Controllers;

use App\Models\EvalDosenModel;
use App\Models\NilaiModel;
use App\Models\NilaiPerMKModel;
use App\Models\StudentModel;
use App\Models\PoinModel;

class Student extends BaseController
{
    protected $session;
    protected $nim;

    public function __construct()
    {
        $this->session = session();
        $this->nim = $this->session->get('user_nim');
    }

    public function index()
    {
        $ip = new NilaiModel();
        $nilai = new NilaiPerMKModel();
        $data = [
            "title" => "Dashboard",
            "user_name" => $this->session->get('user_name'),
            "ip" => $ip->getNilai($this->nim),
            "nilai" => $nilai->getNilai($this->nim),
            "dash" => true
        ];
        return view('student/index', $data);
    }

    public function poin()
    {
        $poin = new PoinModel;
        $nim = $this->nim;
        $poins = $poin->getPoin($nim);
        $plusTotal = $poin->getPoinByJenis($nim, 'Plus');
        $minusTotal = $poin->getPoinByJenis($nim, 'Minus');

        $data = [
            "title" => "Poin",
            "plus" => $plusTotal,
            "minus" => $minusTotal,
            "poins" => $poins

        ];
        return view('student/poin', $data);
    }


    public function profil()
    {
        $student = new StudentModel();

        $data = [
            "title" => "Profil",
            "student" => $student->getStudent($this->nim)
        ];
        return view('student/profil', $data);
    }

    public function survey()
    {
        $mkModel = new NilaiPerMKModel();
        $nim = $this->nim;

        $sql = "SELECT namamk, dosen FROM nilaiakademik WHERE nim = ? AND status = 0";
        $result = $mkModel->query($sql, [$nim])->getResultArray();

        $data = [
            "title" => "Penilaian Dosen",
            "mk" => $result,
        ];
        return view('student/survey', $data);
    }

    public function insert_survey()
    {
        $evalDosen = new EvalDosenModel();
        $mkModel = new NilaiPerMKModel();

        $nim = $this->nim;
        $sql_getmktosend = "SELECT dosen as nama, tahunakademik as tahun, nim FROM nilaiakademik WHERE nim = ? AND namamk = ? LIMIT 1";

        $data = $this->request->getRawInput();
        $result = $mkModel->query($sql_getmktosend, [$nim, $data['mk']])->getRowArray();


        // dd(array_merge($result, $data));
        $sql_getdatalastid = "SELECT id FROM evaluasidosen  ORDER BY id DESC LIMIT 1";
        $last_id = $evalDosen->query($sql_getdatalastid)->getRowArray();

        $send = array_merge($result, $data);

        foreach ($last_id as $key) {
            $last_id['id'] += 1;
        }

        $data_push = array_merge($last_id, $send);

        // dd($data_push);

        try {
            $evalDosen->insert($data_push);
            $sql_toupdate = "UPDATE nilaiakademik SET status = 1 WHERE nim = ? AND dosen = ? AND namamk = ?";
            $mkModel->query($sql_toupdate, [$nim, $data_push['nama'], $data_push['mk']]);
            $this->session->setFlashdata('msg', 'Data Berhasil dikirim');
        } catch (\Exception $e) {
            $this->session->setFlashdata('msg', 'Something went wrong ' . $e);
        }

        $sql_getmktoview = "SELECT namamk, dosen FROM nilaiakademik WHERE nim = ? AND status = 0";
        $result = $mkModel->query($sql_getmktoview, [$nim])->getResultArray();

        $data = ["title" => "Penilaian Dosen", "mk" => $result];

        return view('student/survey', $data);
    }
    public function presensi_magang()
    {
        $student = new StudentModel();

        $data = [
            "title" => "Presensi Magang",
            // "student" => $student->getStudent($this->nim)
        ];
        return view('student/presensi-magang', $data);
    }
}
