<?php

namespace App\Controllers;

require ROOTPATH . 'vendor/autoload.php';

use App\Models\NilaiModel;
use GoogleSearch as GlobalGoogleSearch;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            "title" => "Homepage",
            "results" => ''
        ];
        return view('index', $data);
    }

    public function error()
    {
        $data = [
            "title" => "404"
        ];
        return view('errors/_404', $data);
    }

    public function get_nilai_top($prodi, $tahun)
    {
        $nilaiModel = new NilaiModel();

        $sql = "SELECT NIM, nama, akademik FROM nilai WHERE prodi = ? AND tahunmasuk = ? ORDER BY akademik DESC LIMIT 3";
        $top3 = $nilaiModel->query($sql, [$prodi, $tahun]);
        return json_encode(array('status' => 'ok', 'data' => $top3->getResultArray()));
    }

    public function cari_jurnal()
    {

        $query = [
            "engine" => "google_scholar",
            "q" => $this->request->getVar('searchbar-jurnal'),
            "hl" => "en",
            "lr" => "lang_id"
        ];


        $search = new GlobalGoogleSearch('f66667854b04476a980ddd655345d125c47d63c1bcd0b04fc08f76fa8aee477f');


        $results = $search->get_json($query);

        if ($results->search_metadata->status != "Success") {
            $results = json_decode('{
                "title" : "",
                "link" : "",
                "snippet" : "",
                "publication_info": {
                    "summary": "A Cano-Marquina, JJ Tarín, A Cano - Maturitas, 2013 - Elsevier",
                },
            }');
            return view('index', ['results' => $results, 'title' => 'Homepage']);
        }

        return view('index', ['results' => $results, 'title' => 'Homepage']);
    }
}
