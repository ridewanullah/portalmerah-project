<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\NewsKategoriModel;

class ApiKategori extends ResourceController
{
    use ResponseTrait;

    public function shortTitle($title, $limit)
    {
        if (str_word_count($title, 0) > $limit) {
            $words = str_word_count($title, 2);
            $pos   = array_keys($words);
            $title  = substr($title, 0, $pos[$limit]) . '...';
        }
        return $title;
    }

    public function filterTitle($title)
    {
        $result = [];
        foreach ($title as $data){
            try{
                $a = $this->shortTitle($data['artikel']['news_judul'], 7);
                array_push($result, $a);
            } catch(Exception $e){
                $a = $this->shortTitle($data['news_judul'], 7);
                array_push($result, $a);
            }
        }
        return $result;
    }

    public function show($id = 1)
    {
        $db      = \Config\Database::connect();
        $sql = 'SELECT tblberita.id_berita, tblberita.id_artikel, tblberita.id_kategori, tblartikel.*, tblnewskategori.id_kategori, tblnewskategori.kategori_nama
        FROM tblberita, tblartikel, tblnewskategori 
        WHERE tblberita.id_artikel = tblartikel.id_artikel AND tblberita.id_kategori = tblnewskategori.id_kategori AND tblberita.id_kategori = '.$id.' 
        ORDER BY tblartikel.created_at DESC';
        $query = $db->query($sql);

        $data = $query->getResult();
        for ($i=0; $i < count($data); $i++) {
            $data[$i]->news_judul = $this->shortTitle($data[$i]->news_judul, 6);
        }
        // $data[1]->news_judul = 'coba';
        // dd(count($data));
        // dd($data[1]->news_judul);

        return $this->respond($data);
    }
}
