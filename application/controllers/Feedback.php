<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Feedback extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array('M_komplain', 'M_image'));
        chek_session();
    }
    
	public function index() {
        $data['record'] = $this->M_komplain->semua()->result(); 
        $this->template->display('backend/template','feedback/view', $data);   
    }
    
    function tampil() {
        $data=$this->M_komplain->semua()->result();
        $no=1;
        foreach ($data as $r){ 
        $qury[]=array(
            'no'                => $no++,
            'nama_user'         => $r->nama_user,
            'nama_user'         => $r->nama_user,
            'nama_aum'          => $r->nama_aum,
            'judul_complain'    => $r->judul_complain,
            'jenis_complain'    => $r->jenis_complain,
            'kategori'          => $r->kategori,
            'tgl_complain'      => $r->tgl_complain,
            'solusi'            => $r->solusi,
            'status_complain'   => $r->status_complain,
            'status'            => $r->status,
            'nama_grup'         => $r->nama_grup,
            'edit'        => anchor('feedback/edit/' . $r->id_complain, '<i class="btn btn-info btn-sm glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit"></i>'),
            'delete'      => anchor('feedback/delete/' . $r->id_complain, '<i class="btn-sm btn-info glyphicon glyphicon-trash" data-toggle="tooltip" title="Delete"></i>', array('onclick' => "return confirm('Data Akan di Hapus?')"))          
            ); 
            };
            $result = array('data' => $qury);
            echo json_encode($result);                      
    }



    //Fungsi untuk CRUD dari AUM
    function tambah() {                
        if (isset($_POST['submit'])) {
            $this->M_image->do_upload();
            $image= $this->upload->file_name;
            $data = array(
                'nama_aum'   => $this->input->post('nama_aum'),
                'jenis_aum'  => $this->input->post('jenis_aum'),
                'deskripsi_aum'     => $this->input->post('deskripsi_aum'),
                'image_aum'   => $image
            );
            $this->M_komplain->simpan($data);
            redirect(base_url().'aum');
        } else {            
            $this->template->display('backend/template','feedback/tambah');   
        }
    }

        
    function edit($id_aum) {       
        if (isset($_POST['submit'])) {
            $this->form_validation->set_rules('nama_aum', '', 'required', array('required' => 'Nama AUM & ORTOM Harus Diisi.'));
            $this->form_validation->set_rules('deskripsi_aum', '', 'required', array('required' => 'Deskripsi AUM & ORTOM Harus Diisi.'));
            if ($this->form_validation->run() == true) {
                $this->M_image->do_upload();
                $image = $this->upload->file_name;
                if ($image = $this->upload->file_name==0) {
                    $data = array(
                        'nama_aum' => $this->input->post('nama_aum'),
                        'jenis_aum' => $this->input->post('jenis_aum'),
                        'deskripsi_aum' => $this->input->post('deskripsi_aum')
                    );
                    $kode=$this->input->post('id_aum');
                    $this->M_komplain->edit($kode,$data);
                    redirect(base_url().'aum');
                }else{
                    $this->M_image->do_upload();
                    $image = $this->upload->file_name;
                    $data = array(
                        'nama_aum' => $this->input->post('nama_aum'),
                        'jenis_aum' => $this->input->post('jenis_aum'),
                        'deskripsi_aum' => $this->input->post('deskripsi_aum'),
                        'image_aum' => $image
                    );
                    $kode=$this->input->post('id_aum');
                    $this->M_komplain->edit($kode,$data);
                    redirect(base_url().'aum');
                }                
            }else {
                $id_aum = $this->input->post('id_aum');                                     
                $data['record'] = $this->M_komplain->getkode($id_aum)->row_array();
                $this->template->display('backend/template','feedback/edit', $data);   
            } 
           }else{ 
                //$id = $this->uri->segment(3);
                //$data['aum']=$this->db->get_where('tb_master_aum',array('id_aum'=>$id_aum))->row();
                $data['record'] = $this->M_komplain->getkode($id_aum)->row_array();
                $this->template->display('backend/template','feedback/edit', $data);   
            }
    }

    function delete(){
        $this->M_komplain->hapus($this->uri->segment(3));
    }


    
    

}