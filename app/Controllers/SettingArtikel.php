<?php

namespace App\Controllers;

use CodeIgniter\Files\File;

class SettingArtikel extends Home
{
    public function dashboard()
    {
        $data = [
            'title' => 'Dashboard',
            'username' => user()->getUsername(),
        ];
        return view('author/dashboard', $data);
    }

    public function manage()
    {
        $data = [
            'title' => 'Manage Artikel',
            'username' => user()->getUsername()
        ];
        return view('author/manageArtikel', $data);
    }

    public function create_artikel()
    {
        $data = [
            'title' => 'Membuat Artikel',
            'dataNewsKategori' => $this->newsKategoriModel->findAll(),
            'username' => user()->getUsername(),
        ];
        return view('author/create_artikel', $data);
    }

    public function view_artikel()
    {
        $data = [
            'title' => 'Lihat Artikel',
        ];
        return view('author/view_artikel', $data);
    }

    public function insert_data_artikel()
    {
        if($this->request->getMethod() !== 'post') {
            return redirect()->to(base_url('author/create_artikel?msg=Method Salah'));
        }

        $validationRule = [
            'news_gambar' => [
                'label' => 'Image File',
                'rules' => 'uploaded[news_gambar]'
                    . '|is_image[news_gambar]'
                    . '|mime_in[news_gambar,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                    . '|max_size[news_gambar,2048]',
            ],
        ];

        if (! $this->validate($validationRule)) {
            $data = ['errors' => $this->validator->getErrors()];

            return redirect()->to(base_url('author/dashboard?msg=Format Salah'));
        }

        // $img = $this->request->getFile('news_gambar')->store();
        $img = $this->request->getFile('news_gambar');
        $img->move(WRITEPATH . '../public_html/assets/berita/images');
        // $filepath = base_url('public/berita/images') . '/' . $img->store();
        // $filepath = WRITEPATH . $img->store();

        $this->artikelModel->insert([
            'news_judul' => $this->request->getVar('news_judul'),
            'news_konten' => $this->request->getVar('news_konten'),
            'news_gambar' => 'assets/berita/images/' . $img->getName(),
        ]);

        $artikel_id = $this->artikelModel->getInsertID();
        $this->beritaModel->insert([
            'id_kategori' => $this->request->getVar('id_kategori'),
            'id_artikel' => $artikel_id,
            'id' => user_id()
        ]);

        // if (! $img->hasMoved()) {
        //     // $filepath = WRITEPATH . 'uploads/' . $img->store('images/');
        //     // $data = ['uploaded_flleinfo' => new File($filepath)];


        // }

        return redirect()->to('author/create_artikel');
    }

    public function getDataAll() {
        $data = [
            'title' => 'Manage Artikel',
            'data' => $this->merge_artikel_berita(),
            'username' => user()->getUsername()
        ];

        return view('author/manageArtikel', $data);
    }
}
