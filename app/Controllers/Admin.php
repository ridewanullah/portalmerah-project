<?php

namespace App\Controllers;

use CodeIgniter\Files\File;

class Admin extends Author
{
    public function manage_users()
    {
        // dd(user()->getUsers());
        $db      = \Config\Database::connect();
        // $tblUsers = $db->table('users');
        // dd($tblUsers->get()->getResult());
        $tabelUsers = $db->query('SELECT users.id, email, username, fullname, image, about, active, created_at, updated_at, name FROM users, auth_groups_users, auth_groups WHERE auth_groups_users.user_id = users.id AND auth_groups_users.group_id = auth_groups.id');
        // dd($tabelUsers->getResult());


        $data = [
            'title' => 'Manage Users',
            'dataUsers' => $tabelUsers->getResult(),
        ];
        return view('author/admin/users_manage', $data);
    }

    public function update_status_user($id)
    {
        $db      = \Config\Database::connect();
        $tblUsers = $db->table('users');

        if ($this->request->getVar('button_status') == 'OFF') {
            $data = [
                'active' => 1,
            ];
            $tblUsers->where('id', $id)->update($data);
        } else {
            $data = [
                'active' => 0,
            ];
            $tblUsers->where('id', $id)->update($data);
        }
        return redirect()->to(base_url().'/admin/manage_users');
    }

    public function user_update($id)
    {
        $db      = \Config\Database::connect();
        $tabelUsers = $db->query('SELECT users.id, email, username, fullname, image, about, active, created_at, updated_at, name FROM users, auth_groups_users, auth_groups WHERE users.id = ' . $id . ' AND auth_groups_users.user_id = users.id AND auth_groups_users.group_id = auth_groups.id');
        $tabelAuthGroups = $db->query('SELECT * FROM auth_groups');
        // dd($tabelUsers->getResult());


        $data = [
            'title' => 'Manage Users',
            'dataUsers' => $tabelUsers->getResult(),
            'authGroups' => $tabelAuthGroups->getResult(),
        ];

        return view('author/admin/users_update', $data);
    }

