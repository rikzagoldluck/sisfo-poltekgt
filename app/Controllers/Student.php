<?php

namespace App\Controllers;

use App\Models\AbsenMagangModel;
use App\Models\EvalDosenModel;
use App\Models\NilaiModel;
use App\Models\NilaiPerMKModel;
use App\Models\StudentModel;
use App\Models\PoinModel;
use App\Models\SiswaMagangModel;

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
        $student = new SiswaMagangModel();

        $nim = $this->nim;
        $data = [
            "title" => "Presensi Magang",
            "student" => $student->find($nim)
        ];

        if (!$data['student']) {
            return view('errors/_404_nim', ['title' => '404']);
        }

        // dd($data);
        return view('student/presensi-magang', $data);
    }

    public function insert_absen()
    {
        $absen_table = new AbsenMagangModel();
        $student = new SiswaMagangModel();

        $nim = $this->nim;
        $data1 = [
            "title" => "Presensi Magang",
            "student" => $student->find($nim)
        ];

        $data = $this->request->getRawInput();
        $time_now = date("H:i:s");

        if ($data['func'] === "PULANG") {
            $sql_pulang = 'UPDATE dataabsen SET PULANG = ' . $absen_table->escape($time_now) . ' WHERE NIM =  ' . $absen_table->escape($data['NIM']) . ' AND TANGGAL = ' . $absen_table->escape($data['TANGGAL']);
            $result = $absen_table->query($sql_pulang);

            if ($result) $this->session->setFlashdata('msg', 'Presensi pulang berhasil');
            else $this->session->setFlashdata('msg', 'Presensi pulang gagal');
        }

        if ($data['func'] === "Simpan") {
            $data['MASUK'] = $time_now;
            $data['PULANG'] = 'BP';

            if ($data['KET'] === 'H') {
                if (date('H') > 9) {
                    $data['KET'] = 'HT';
                }
            }

            $sql_cek = 'SELECT NIM, TANGGAL FROM dataabsen WHERE NIM = ' . $absen_table->escape($data['NIM']) . ' AND TANGGAL = ' . $absen_table->escape($data['TANGGAL']);
            $result = $absen_table->query($sql_cek)->getResultArray();


            if (count($result) > 0) {
                $this->session->setFlashdata('msg', 'Anda sudah melakukan presensi hari ini');
                return view('student/presensi-magang', $data1);
            }


            unset($data['func']);
            $absen_table->insert($data);
            $this->session->setFlashdata('msg', 'Presensi masuk berhasil');
        }
        // dd($data);
        return view('student/presensi-magang', $data1);
    }

    public function migrate()
    {
        $model = new AbsenMagangModel();
        $res = $model->findAll();
        $data = array("student" => $res);
        $url = 'https://script.google.com/macros/s/AKfycbzQYUPItoLv3cas2WfBYul6_XPby0xnHCma_2yQl-6mD-Au7mVByhi9AzUD0peCF1Zh/exec';

        $postdata = json_encode($data);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_MAXREDIRS, 1);
        curl_setopt($ch, CURLOPT_AUTOREFERER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        $result = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($result);
        if ($response->status === 'ok') {
            return json_encode(array("status" => "ok"));
        } else {
            return json_encode(array("status" => "gagal"));
        }
    }
}
