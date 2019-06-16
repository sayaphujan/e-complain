<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Komplain extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array('M_komplain', 'M_group', 'M_aum', 'M_image'));
        chek_session();
    }
    
	public function index() {
        $data['record'] = $this->M_komplain->semua()->result(); 
        $this->template->display('backend/template','komplain/view', $data);   
    }
    
    function tampil() {
        $data=$this->M_komplain->semua()->result();
        $no=1;
        foreach ($data as $r){ 
        $qury[]=array(
            'no'                => $no++,
            'nama_user'         => $r->nama_user,
            'nama_aum'          => $r->nama_aum,
            'nama_grup'         => $r->nama_grup,
            'judul_complain'    => $r->judul_complain,
            'jenis_complain'    => $r->jenis_complain,
            'kategori'          => $r->kategori,
            'tgl_complain'      => $r->tgl_complain,
            'solusi'            => $r->solusi,
            'status_complain'   => $r->status_complain,
            'status'            => $r->status,
            'edit'        => anchor('komplain/edit/' . $r->id_complain, '<i class="btn btn-info btn-sm glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit"></i>'),
            'delete'      => anchor('komplain/delete/' . $r->id_complain, '<i class="btn-sm btn-info glyphicon glyphicon-trash" data-toggle="tooltip" title="Delete"></i>', array('onclick' => "return confirm('Data Akan di Hapus?')"))          
            ); 
            };
            $result = array('data' => $qury);
            echo json_encode($result);                      
    }



    //Fungsi untuk CRUD dari AUM
    function add() {                
        if (isset($_POST['submit'])) {
            $this->form_validation->set_message('required', '%s harus diisi');
            $this->form_validation->set_rules('id_aum', 'username', 'trim|required|is_unique[tb_user.username]');
            $this->form_validation->set_rules('judul_complain', 'password', 'required');
            $this->form_validation->set_rules('jenis_complain', 'Nama Pengguna', 'required');
            $this->form_validation->set_rules('kategori', 'Jenis Kelamin', 'required');
            $this->form_validation->set_rules('isi_komplain', 'Alamat User', 'required');  
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
                redirect(base_url().'complaint');
            } else{
                $data['record']=$this->db->get_where('tb_master_aum')->result();              
                $this->template->display('backend/template','komplain/tambah', $data); 
            }
        } else {    
            $data['record']=$this->db->get_where('tb_master_aum')->result();                    
            $this->template->display('backend/template','komplain/tambah', $data);   
        }
    }

        
    function edit() {       
        if (isset($_POST['submit'])) {
            $this->form_validation->set_message('required', '%s harus diisi');
            $this->form_validation->set_rules('solusi', 'Solusi', 'required'); 
            $this->form_validation->set_rules('status_complain', 'Status Complain', 'required'); 
            $this->form_validation->set_rules('status', 'Status', 'required'); 
            if ($this->form_validation->run() == true) {
                $this->M_image->do_upload();
                $image = $this->upload->file_name;
                if ($image = $this->upload->file_name==0) {
                    $data = array(
                        'id_user'         => $this->session->userdata('id_user'),
                        'id_aum'          => $this->input->post('id_aum'),
                        'judul_complain'  => $this->input->post('judul_complain'),
                        'jenis_complain'  => $this->input->post('jenis_complain'),
                        'kategori'        => $this->input->post('kategori'),
                        'isi_komplain'    => $this->input->post('isi_komplain'),
                        'tgl_complain'    => date('Y:m:d H:i:s'),
                        'solusi'          => $this->input->post('solusi'),
                        'status_complain' => $this->input->post('status_complain'),
                        'status'          => $this->input->post('status'),
                        'grup_id'         => $this->session->userdata('grup_id'),
                    );
                    $kode=$this->input->post('id_complain');
                    $this->M_komplain->edit($kode,$data);
                    redirect(base_url().'complaint');
                }else{
                    $this->M_image->do_upload();
                    $image = $this->upload->file_name;
                    $data = array(
                        'id_user'         => $this->session->userdata('id_user'),
                        'id_aum'          => $this->input->post('id_aum'),
                        'judul_complain'  => $this->input->post('judul_complain'),
                        'jenis_complain'  => $this->input->post('jenis_complain'),
                        'kategori'        => $this->input->post('kategori'),
                        'isi_komplain'    => $this->input->post('isi_komplain'),
                        'tgl_complain'    => date('Y:m:d H:i:s'),
                        'solusi'          => $this->input->post('solusi'),
                        'status_complain' => $this->input->post('status_complain'),
                        'status'          => $this->input->post('status'),
                        'grup_id'         => $this->session->userdata('grup_id'),
                        'image'           => $image,
                    );
                    $kode=$this->input->post('id_complain');
                    $this->M_komplain->edit($kode,$data);
                    redirect(base_url().'complaint');
                }                
            }else {
                $id_complain    = $this->uri->segment(3);
                $data['aum']    = $this->db->get_where('tb_master_aum',array('id_aum'=>$this->input->post('id_aum')))->row();
                $data['grup']   = $this->M_group->get_all();                
                $data['record'] = $this->M_komplain->getkode($id_complain)->row_array();
                $this->template->display('backend/template','komplain/edit', $data);   
            } 
        }else{ 
                $id_complain    = $this->uri->segment(3);
                $data['aum']    = $this->M_aum->semua();
                $data['grup']   = $this->M_group->get_all();
                $data['record'] = $this->M_komplain->getcomplain($id_complain)->row_array();
                $this->template->display('backend/template','komplain/edit', $data);   
        }
    }

    function delete(){
        $this->M_komplain->hapus($this->uri->segment(3));
    } 

}