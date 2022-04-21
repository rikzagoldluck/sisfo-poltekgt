<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{
    protected $table = 'mahasiswa';
    protected $allowedFields = ['nim', 'nama', 'password', 'jeniskelamin', 'programstudi', 'tempatlahir', 'tanggallahir', 'tahunmasuk', 'status',    'pembimbing'];

    public function getStudent($nim = '1902039')
    {
        return $this->where(['NIM' => $nim])->first();
    }
}
