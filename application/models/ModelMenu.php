<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ModelMenu extends CI_Model
{

    //manajemen menu
    public function getMenu()
    {
        return $this->db->get('menu');
    }

    public function menuWhere($where)
    {
        return $this->db->get_where('menu', $where);
    }

    public function simpanMenu($data = null)
    {
        $this->db->insert('menu', $data);
    }

    public function updateMenu($data = null, $where = null)
    {
        $this->db->update('menu', $data, $where);
    }

    public function hapusMenu($where = null)
    {
        $this->db->delete('menu', $where);
    }

    public function total($field, $where)
    {
        $this->db->select_sum($field);
        if (!empty($where) && count($where) > 0) {
            $this->db->where($where);
        }
        $this->db->from('menu');
        return $this->db->get()->row($field);
    }

    //manajemen kategori
    public function getKategori()
    {
        return $this->db->get('kategori');
    }

    public function kategoriWhere($where)
    {
        return $this->db->get_where('kategori', $where);
    }

    public function simpanKategori($data = null)
    {
        $this->db->insert('kategori', $data);
    }

    public function hapusKategori($where = null)
    {
        $this->db->delete('kategori', $where);
    }

    public function updateKategori($where = null, $data = null)
    {
        $this->db->update('kategori', $data, $where);
    }
    //join 
    public function joinKategoriMenu($where)
    {
        $this->db->select('menu.id_kategori, kategori.id_kategori');
        $this->db->from('menu');
        $this->db->join('kategori', 'kategori.id_kategori = menu.id_kategori');
        $this->db->where($where);
        return $this->db->get();
    }

    public function getLimitMenu()
    {
        $this->db->limit(5);
        return $this->db->get('menu');
    }
}
