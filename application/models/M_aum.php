<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_aum extends CI_Model {   

    protected $table = 'tb_master_aum';
    protected $tb_ruangan = 'tb_ruangan';
    public $id_aum = 'id_aum';

    
    function semua() {
        //$gid=$this->session->userdata('gid');
        return $this->db->get($this->table);
    }
   
    function filter($filter, $key) {
        return $this->db->like('jenis_aum',$filter)->like('nama_aum', $key)->get($this->table);
    }
    
    function getkode($id_aum) {
        $kode = array('id_aum' => $id_aum);
        return $this->db->get_where($this->table, $kode);
    }

   
    function update($data) {
        $this->db->where('id_ruangan', $this->input->post('kode'));
        $this->db->update($this->tb_ruangan, $data);
    }

    function simpan($data) {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    function edit($kode,$data) {        
        $this->db->where('id_aum', $kode);
        $this->db->update($this->table, $data);
    }

    function hapus($kode) {
        $this->db->where('id_aum', $kode);
        $this->db->delete($this->table);
        redirect(base_url().'aum');
    }

    function delete($kode) {
        $this->db->where('id_aum', $kode);
        $this->db->delete($this->table);
    }

}
