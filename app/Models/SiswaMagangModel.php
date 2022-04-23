<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaMagangModel extends Model
{
    protected $DBGroup = 'absen';
    protected $table = 'datasiswa';
    protected $primaryKey = 'nim';
    // protected $allowedFields = ['nim', 'nama', 'password', 'jeniskelamin', 'programstudi', 'tempatlahir', 'tanggallahir', 'tahunmasuk', 'status',    'pembimbing'];

}
