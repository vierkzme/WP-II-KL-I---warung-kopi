<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // cek_login();
    }

    // Manajemen Menu
    public function index()
    {
        $data['judul'] = 'Data Menu';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->ModelMenu->getMenu()->result_array();
        $data['kategori'] = $this->ModelMenu->getKategori()->result_array();

        $data['sidebar_menu'] = [
            ['title' => 'Dashboard', 'url' => 'admin', 'icon' => 'fas fa-fw fa-tachometer-alt'],
            ['title' => 'Kategori Menu', 'url' => 'menu/kategori', 'icon' => 'fas fa-fw fa-table'],
            ['title' => 'Data Menu', 'url' => 'menu', 'icon' => 'fas fa-fw fa-table'],
            ['title' => 'Data Anggota', 'url' => 'user/anggota', 'icon' => 'fa fa-fw fa-user']
        ];


        $this->form_validation->set_rules('nama_menu', 'Nama Menu', 'required|min_length[3]', [
            'required' => 'Nama Menu harus diisi',
            'min_length' => 'Judul menu terlalu pendek'
        ]);
        $this->form_validation->set_rules('terjual', 'Terjual', 'required', [
            'required' => 'Total Terjual harus diisi',
        ]);

        // Konfigurasi sebelum gambar diupload
        $config['upload_path'] = './assets/img/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['max_width'] = '1024';
        $config['max_height'] = '1000';
        $config['file_name'] = 'img' . time();
        $this->load->library('upload', $config);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            if ($this->upload->do_upload('image')) {
                $image = $this->upload->data();
                $gambar = $image['file_name'];
            } else {
                $gambar = '';
            }
            $data = [
                'nama_menu' => $this->input->post('nama_menu', true),
                'id' => $this->input->post('id', true),
                'id_kategori' => $this->input->post('id_kategori', true),
                'terjual' => $this->input->post('terjual', true),
                'image' => $gambar
            ];
            $this->ModelMenu->simpanMenu($data);
            redirect('menu');
        }
    }
    public function kategori()
    {
        $data['judul'] = 'Kategori Menu';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['kategori'] = $this->ModelMenu->getKategori()->result_array();

        $data['sidebar_menu'] = [
            ['title' => 'Dashboard', 'url' => 'admin', 'icon' => 'fas fa-fw fa-tachometer-alt'],
            ['title' => 'Kategori Menu', 'url' => 'menu/kategori', 'icon' => 'fas fa-fw fa-table'],
            ['title' => 'Data Menu', 'url' => 'menu', 'icon' => 'fas fa-fw fa-table'],
            ['title' => 'Data Anggota', 'url' => 'user/anggota', 'icon' => 'fa fa-fw fa-user']
        ];


        $this->form_validation->set_rules('kategori', 'Kategori', 'required', [
            'required' => 'Nama Kategori Harus Diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/kategori', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kategori' => $this->input->post('kategori')
            ];
            $this->ModelMenu->simpanKategori($data);
            redirect('menu/kategori');
        }
    }

    public function ubahKategori()
    {
        $data['judul'] = 'Ubah Data Kategori';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['kategori'] = $this->ModelMenu->kategoriWhere(['id' => $this->uri->segment(3)])->result_array();

        $data['sidebar_menu'] = [
            ['title' => 'Dashboard', 'url' => 'admin', 'icon' => 'fas fa-fw fa-tachometer-alt'],
            ['title' => 'Kategori Menu', 'url' => 'menu/kategori', 'icon' => 'fas fa-fw fa-table'],
            ['title' => 'Data Menu', 'url' => 'menu', 'icon' => 'fas fa-fw fa-table'],
            ['title' => 'Data Anggota', 'url' => 'user/anggota', 'icon' => 'fa fa-fw fa-user']
        ];


        $this->form_validation->set_rules('kategori', 'Nama Kategori', 'required|min_length[3]', [
            'required' => 'Nama Kategori harus diisi',
            'min_length' => 'Nama Kategori terlalu pendek'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/ubah_kategori', $data);
            $this->load->view('templates/footer');
        } else {

            $data = [
                'kategori' => $this->input->post('kategori', true)
            ];

            $this->ModelMenu->updateKategori(['id' => $this->input->post('id')], $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Kategori Berhasil diupdate </div>');
            redirect('menu/kategori');
        }
    }
    public function hapusMenu()
    {
        $where = ['id' => $this->uri->segment(3)];
        $this->ModelMenu->hapusMenu($where);
        redirect('menu');
    }
    public function hapusKategori()
    {
        $where = ['id' => $this->uri->segment(3)];
        $this->ModelMenu->hapusKategori($where);
        redirect('menu/kategori');
    }

    public function ubahMenu()
    {
        $data['judul'] = 'Ubah Data Menu';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->ModelMenu->menuWhere(['id' => $this->uri->segment(3)])->result_array();
        $data['kategori'] = $this->ModelMenu->getKategori()->result_array();

        $data['sidebar_menu'] = [
            ['title' => 'Dashboard', 'url' => 'admin', 'icon' => 'fas fa-fw fa-tachometer-alt'],
            ['title' => 'Kategori Menu', 'url' => 'menu/kategori', 'icon' => 'fas fa-fw fa-table'],
            ['title' => 'Data Menu', 'url' => 'menu', 'icon' => 'fas fa-fw fa-table'],
            ['title' => 'Data Anggota', 'url' => 'user/anggota', 'icon' => 'fa fa-fw fa-user']
        ];


        $kategori = $this->ModelMenu->joinKategoriMenu(['menu.id' => $this->uri->segment(3)])->result_array();
        foreach ($kategori as $k) {
            $data['id'] = $k['id'];
            $data['k'] = $k['kategori'];
        }

        $data['kategori'] = $this->ModelMenu->getKategori()->result_array();

        $this->form_validation->set_rules('nama_menu', 'Nama Menu', 'required|min_length[3]', [
            'required' => 'Nama Menu harus diisi',
            'min_length' => 'Judul menu terlalu pendek'
        ]);
        $this->form_validation->set_rules('id_kategori', 'Kategori', 'required', [
            'required' => 'Kategori harus diisi',
        ]);

        // Konfigurasi sebelum gambar diupload
        $config['upload_path'] = './assets/img/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['max_width'] = '1024';
        $config['max_height'] = '1000';
        $config['file_name'] = 'img' . time();

        // Memuat atau memanggil library upload
        $this->load->library('upload', $config);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/ubah_menu', $data);
            $this->load->view('templates/footer');
        } else {
            if ($this->upload->do_upload('image')) {
                $image = $this->upload->data();
                unlink('assets/img/upload/' . $this->input->post('old_pict', TRUE));
                $gambar = $image['file_name'];
            } else {
                $gambar = $this->input->post('old_pict', TRUE);
            }

            $data = [
                'nama_menu' => $this->input->post('nama_menu', true),
                'id_kategori' => $this->input->post('id_kategori', true),
                'terjual' => $this->input->post('terjual', true),
                'image' => $gambar
            ];

            $this->ModelMenu->updateMenu($data, ['id' => $this->input->post('id')]);
            redirect('menu');
        }
    }
}
