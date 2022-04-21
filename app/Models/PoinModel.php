<?php

namespace App\Models;

use CodeIgniter\Model;

class PoinModel extends Model
{
    protected $table = 'logkondite';
    protected $allowedFields = ['jenispoin', 'poin', 'keterangan', 'tanggal'];

    public function getPoin($nim = '1902039')
    {
        return $this->where(['NIM' => $nim])->orderBy('tanggal', 'desc')->findAll();
    }

    public function getPoinByJenis($nim = '1902039', $jenispoin)
    {
        $poins = $this->where(['NIM' => $nim, 'jenispoin' => $jenispoin])->findAll();
        $poinTotal = 0;
        foreach ($poins as $poin) {
            $poinTotal += intval($poin['poin']);
        }
        return $poinTotal;
    }
}
