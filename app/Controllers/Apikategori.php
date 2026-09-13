<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\NewsKategoriModel;
use Exception;

class ApiKategori extends ResourceController
{
    use ResponseTrait;

    public function shortTitle($title, $limit)
    {
        if (str_word_count($title, 0) > $limit) {
            $words = str_word_count($title, 2);
            $pos   = array_keys($words);
            // Protect against out-of-bounds offset lookups safely
            if (isset($pos[$limit])) {
                $title = substr($title, 0, $pos[$limit]) . '...';
            }
        }
        return $title;
    }

    public function filterTitle($title)
    {
        $result = [];
        foreach ($title as $data){
            try {
                $a = $this->shortTitle($data['artikel']['news_judul'], 7);
                array_push($result, $a);
            } catch(Exception $e) {
                $a = $this->shortTitle($data['news_judul'], 7);
                array_push($result, $a);
            }
        }
        return $result;
    }

    public function show($segment = null, $id = null)
    {
        // 💡 THE FIX: If CodeIgniter passes "show" as the first argument, 
        // fall back to the second argument ($id). If both are empty, default to category 1.
        if (!is_numeric($segment)) {
            $categoryId = !empty($id) ? (int)$id : 1;
        } else {
            $categoryId = (int)$segment;
        }

        $db = \Config\Database::connect();
    
        $sql = 'SELECT 
                    tblberita.id_berita, 
                    tblberita.id_artikel, 
                    tblberita.id_kategori, 
                    tblartikel.*, 
                    tblnewskategori.kategori_nama
                FROM tblberita
                INNER JOIN tblartikel ON tblberita.id_artikel = tblartikel.id_artikel
                INNER JOIN tblnewskategori ON tblberita.id_kategori = tblnewskategori.id_kategori
                WHERE tblberita.id_kategori = ?
                ORDER BY tblartikel.created_at DESC';

        $query = $db->query($sql, [$categoryId]);
        $data  = $query->getResultArray();

        // Process short titles for the front-end display grid
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['news_judul'] = $this->shortTitle($data[$i]['news_judul'], 6);
        }

        return $this->respond($data);
    }
}
