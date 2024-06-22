<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }
    public function index()
    {
        $data['judul'] = 'Dashboard';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['anggota'] = $this->ModelUser->getUserLimit()->result_array();
        $data['menu'] = $this->ModelMenu->getMenu()->result_array();

        $data['menu_sidebar'] = [
            ['title' => 'Dashboard', 'url' => 'admin', 'icon' => 'fas fa-fw fa-tachometer-alt'],
            ['title' => 'Kategori Menu', 'url' => 'menu/kategori', 'icon' => 'fas fa-fw fa-table'],
            ['title' => 'Data Menu', 'url' => 'menu', 'icon' => 'fas fa-fw fa-table'],
            ['title' => 'Data Anggota', 'url' => 'user/anggota', 'icon' => 'fa fa-fw fa-user']
        ];


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }
}
