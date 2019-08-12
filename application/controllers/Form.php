<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Form extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array('M_komplain', 'M_aum', 'M_group', 'M_image'));
        chek_session();
    }
    
	public function index() {
        $data['record']=$this->db->get_where('tb_master_aum')->result();                    
        $this->template->display('backend/template','form/tambah', $data);   
    }

    //Fungsi untuk CRUD dari AUM
    function add() {                
        if (isset($_POST['submit'])) {
            $this->form_validation->set_message('required', '%s harus diisi');
            $this->form_validation->set_rules('id_aum', 'Id AUM', 'trim|required|is_unique[tb_user.username]');
            $this->form_validation->set_rules('judul_complain', 'Judul Komplain', 'required');
            $this->form_validation->set_rules('jenis_complain', 'Jenis Komplain', 'required');
            $this->form_validation->set_rules('kategori', 'Kategori', 'required');
            $this->form_validation->set_rules('isi_komplain', 'Isi Komplain', 'required');  
            if ($this->form_validation->run() == true) {
                $this->M_image->do_upload();
                $image= $this->upload->file_name;
                $data = array(
                    'id_complain'     => date('YmdHis'),
                    'id_user'         => $this->session->userdata('id_user'),
                    'id_aum'          => $this->input->post('id_aum'),
                    'judul_complain'  => $this->input->post('judul_complain'),
                    'jenis_complain'  => $this->input->post('jenis_complain'),
                    'kategori'        => $this->input->post('kategori'),
                    'isi_komplain'    => $this->input->post('isi_komplain'),
                    'tgl_complain'    => date('Y:m:d H:i:s'),
                    'solusi'          => null,
                    'status_complain' => 'dalam proses',
                    'status'          => 'pending',
                    'grup_id'         => $this->session->userdata('grup_id'),
                    'image'           => $image
                );
                $this->M_komplain->simpan($data);
                redirect(base_url().'list');
            } else{
                $data['record']=$this->db->get_where('tb_master_aum')->result();              
                $this->template->display('backend/template','form/tambah', $data); 
            }
        } else {    
            $data['record']=$this->db->get_where('tb_master_aum')->result();                    
            $this->template->display('backend/template','form/tambah', $data);   
        }
    }

    function edit() {       
        if (isset($_POST['submit'])) {
            $this->form_validation->set_message('required', '%s harus diisi');
            $this->form_validation->set_rules('id_aum', 'username', 'trim|required|is_unique[tb_user.username]');
            $this->form_validation->set_rules('judul_complain', 'password', 'required');
            $this->form_validation->set_rules('jenis_complain', 'Nama Pengguna', 'required');
            $this->form_validation->set_rules('kategori', 'Jenis Kelamin', 'required');
            $this->form_validation->set_rules('isi_komplain', 'Alamat User', 'required');  
            if ($this->form_validation->run() == true) {
                $this->M_image->do_upload();
                $image = $this->upload->file_name;
                if ($image = $this->upload->file_name==0) {
                    $data = array(
                        'id_user'         => $this->input->post('id_user'),
                        'id_aum'          => $this->input->post('id_aum'),
                        'judul_complain'  => $this->input->post('judul_complain'),
                        'jenis_complain'  => $this->input->post('jenis_complain'),
                        'kategori'        => $this->input->post('kategori'),
                        'isi_komplain'    => $this->input->post('isi_komplain'),
                        'tgl_complain'    => date('Y:m:d H:i:s'),
                        'solusi'          => null,
                        'status_complain' => 'dalam proses',
                        'status'          => 'pending',
                        'grup_id'         => $this->session->userdata('grup_id'),
                    );
                    $kode=$this->input->post('id_complain');
                    $this->M_komplain->edit($kode,$data);
                    if($this->session->userdata('role') == 'Administrator'){
                        redirect(base_url().'complaint');
                    }else{
                        redirect(base_url().'list');
                    }
                }else{
                    $this->M_image->do_upload();
                    $image = $this->upload->file_name;
                    $data = array(
                        'id_user'         => $this->input->post('id_user'),
                        'id_aum'          => $this->input->post('id_aum'),
                        'judul_complain'  => $this->input->post('judul_complain'),
                        'jenis_complain'  => $this->input->post('jenis_complain'),
                        'kategori'        => $this->input->post('kategori'),
                        'isi_komplain'    => $this->input->post('isi_komplain'),
                        'tgl_complain'    => date('Y:m:d H:i:s'),
                        'solusi'          => null,
                        'status_complain' => 'dalam proses',
                        'status'          => 'pending',
                        'grup_id'         => $this->session->userdata('grup_id'),
                        'image'           => $image,
                    );
                    $kode=$this->input->post('id_complain');
                    $this->M_komplain->edit($kode,$data);
                    if($this->session->userdata('role') == 'Administrator'){
                        redirect(base_url().'complaint');
                    }else{
                        redirect(base_url().'list');
                    }
                }                
            }else {
                $id_complain    = $this->uri->segment(3);
                $data['aum']    = $this->db->get_where('tb_master_aum',array('id_aum'=>$id_aum))->row();
                $data['grup']   = $this->M_group->get_all();                
                $data['record'] = $this->M_komplain->getkode($id_complain)->row_array();
                $this->template->display('backend/template','form/edit', $data);   
            } 
        }else{ 
                $id_complain    = $this->uri->segment(3);
                $data['aum']    = $this->M_aum->semua();
                $data['grup']   = $this->M_group->get_all();
                $data['record'] = $this->M_komplain->getkode($id_complain)->row_array();
                $this->template->display('backend/template','form/edit', $data);   
        }
    }

    function delete(){
        $this->M_komplain->hapus($this->uri->segment(3));
    } 

    function complain_list() {
        $data['record'] = $this->M_komplain->getusercomplain($this->session->userdata('id_user'))->result(); 
        $this->template->display('backend/template','form/view', $data);
    }

    function complain_detail($id_complain) {
        $data['aum']    = $this->M_aum->semua();
        $data['grup']   = $this->M_group->get_all();
        $data['record'] = $this->M_komplain->getcomplain($id_complain)->row_array(); 
        $this->template->display('backend/template','form/detail', $data);
    }


}