    public function save_user_update() {
        $db      = \Config\Database::connect();
        $tblUsers = $db->table('users');
        $tblAuth_groups_users = $db->table('auth_groups_users');

        if ($this->request->getMethod() !== 'post') {
            return redirect()->to(base_url() . '/admin/manage_users?msg=Method Salah');
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

                return redirect()->to(base_url() . '/admin/manage_users?msg=Format Salah');
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

            $dataAuth_groups_users = [
                'group_id' => $this->request->getVar('role')
            ];

            $tblUsers->where('id', $this->request->getVar('id_user'))->update($dataUser);
            $tblAuth_groups_users->where('user_id', $this->request->getVar('id_user'))->update($dataAuth_groups_users);

            return redirect()->to(base_url() . '/admin/manage_users');
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

                return redirect()->to(base_url() . '/admin/manage_users?msg=Format Salah');
            }

            $img = $this->request->getFile('profile_picture');
            $img->move(WRITEPATH . '../public/assets/author/img');

            $dataUser = [
                'fullname' => $this->request->getVar('fullname'),
                'image' => 'assets/author/img/' . $img->getName(),
                'about' => $this->request->getVar('about_author'),
            ];

            $dataAuth_groups_users = [
                'group_id' => $this->request->getVar('role')
            ];

            $tblUsers->where('id', $this->request->getVar('id_user'))->update($dataUser);
            $tblAuth_groups_users->where('user_id', $this->request->getVar('id_user'))->update($dataAuth_groups_users);

            return redirect()->to(base_url() . '/admin/manage_users');
        } elseif (($this->request->getFile('profile_picture')->getSize() == 0) && ($tblUsers->where('id', $this->request->getVar('id_user'))->get()->getRow()->image != null) || (($this->request->getFile('profile_picture')->getSize() == 0) && ($tblUsers->where('id', $this->request->getVar('id_user'))->get()->getRow()->image == null))) {
            $dataUser = [
                'fullname' => $this->request->getVar('fullname'),
                'about' => $this->request->getVar('about_author'),
            ];

            $dataAuth_groups_users = [
                'group_id' => $this->request->getVar('role')
            ];

            $tblUsers->where('id', $this->request->getVar('id_user'))->update($dataUser);
            $tblAuth_groups_users->where('user_id', $this->request->getVar('id_user'))->update($dataAuth_groups_users);

            return redirect()->to(base_url() . '/admin/manage_users');
        }
    }

    public function manage_kategori()
    {
        $data = [
            'title' => 'Manage Kategori',
            'dataKategori' => $this->newsKategoriModel->findAll(),
        ];
        return view('author/admin/kategori_manage', $data);
    }

    public function create_kategori()
    {
        $data = [
            'title' => 'Buat Kategori',
            'dataKategori' => $this->newsKategoriModel->findAll(),
        ];
        return view('author/admin/kategori_create', $data);
    }

    public function save_create_kategori()
    {
        $dataKategori = [
            'kategori_nama' => $this->request->getVar('kategori_nama'),
            'kategori_deskripsi' => $this->request->getVar('kategori_deskripsi'),
            'prioritas' => $this->request->getVar('prioritas'),
        ];
        $this->newsKategoriModel->insert($dataKategori);
        return redirect()->to(base_url().'/admin/manage_kategori');
    }

    public function update_kategori($id)
    {
        // dd($this->beritaModel->where('id_kategori', $id)->findColumn('id_artikel'));
        $data = [
            'title' => 'Update Kategori',
            'dataKategori' => $this->newsKategoriModel->find($id),
        ];
        return view('author/admin/kategori_update', $data);
    }

    public function save_update_kategori()
    {
        $dataKategori = [
            'kategori_nama' => $this->request->getVar('kategori_nama'),
            'kategori_deskripsi' => $this->request->getVar('kategori_deskripsi'),
            'prioritas' => $this->request->getVar('prioritas'),
        ];
        // Update data tabel artikel
        $this->newsKategoriModel->update($this->request->getVar('id_kategori'), $dataKategori);

        return redirect()->to(base_url().'/admin/manage_kategori');
    }
    public function delete_kategori($id)
    {
        if($this->beritaModel->where('id_kategori', $id)->findColumn('id_artikel') > 0) {
            $this->artikelModel->delete($this->beritaModel->where('id_kategori', $id)->findColumn('id_artikel'));
        }
        $this->newsKategoriModel->where('id_kategori', $id)->delete();

        return redirect()->to(base_url().'/admin/manage_kategori');
    }

    public function iklan_manage()
    {
        $data = [
            'title' => 'Pengaturan Letak Iklan',
            'dataIklan' => $this->iklanModel->findAll(),
        ];
        return view('author/admin/iklan_manage', $data);
    }

    public function add_iklan($id)
    {
        $data = [
            'title' => 'Pengaturan Letak Iklan',
            'dataIklan' => $this->iklanModel->where('id_iklan', $id)->get()->getRow(),
        ];
        return view('author/admin/iklan_add', $data);
    }

    public function save_add_iklan()
    {
        $db      = \Config\Database::connect();
        $tblIklan = $db->table('tbliklan');

        if ($this->request->getMethod() !== 'post') {
            return redirect()->to(base_url().'/admin/manage_iklan?msg=Method Salah');
        }

        // dd($tblUsers->where('id', $this->request->getVar('id_user'))->get()->getRow()->image);
        $validationRule = [
            'iklan_gambar' => [
                'label' => 'Image File',
                'rules' => 'uploaded[iklan_gambar]'
                    . '|is_image[iklan_gambar]'
                    . '|mime_in[iklan_gambar,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                    . '|max_size[iklan_gambar,2048]',
            ],
        ];

        if (!$this->validate($validationRule)) {
            $data = ['errors' => $this->validator->getErrors()];

            return redirect()->to(base_url().'/author/dashboard?msg=Format Salah');
        }

        $img = $this->request->getFile('iklan_gambar');
        $img->move(WRITEPATH . '../public/assets/berita/iklan');

        $dataIklan = [
            'iklan_gambar' => 'assets/berita/iklan/' . $img->getName(),
        ];

        $tblIklan->where('id_iklan', $this->request->getVar('id_iklan'))->update($dataIklan);

        return redirect()->to(base_url().'/admin/manage_iklan');
    }

    public function delete_iklan($id)
    {
        $data_file = $this->iklanModel->where('id_iklan', $id)->findColumn('iklan_gambar');
        unlink(WRITEPATH . '../public/' . $data_file[0]);

        $db      = \Config\Database::connect();
        $sql = 'UPDATE tbliklan set iklan_gambar = NULL WHERE id_iklan = ' . $id;
        $query = $db->query($sql);

        // $dataIklan = [
        //     'iklan_gambar' => NULL,
        // ];

        // $this->iklanModel->where('id_iklan', $id)->update($dataIklan);

        return redirect()->to(base_url().'/admin/manage_iklan');
    }

    public function manage_susunan_redaksi()
    {
        $data = [
            'title' => 'Manage Users',
            'dataRedaksi' => $this->redaksiModel->findAll(),
        ];
        // dd($this->redaksiModel->findAll());
        return view('author/admin/susunan_redaksi_manage', $data);
    }

    public function save_manage_susunan_redaksi()
    {
        $dataSusunan = [
            'susunan_redaksi' => $this->request->getVar('susunan_redaksi'),
        ];

        $this->redaksiModel->update($this->request->getVar('id_redaksi'), $dataSusunan);

        return redirect()->to(base_url().'/admin/manage_susunan_redaksi');
    }

    public function manage_artikel()
    {
        // $data = [
        //     'title' => 'Manage Artikel',
        //     'dataArtikel' => $this->getBerita_all($this->latest),
        // ];

        $db      = \Config\Database::connect();
        $sql = 'SELECT tblberita.id_berita, tblberita.id_artikel, tblberita.id_kategori, tblartikel.*, tblnewskategori.id_kategori, tblnewskategori.kategori_nama
        FROM tblberita, tblartikel, tblnewskategori 
        WHERE tblberita.id_artikel = tblartikel.id_artikel AND tblberita.id_kategori = tblnewskategori.id_kategori ORDER BY tblartikel.created_at DESC';
        $query = $db->query($sql);

        $data = [
            'title' => 'Manage Artikel',
            'dataArtikel' => $query->getResult(),
        ];

        return view('author/admin/artikel_manage', $data);
    }

    public function create_artikel()
    {
        $data = [
            'title' => 'Membuat Artikel',
            'dataNewsKategori' => $this->newsKategoriModel->findAll(),
        ];
        return view('author/admin/artikel_create', $data);
    }

    public function insert_data_artikel()
    {
        if ($this->request->getMethod() !== 'post') {
            return redirect()->to(base_url().'/admin/create_artikel?msg=Method Salah');
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

            return redirect()->to(base_url().'/author/dashboard?msg=Format Salah');
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

        return redirect()->to(base_url().'/admin/manage_artikel');
    }

    public function update_artikel($id)
    {
        $db      = \Config\Database::connect();
        $tblBerita = $db->table('tblberita');

        $data = [
            'title' => 'Membuat Artikel',
            'dataArtikel' => $this->artikelModel->find($id),
            'dataBerita' => $tblBerita->where('id_artikel', $id)->get()->getRow(),
            'dataNewsKategori' => $this->newsKategoriModel->findAll(),
        ];

        return view('author/admin/artikel_update', $data);
    }

    public function update_data_artikel()
    {
        $db      = \Config\Database::connect();
        $tblBerita = $db->table('tblberita');
        $tblArtikel = $db->table('tblartikel');

        if ($this->request->getMethod() !== 'post') {
            return redirect()->to(base_url().'/admin/create_artikel?msg=Method Salah');
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

                return redirect()->to(base_url().'/admin/dashboard?msg=Format Salah');
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

            return redirect()->to(base_url().'/admin/manage_artikel');
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

            return redirect()->to(base_url().'/admin/manage_artikel');
        }
    }

    public function delete_artikel($id)
    {
        $this->beritaModel->where('id_artikel', $id)->delete();
        // $this->komenModel->where('id_artikel', $id)->delete();
        // $this->newsTrafficModel->where('id_artikel', $id)->delete();

        $data_file = $this->artikelModel->where('id_artikel', $id)->findColumn('news_gambar');
        unlink(WRITEPATH . '../public/' . $data_file[0]);

        $this->artikelModel->where('id_artikel', $id)->delete();

        return redirect()->to(base_url().'/admin/manage_artikel');
    }

    public function update_status_artikel($id)
    {
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
        return redirect()->to(base_url().'/admin/manage_artikel');
    }

    public function manage_komen()
    {
        $db      = \Config\Database::connect();
        $sql = 'SELECT tblartikel.news_judul, tblkomen.*
        FROM tblkomen 
        INNER JOIN tblartikel
        ON tblartikel.id_artikel = tblkomen.id_artikel
        ORDER BY tblkomen.id_artikel;';
        $query = $db->query($sql);

        $data = [
            'title' => 'Manage Artikel',
            'username' => user()->getUsername(),
            'dataKomen' => $query->getResult(),
        ];
        // dd($data);
        return view('author/admin/komen_manage', $data);
    }

    public function update_status_komen($id)
    {
        if ($this->request->getVar('button_status') == 'OFF') {
            $data = [
                'komen_status' => 1,
            ];
            $this->komenModel->update($id, $data);
        } else {
            $data = [
                'komen_status' => 0,
            ];
            $this->komenModel->update($id, $data);
        }
        return redirect()->to(base_url().'/admin/manage_komen');
    }

    public function delete_komen($id)
    {
        $this->komenModel->where('id_komen', $id)->delete();

        return redirect()->to(base_url().'/admin/manage_komen');
    }

    public function artikel_sorted_all($sort_by, $sort_order)
    {
        $db      = \Config\Database::connect();
        $sort_order = ($sort_order == 'DESC') ? 'DESC' : 'ASC';
        $sort_columns = array('id_artikel', 'news_judul', 'news_konten', 'news_status', 'news_gambar', 'news_video', 'news_traffic', 'created_at');
        $sort_by = (in_array($sort_by, $sort_columns)) ? '`' . $sort_by . '`' : '`id_berita`';
        $sql = 'SELECT * FROM tblartikel ORDER BY ' . $sort_by . ' ' . $sort_order;
        $query = $db->query($sql);

        return $query->getResult();
    }

    public function getBerita_all($sort)
    {
        $db      = \Config\Database::connect();
        $tblArtikel = $db->table('tblartikel');
        $tblKategori = $db->table('tblnewskategori');
        $tblBerita = $db->table('tblberita');
        $dataArtikel_view_DESC = json_decode(json_encode($this->artikel_sorted_all($sort, 'DESC')), true);

        $cek = [];
        $i = 0;
        foreach ($dataArtikel_view_DESC as $dataArtikel) {
            $x = $i - 1;
            $data_berita = $tblBerita->where('id_artikel', $dataArtikel['id_artikel'])->get()->getRow();
            $data_news_kategori = $tblKategori->where('id_kategori', $data_berita->id_kategori)->get()->getRow();

            $data = [
                'artikel' => $dataArtikel,
                'kategori' => (array) $data_news_kategori,
            ];
            if ($cek == []) {
                $cek[0] = array_merge($cek, $data);
            } else {
                $cek[$i] = array_merge($cek[$x], $data);
            }
            $i++;
        }
        return $cek;
    }
}
