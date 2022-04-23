<?php

namespace App\Models;

use CodeIgniter\Model;

class AbsenMagangModel extends Model
{
    protected $DBGroup = 'absen';
    protected $table = 'dataabsen';
    protected $allowedFields = ['NIM', 'NAMA', 'GROUP', 'PENEMPATAN', 'TANGGAL', 'MASUK', 'PULANG', 'GEOCODE', 'JARAK', 'KET'];
}
