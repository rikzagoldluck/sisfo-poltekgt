<?php

namespace App\Models;

use CodeIgniter\Model;

class NilaiPerMKModel extends Model
{
    protected $table = 'nilaiakademik';
    protected $allowedFields = ['akhir', 'huruf', 'namamk', 'sks', 'dosen', 'kelas', 'tahunakademik', 'statusmk'];

    public function getNilai($nim = '1902039')
    {
        return $this->where(['NIM' => $nim])->findAll();
    }
}
