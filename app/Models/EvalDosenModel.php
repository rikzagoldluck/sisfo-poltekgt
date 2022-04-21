<?php

namespace App\Models;

use CodeIgniter\Model;

class EvalDosenModel extends Model
{
    protected $table = 'evaluasidosen';
    protected $allowedFields = ['id', 'nama', 'mk', 'tahun', 'nim'];


    public function __construct()
    {
        $this->makeColumn(11, 'a');
        $this->makeColumn(9, 'b');
        $this->makeColumn(4, 'c');
        $this->makeColumn(6, 'd');
    }

    private function makeColumn($jml, $huruf)
    {
        for ($i = 1; $i <= $jml; $i++) {
            array_push($this->allowedFields, $huruf . $i);
        }
    }
}
