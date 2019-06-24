<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_komplain extends CI_Model {   

    protected $table = 'tb_complain';
    protected $tb_user = 'tb_user';
    protected $tb_aum = 'tb_master_aum';
    protected $tb_grup = 'tb_grup';
    
    function semua() {
        $this->db->select('*');
        $this->db->from($this->table.' a');
        $this->db->join($this->tb_user.' b','a.id_user=b.id_user');
        $this->db->join($this->tb_aum.' c','a.id_aum=c.id_aum');
        $this->db->join($this->tb_grup.' d','a.grup_id=d.grup_id');
        return $this->db->get();
    }
   
    
    function getkode($id) {
        $kode = array('id_complain' => $id);
        return $this->db->get_where($this->table, $kode);
    }


    function getusercomplain($id) {
        $this->db->select('*');
        $this->db->from($this->table.' a');
        $this->db->join($this->tb_user.' b','a.id_user=b.id_user');
        $this->db->join($this->tb_aum.' c','a.id_aum=c.id_aum');
        $this->db->join($this->tb_grup.' d','a.grup_id=d.grup_id');
        $this->db->where('a.id_user', $id);
        return $this->db->get();
    }


    function getcomplain($id) {
        $this->db->select('*');
        $this->db->from($this->table.' a');
        $this->db->join($this->tb_user.' b','a.id_user=b.id_user');
        $this->db->join($this->tb_aum.' c','a.id_aum=c.id_aum');
        $this->db->join($this->tb_grup.' d','a.grup_id=d.grup_id');
        $this->db->where('a.id_complain', $id);
        return $this->db->get();
    }

   
    function update($data) {
        $this->db->where('id_complain', $this->input->post('kode'));
        $this->db->update($this->table, $data);
    }

    function simpan($data) {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    function edit($kode,$data) {        
        $this->db->where('id_complain', $kode);
        $this->db->update($this->table, $data);
    }

    function hapus($kode) {
        $this->db->where('id_complain', $kode);
        $this->db->delete($this->table);
        if($this->session->userdata('role') == 'Administrator'){
                        redirect(base_url().'complaint');
                    }else{
                        redirect(base_url().'list');
                    }
    }

    function delete($kode) {
        $this->db->where('id_complain', $kode);
        $this->db->delete($this->table);
    }

}
