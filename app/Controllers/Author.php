<?php

namespace App\Controllers;

use CodeIgniter\Files\File;

class Author extends Home
{
    public function dashboard()
    {
        $data = [
            'title' => 'Dashboard',
        ];
        return view('author/dashboard', $data);
    }

    public function profile_user()
    {
        $data = [
            'title' => 'Dashboard',
        ];
        return view('author/profile_user', $data);
    }

    public function profile_setting()
    {
        $data = [
            'title' => 'Dashboard',
        ];
        return view('author/profile_setting', $data);
    }

    public function save_profile()
    {
        $db      = \Config\Database::connect();
        $tblUsers = $db->table('users');

        if ($this->request->getMethod() !== 'post') {
            return redirect()->to(base_url() . '/author/profile_setting?msg=Method Salah');
        }

        // dd($tblUsers->where('id', $this->request->getVar('id_user'))->get()->getRow()->image);
        if (($this->request->getFile('profile_picture')->getSize() != 0) && ($tblUsers->where('id', $this->request->getVar('id_user'))->get()->getRow()->image != null)) {
            $validationRule = [
                'profile_picture' => [
                    'label' => 'Image File',
                    'rules' => 'uploaded[profile_picture]'
                        . '|is_image[profile_picture]'
                        . '|mime_in[profile_picture,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                        . '|max_size[profile_picture,2048]',
                ],
            ];

            if (!$this->validate($validationRule)) {
                $data = ['errors' => $this->validator->getErrors()];

                return redirect()->to(base_url() . 'author/dashboard?msg=Format Salah');
            }

            $data_file = $tblUsers->where('id', $this->request->getVar('id_user'))->get()->getRow()->image;
            unlink(WRITEPATH . '../public/' . $data_file);

            $img = $this->request->getFile('profile_picture');
            $img->move(WRITEPATH . '../public/assets/author/img');

            $dataUser = [
                'fullname' => $this->request->getVar('fullname'),
                'image' => 'assets/author/img/' . $img->getName(),
                'about' => $this->request->getVar('about_author'),
            ];

            $tblUsers->where('id', $this->request->getVar('id_user'))->update($dataUser);

            return redirect()->to(base_url() . '/author/profile_user');
        } elseif (($this->request->getFile('profile_picture')->getSize() != 0) && ($tblUsers->where('id', $this->request->getVar('id_user'))->get()->getRow()->image == null)) {
            $validationRule = [
                'profile_picture' => [
                    'label' => 'Image File',
                    'rules' => 'uploaded[profile_picture]'
                        . '|is_image[profile_picture]'
                        . '|mime_in[profile_picture,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                        . '|max_size[profile_picture,2048]',
                ],
            ];

            if (!$this->validate($validationRule)) {
                $data = ['errors' => $this->validator->getErrors()];

                return redirect()->to(base_url() . '/author/dashboard?msg=Format Salah');
            }

            $img = $this->request->getFile('profile_picture');
            $img->move(WRITEPATH . '../public/assets/author/img');

            $dataUser = [
                'fullname' => $this->request->getVar('fullname'),
                'image' => 'assets/author/img/' . $img->getName(),
                'about' => $this->request->getVar('about_author'),
            ];

            $tblUsers->where('id', $this->request->getVar('id_user'))->update($dataUser);

            return redirect()->to(base_url() . '/author/profile_user');
        } elseif (($this->request->getFile('profile_picture')->getSize() == 0) && ($tblUsers->where('id', $this->request->getVar('id_user'))->get()->getRow()->image != null) || (($this->request->getFile('profile_picture')->getSize() == 0) && ($tblUsers->where('id', $this->request->getVar('id_user'))->get()->getRow()->image == null))) {
            $dataUser = [
                'fullname' => $this->request->getVar('fullname'),
                'about' => $this->request->getVar('about_author'),
            ];

            $tblUsers->where('id', $this->request->getVar('id_user'))->update($dataUser);

            return redirect()->to(base_url() . '/author/profile_user');
        }
    }

