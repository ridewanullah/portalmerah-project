<?php

namespace App\Controllers;

// use Config\Cookie;
use phpDocumentor\Reflection\Types\Null_;
use CodeIgniter\Cookie\Cookie;
use CodeIgniter\I18n\Time;
use Exception;

class Home extends BaseController
{
    public function landing()
    {
        $data = [
            'title' => 'Welcome',
        ];
        return view('welcome_message', $data);
    }

    public function page()
    {
        $data = [
            'title' => 'Page'
        ];
        return view('page', $data);
    }

    public function redaksi()
    {
        $data = [
            'title' => 'Portal Merah - Redaksi',
            'description' => 'Portal Merah.id - Media Nasional Mengungkap Fakta Menguak Realita',
            'link' => 'https://www.portalmerah.id/redaksi',
            'siteName' => 'Portal Merah',
            'image' => base_url('/assets/img/logo.png'),
            'imageType' => $this->imagePathExtract('/assets/img/logo.png'),
            'dataNewsKategori' => $this->getNamaKategori(),
            'dataRedaksi' => $this->redaksiModel->findAll(),
        ];
        return view('redaksi', $data);
    }

    public function blog()
    {
        $data = [
            'title' => 'Blog'
        ];
        return view('blog', $data);
    }

    public function getNamaKategori()
    {
        $db = \Config\Database::connect();
        $query   = $db->query('SELECT id_kategori, kategori_nama, prioritas
        FROM tblnewskategori 
        ORDER BY prioritas ASC;');
        $results = json_decode(json_encode($query->getResult()), true);
        return $results;
    }

    public function categori()
    {
        $data = [
            'title' => 'Portal Merah - Kategori Berita',
            'description' => 'Portal Merah.id - Media Nasional Mengungkap Fakta Menguak Realita',
            'link' => 'https://www.portalmerah.id/categori',
            'siteName' => 'Portal Merah',
            'image' => base_url('/assets/img/logo.png'),
            'imageType' => $this->imagePathExtract('/assets/img/logo.png'),
            'dataNewsKategori' => $this->getNamaKategori(),
            'dataIklan' => $this->iklanModel->findAll(),
        ];
        return view('categori', $data);
    }

    public function contact_process()
    {
        $data = [
            'title' => 'Contact Process'
        ];
        return view('contact_process', $data);
    }

    public function contact()
    {
        $this->updateUrl();
        $data = [
            'title' => 'Portal Merah - Contact',
            'description' => 'Portal Merah.id - Media Nasional Mengungkap Fakta Menguak Realita',
            'link' => 'https://www.portalmerah.id/contact',
            'siteName' => 'Portal Merah',
            'image' => base_url('/assets/img/logo.png'),
            'imageType' => $this->imagePathExtract('/assets/img/logo.png'),
            'dataNewsKategori' => $this->getNamaKategori(),
        ];
        return view('contact', $data);
    }

    public function cyberMedia()
    {
        $data = [
            'title' => 'Portal Merah - Pedoman Media Siber',
            'description' => 'Portal Merah.id - Media Nasional Mengungkap Fakta Menguak Realita',
            'link' => 'https://www.portalmerah.id/pedoman_media_cyber',
            'siteName' => 'Portal Merah',
            'image' => base_url('/assets/img/logo.png'),
            'imageType' => $this->imagePathExtract('/assets/img/logo.png'),
            'beritaTrending' => $this->getBerita($this->trending),
            'dataNewsKategori' => $this->getNamaKategori(),
        ];
        return view('pedoman_media_cyber', $data);
    }

    public function kodeEtik()
    {
        $data = [
            'title' => 'Portal Merah - Kode Etik',
            'description' => 'Portal Merah.id - Media Nasional Mengungkap Fakta Menguak Realita',
            'link' => 'https://www.portalmerah.id/kode_etik',
            'siteName' => 'Portal Merah',
            'image' => base_url('/assets/img/logo.png'),
            'imageType' => $this->imagePathExtract('/assets/img/logo.png'),
            'beritaTrending' => $this->getBerita($this->trending),
            'dataNewsKategori' => $this->getNamaKategori(),
        ];
        return view('kode_etik', $data);
    }

    public function details()
    {
        $data = [
            'title' => 'Details',
        ];
        return view('details', $data);
    }

    public function shortTitle($title, $limit)
    {
        if (str_word_count($title, 0) > $limit) {
            $words = str_word_count($title, 2);
            $pos   = array_keys($words);
            $title  = substr($title, 0, $pos[$limit]) . '...';
        }
        return $title;
    }

    public function filterTitle($title, $limit)
    {
        $result = [];
        foreach ($title as $data){
            try{
                $a = $this->shortTitle($data['artikel']['news_judul'], $limit);
                array_push($result, $a);
            } catch(Exception $e){
                $a = $this->shortTitle($data['news_judul'], $limit);
                array_push($result, $a);
            }
        }
        return $result;
    }


    public function index($id = 1)
    {   
        $artikelTerkini = $this->getRecentPost(6);
        for ($i=0; $i < count($artikelTerkini); $i++) {
            $artikelTerkini[$i]['news_judul'] = $this->shortTitle($artikelTerkini[$i]['news_judul'], 15);
        }

        $data = [
            'title' => 'Portal Merah - Mengungkap Fakta Menguak Realita',
            'description' => 'Portal Merah.id - Media Nasional Mengungkap Fakta Menguak Realita',
            'link' => 'https://www.portalmerah.id/',
            'siteName' => 'Portal Merah',
            'image' => base_url('/assets/img/logo.png'),
            'imageType' => $this->imagePathExtract('/assets/img/logo.png'),
            'dataNewsKategori' => $this->getNamaKategori(),
            'titleTrending' => $this->filterTitle($this->getBerita($this->trending), 15),
            'titleMingguan' => $this->filterTitle($this->getWeeklyPost(6, $this->latest), 15),
            'titleTrendingMingguan' => $this->filterTitle($this->getWeeklyPost(8, $this->trending), 15),
            'beritaTrending' => $this->getBerita($this->trending),
            'beritaTerkini' => $artikelTerkini,
            'beritaMingguan' => $this->getWeeklyPost(6, $this->latest),
            'beritaTrendingMingguan' => $this->getWeeklyPost(8, $this->trending),
            'kategoriSelected' => $this->newsKategoriModel->find($id),
            'dataIklan' => $this->iklanModel->findAll(),
        ];

        return view('index', $data);
    }

    public function latest_news()
    {
        $berita = $this->getBerita($this->latest);

        $limit = 10;
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $firstPage = ($page > 1) ? ($page * $limit) - $limit : 0;

        $previous = $page - 1;
        $next = $page + 1;

        $latestNews = $this->getLatestNews($firstPage, $limit);
        // dd($latestNews[0]['id_artikel']);

        $total_page = $this->getLatestNewsCount();
        $total_page = ceil($total_page[0]['COUNT(id_artikel)'] / $limit);

        $data = [
            'title' => 'Portal Merah - Berita Terkini',
            'description' => 'Portal Merah.id - Media Nasional Mengungkap Fakta Menguak Realita',
            'link' => 'https://www.portalmerah.id/latest_news',
            'siteName'      => 'Portal Merah',
            'image'         => base_url('/assets/img/logo.png'),
            'imageType'     => $this->imagePathExtract('/assets/img/logo.png'),
            'beritaTerkini' => $latestNews,
            'totalPage'     => $total_page,
            'komen'         => $this->komenModel,
            'dataNewsKategori'      => $this->getNamaKategori(),
            'previous'      => $previous,
            'next'          => $next,
            'total_page'    => $total_page,
            'page'    => $page,
            'dataIklan' => $this->iklanModel->findAll(),
        ];
        return view('latest_news', $data);
    }

    public function getLatestNews($firstPage, $limit)
    {
        $db = \Config\Database::connect();
        $query   = $db->query('SELECT tblartikel.id_artikel, tblartikel.link, tblartikel.news_gambar, tblartikel.news_judul, tblartikel.created_at, tblnewskategori.kategori_nama
        FROM ((tblberita 
        INNER JOIN tblartikel ON tblberita.id_artikel = tblartikel.id_artikel) 
        INNER JOIN tblnewskategori ON tblberita.id_kategori = tblnewskategori.id_kategori) 
        WHERE tblartikel.news_status = 1
        ORDER BY tblartikel.created_at DESC LIMIT ' . $firstPage . ', ' . $limit . ';');
        $results = json_decode(json_encode($query->getResult()), true);
        return $results;
    }

    public function getLatestNewsCount()
    {
        $db = \Config\Database::connect();
        $query   = $db->query('SELECT COUNT(id_artikel) FROM tblartikel WHERE news_status=1');
        $results = json_decode(json_encode($query->getResult()), true);
        return $results;
    }

    public function searchResult()
    {
        $data = [
            'title' => 'Portal Merah - Berita Terkini',
            'description' => 'Portal Merah.id - Media Nasional Mengungkap Fakta Menguak Realita',
            'link' => 'https://www.portalmerah.id/',
            'siteName' => 'Portal Merah',
            'image' => base_url('/assets/img/logo.png'),
            'imageType' => $this->imagePathExtract('/assets/img/logo.png'),
            'searchResult' => $this->searchByRecent($this->request->getVar('keyword')),
            'beritaTerkini' => $this->getBerita($this->latest),
            'kategori' => $this->newsKategoriModel->findAll(),
            'dataNewsKategori' => $this->getNamaKategori(),
        ];

        return view('searchresult', $data);
    }

    public function elements()
    {
        $data = [
            'title' => 'Elements'
        ];
        return view('elements', $data);
    }

    public function getTentangPenulis()
    {
        $db = \Config\Database::connect();
        $query   = $db->query('SELECT id_kategori, kategori_nama, prioritas
        FROM tblnewskategori 
        ORDER BY prioritas DESC;');
        $results = json_decode(json_encode($query->getResult()), true);
    }

    public function news($link)
    {
        $db = \Config\Database::connect();

        $recent = $this->getRecentPost(1);
        $news = $this->artikelModel->where('link', $link)->findAll();
        $newsKategori = $this->beritaModel->where('id_artikel', $news[0]['id_artikel'])->get()->getRow();
        
        $query   = $db->query(
            'SELECT image, fullname, about FROM users WHERE id = ' . $newsKategori->id
        );
        $newsKategori = $this->newsKategoriModel->where('id_kategori', $newsKategori->id_kategori)->findColumn('kategori_nama');

        $whereCondition = [
            'id_artikel' => $news[0]['id_artikel'],
            'komen_status' => 1,
        ];

        $data = [
            'title' => 'Portal Merah - Mengungkap Fakta Menguak Realita',
            'description' => word_limiter(strip_tags($news[0]['news_konten']), 20),
            'link' => $news[0]['link'],
            'siteName' => 'Portal Merah',
            'image' => base_url($news[0]['news_gambar'], 10),
            'imageType' => $this->imagePathExtract(base_url($news[0]['news_gambar'])),
            'title' => 'PORTALMERAH.ID | ' . $news[0]['news_judul'],
            'news' => $news,
            'previous' => $this->getNewsPreviousPost($news[0]['created_at']),
            'next' => $this->getNewsNextPost($news[0]['created_at']),
            'newsKategori' => $newsKategori,
            'dataNewsKategori' => $this->getNamaKategori(),
            'komen' => $this->komenModel->where($whereCondition)->findAll(),
            'recent' => $recent,
            'dataCreator' => $query->getResult(),
            'newsTraffic' => $this->newsTrafficModel,
            'artikel' => $this->artikelModel,
            'db' => $db,
            'getIpAddress' => $this->getUserIpAddr(),
            'dataIklan' => $this->iklanModel->findAll(),
        ];
        return view('news', $data);
        // return view('single-blog_backup', $data);
    }

    public function mag_NewsDoc()
    {
        $data = [
            'title' => 'Magazine News'
        ];
        return view('Mag_NewsDoc', $data);
    }

    public function getNewsByCategory($idKategori)
    {

        $kategori = $this->beritaModel->findColumn($idKategori);
        $data = [
            '' => ''
        ];

        return redirect()->to(base_url('index'));
    }

    public function searchByRecent($keyword)
    {
        $db = \Config\Database::connect();
        $query   = $db->query(
            'SELECT tblartikel.id_artikel, tblartikel.link,tblartikel.news_gambar, tblartikel.news_judul, tblartikel.created_at, tblnewskategori.kategori_nama
        FROM tblberita 
        INNER JOIN tblartikel ON tblberita.id_artikel = tblartikel.id_artikel 
        INNER JOIN tblnewskategori ON tblberita.id_kategori = tblnewskategori.id_kategori
        WHERE tblartikel.news_judul LIKE "%' . $keyword . '%" AND tblartikel.news_status = 1 ORDER BY tblartikel.created_at DESC'
        );
        $results = json_decode(json_encode($query->getResult()), true);
        return $results;
    }

    public function getNewsPreviousPost($date)
    {
        $db = \Config\Database::connect();
        $query   = $db->query(
            'SELECT link, news_judul, news_gambar
        FROM tblartikel
        WHERE created_at < "' . $date . '" ORDER BY created_at DESC LIMIT 1'
        );
        $results = json_decode(json_encode($query->getResult()), true);
        return $results;
    }

    public function getNewsNextPost($date)
    {
        $db = \Config\Database::connect();
        $query   = $db->query(
            'SELECT link, news_judul, news_gambar
        FROM tblartikel
        WHERE created_at > "' . $date . '" ORDER BY created_at ASC LIMIT 1'
        );
        $results = json_decode(json_encode($query->getResult()), true);
        return $results;
    }

    public function getRecentPost($limit)
    {
        $db = \Config\Database::connect();
        $query   = $db->query('SELECT tblartikel.id_artikel, tblartikel.link, tblartikel.news_gambar, tblartikel.news_judul, tblartikel.created_at, tblnewskategori.kategori_nama 
        FROM ((tblberita 
        INNER JOIN tblartikel ON tblberita.id_artikel = tblartikel.id_artikel) 
        INNER JOIN tblnewskategori ON tblberita.id_kategori = tblnewskategori.id_kategori) 
        WHERE tblartikel.news_status = 1
        ORDER BY tblartikel.created_at DESC LIMIT ' . $limit . ';');
        $results = json_decode(json_encode($query->getResult()), true);
        return $results;
    }

    public function getWeeklyPost($limit, $order)
    {
        $db = \Config\Database::connect();
        $query   = $db->query('SELECT tblartikel.id_artikel, tblartikel.link, tblartikel.news_gambar, tblartikel.news_judul, tblartikel.created_at, tblnewskategori.kategori_nama 
        FROM ((tblberita 
        INNER JOIN tblartikel ON tblberita.id_artikel = tblartikel.id_artikel) 
        INNER JOIN tblnewskategori ON tblberita.id_kategori = tblnewskategori.id_kategori) 
        WHERE tblartikel.created_at  BETWEEN DATE_ADD(CURDATE(), INTERVAL - WEEKDAY(CURDATE()) DAY) AND NOW() AND tblartikel.news_status = 1
        ORDER BY tblartikel.' . $order . ' DESC LIMIT ' . $limit . ';');
        $results = json_decode(json_encode($query->getResult()), true);
        return $results;
    }

    public function saveComment()
    {
        if (!$this->validate([
            'komen_isi'   => 'required',
            'komen_user'  => 'required',
            'komen_email' => 'required|valid_email',
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('news/' . $this->request->getVar('link'))->withInput()->with('validation', $validation);
        }
        $this->komenModel->save([
            'link' => $this->request->getVar('link'),
            'id_artikel' => $this->request->getVar('id_artikel'),
            'komen_isi' => $this->request->getVar('komen_isi'),
            'komen_user' => $this->request->getVar('komen_user'),
            'komen_email' => $this->request->getVar('komen_email')
        ]);
        return redirect()->to(base_url('/' . $this->request->getVar('link')));
    }

    // public function getKategoriNews($id)
    // {
    //     $db      = \Config\Database::connect();
    //     $tblArtikel = $db->table('tblartikel');
    //     $tblKategori = $db->table('tblnewskategori');
    //     $tblBerita = $db->table('tblberita');

    //     $dataKategori = $tblKategori->where('id_kategori', $id)->get()->getRow();
    //     $dataBerita = $tblBerita->where('id_kategori', $dataKategori->id_kategori)->get()->getResult();
    //     if ($dataBerita == null) {
    //         $data = [
    //             'news_gambar' => '',
    //             'news_judul' => '',
    //         ];
    //         return 0;
    //     } else {
    //         $cek = [];
    //         $i = 0;
    //         foreach ($dataBerita as $data) {
    //             $x = $i - 1;
    //             $dataArtikel = $tblArtikel->where('id_artikel', $data->id_artikel)->get()->getRow();

    //             $data = [
    //                 'dataArtikelTerpilih' => $dataArtikel,
    //             ];
    //             if ($cek == []) {
    //                 $cek[0] = array_merge($cek, $data);
    //             } else {
    //                 $cek[$i] = array_merge($cek[$x], $data);
    //             }
    //             $i++;
    //         }
    //         return $cek;
    //     }
    // }
}
