<?php

namespace App\Models;

use CodeIgniter\Model;

class NilaiModel extends Model
{
    protected $table = 'nilai';
    protected $allowedFields = ['NIM', 'nama',  'akademik1', 'akademik2', 'akademik3', 'akademik4', 'akademik5', 'akademik6', 'nilaitotal', 'prodi', 'tahunmasuk'];

    public function getNilai($nim = '1902039')
    {
        return $this->where(['NIM' => $nim])->first();
    }

    // public function getNilaiByProdiandTahun($prodi, $tahun)
    // {
    //     return $this->where(['prodi' => $prodi, 'tahunmasuk' => $tahun])->findAll(3);
    // }
}