    public function create_artikel_author()
    {
        $data = [
            'title' => 'Membuat Artikel',
            'dataNewsKategori' => $this->newsKategoriModel->findAll(),
        ];
        return view('author/artikel_create_author', $data);
    }

    public function save_create_artikel_author()
    {
        if ($this->request->getMethod() !== 'post') {
            return redirect()->to(base_url() . '/author/create_artikel?msg=Method Salah');
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

        if (!$this->validate($validationRule)) {
            $data = ['errors' => $this->validator->getErrors()];

            return redirect()->to(base_url() . 'author/dashboard?msg=Format Salah');
        }

        // $img = $this->request->getFile('news_gambar')->store();
        $img = $this->request->getFile('news_gambar');
        $img->move(WRITEPATH . '../public/assets/berita/images');
        // $filepath = base_url('public/berita/images') . '/' . $img->store();
        // $filepath = WRITEPATH . $img->store();

        $link = time();
        $link = date('', $link);
        $link .= '-' . $this->request->getVar('news_judul');
        $link = url_title($link);

        $this->artikelModel->insert([
            'link'        => $link,
            'news_judul'  => $this->request->getVar('news_judul'),
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

        return redirect()->to(base_url() . '/author/manage_artikel');
    }

    public function manage_artikel_author()
    {
        $db      = \Config\Database::connect();
        $sql = 'SELECT tblberita.id_berita, tblberita.id_artikel, tblberita.id_kategori, tblartikel.*, tblnewskategori.id_kategori, tblnewskategori.kategori_nama
        FROM tblberita, tblartikel, tblnewskategori 
        WHERE tblberita.id_artikel = tblartikel.id_artikel AND tblberita.id_kategori = tblnewskategori.id_kategori AND tblberita.id = ' . user()->id . ' ORDER BY tblartikel.created_at DESC';
        $query = $db->query($sql);

        $data = [
            'title' => 'Manage Artikel',
            'dataArtikel' => $query->getResult(),
        ];

        return view('author/artikel_manage_author', $data);
    }

    public function update_status_artikel_author($id)
    {
        $db      = \Config\Database::connect();
        $sql = 'SELECT tblberita.id, tblartikel.id_artikel FROM tblberita, tblartikel WHERE tblberita.id_artikel = tblartikel.id_artikel AND tblberita.id = ' . user()->id . ' AND tblartikel.id_artikel = ' . $id;
        // $sql = 'SELECT * FROM tblberita WHERE tblberita.id = 2';
        $query = $db->query($sql);

        if (count($query->getResult()) != 0) {
            if ($this->request->getVar('button_status') == 'OFF') {
                $data = [
                    'news_status' => 1,
                ];
                $this->artikelModel->update($id, $data);
            } else {
                $data = [
                    'news_status' => 0,
                ];
                $this->artikelModel->update($id, $data);
            }
            return redirect()->to(base_url() . '/author/manage_artikel');
        } else {
            return redirect()->to(base_url() . '/author/manage_artikel?msg=Tidak Memiliki Hak Akses!');
        }
    }

    public function update_artikel_author($id)
    {
        $db      = \Config\Database::connect();
        $sql = 'SELECT tblberita.id, tblartikel.* FROM tblberita, tblartikel WHERE tblberita.id_artikel = tblartikel.id_artikel AND tblberita.id = ' . user()->id . ' AND tblartikel.id_artikel = ' . $id;
        // $sql = 'SELECT * FROM tblberita WHERE tblberita.id = 2';
        $query = $db->query($sql);

        if (count($query->getResult()) != 0) {
            $db      = \Config\Database::connect();
            $tblBerita = $db->table('tblberita');

            $data = [
                'title' => 'Membuat Artikel',
                'dataArtikel' => $this->artikelModel->find($id),
                'dataBerita' => $tblBerita->where('id_artikel', $id)->get()->getRow(),
                'dataNewsKategori' => $this->newsKategoriModel->findAll(),
            ];

            return view('author/artikel_update_author', $data);
        } else {
            return redirect()->to(base_url() . '/author/manage_artikel?msg=Tidak Memiliki Hak Akses!');
        }
    }

    public function save_update_artikel()
    {
        $db      = \Config\Database::connect();
        $tblBerita = $db->table('tblberita');
        $tblArtikel = $db->table('tblartikel');

        if ($this->request->getMethod() !== 'post') {
            return redirect()->to(base_url() . '/author/create_artikel?msg=Method Salah');
        }

        if ((($this->request->getFile('news_gambar')->getSize() != 0) && ($tblArtikel->where('id_artikel', $this->request->getVar('id_artikel'))->get()->getRow()->news_gambar == null)) || (($this->request->getFile('news_gambar')->getSize() != 0) && ($tblArtikel->where('id_artikel', $this->request->getVar('id_artikel'))->get()->getRow()->news_gambar != null))) {
            $validationRule = [
                'news_gambar' => [
                    'label' => 'Image File',
                    'rules' => 'uploaded[news_gambar]'
                        . '|is_image[news_gambar]'
                        . '|mime_in[news_gambar,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                        . '|max_size[news_gambar,2048]',
                ],
            ];

            if (!$this->validate($validationRule)) {
                $data = ['errors' => $this->validator->getErrors()];

                return redirect()->to(base_url() . '/author/dashboard?msg=Format Salah');
            }
            $data_file = $this->artikelModel->where('id_artikel', $this->request->getVar('id_artikel'))->findColumn('news_gambar');
            unlink(WRITEPATH . '../public/' . $data_file[0]);

            $img = $this->request->getFile('news_gambar');
            $img->move(WRITEPATH . '../public/assets/berita/images');

            $link = time();
            $link = date('', $link);
            $link .= '-' . $this->request->getVar('news_judul');
            $link = url_title($link);

            $dataArtikel = [
                'link'        => $link,
                'news_judul' => $this->request->getVar('news_judul'),
                'news_konten' => $this->request->getVar('news_konten'),
                'news_gambar' => 'assets/berita/images/' . $img->getName(),
            ];
            // Update data tabel artikel
            $this->artikelModel->update($this->request->getVar('id_artikel'), $dataArtikel);

            // Update data kategori di tabel berita
            $dataBerita = [
                'id_kategori' => $this->request->getVar('id_kategori'),
            ];
            $tblBerita->where('id_artikel', $this->request->getVar('id_artikel'))->update($dataBerita);

            return redirect()->to(base_url() . '/author/manage_artikel');
        } else {
            $link = time();
            $link = date('', $link);
            $link .= '-' . $this->request->getVar('news_judul');
            $link = url_title($link);

            $dataArtikel = [
                'link'        => $link,
                'news_judul' => $this->request->getVar('news_judul'),
                'news_konten' => $this->request->getVar('news_konten'),
            ];
            // Update data tabel artikel
            $this->artikelModel->update($this->request->getVar('id_artikel'), $dataArtikel);

            // Update data kategori di tabel berita
            $dataBerita = [
                'id_kategori' => $this->request->getVar('id_kategori'),
            ];

            $tblBerita->where('id_artikel', $this->request->getVar('id_artikel'))->update($dataBerita);

            return redirect()->to(base_url() . '/author/manage_artikel');
        }
    }

    public function delete_artikel_author($id)
    {
        $db      = \Config\Database::connect();
        $sql = 'SELECT tblberita.id, tblartikel.id_artikel FROM tblberita, tblartikel WHERE tblberita.id_artikel = tblartikel.id_artikel AND tblberita.id = ' . user()->id . ' AND tblartikel.id_artikel = ' . $id;
        // $sql = 'SELECT * FROM tblberita WHERE tblberita.id = 2';
        $query = $db->query($sql);

        if (count($query->getResult()) != 0) {
            $this->beritaModel->where('id_artikel', $id)->delete();

            $data_file = $this->artikelModel->where('id_artikel', $id)->findColumn('news_gambar');
            unlink(WRITEPATH . '../public/' . $data_file[0]);

            $this->artikelModel->where('id_artikel', $id)->delete();

            return redirect()->to(base_url() . '/author/manage_artikel');
        } else {
            return redirect()->to(base_url() . '/author/manage_artikel?msg=Tidak Memiliki Hak Akses!');
        }
    }
}
