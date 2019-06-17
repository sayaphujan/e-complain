<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->Model(array('M_user','M_group','M_menu','M_image'));
        chek_session();
    }
    
    function index() {       
        $data['record']=  $this->db->get('tb_user')->result();
        $this->template->display('backend/template','user/view', $data);    
    }

    function add() {
        if(isset($_POST['submit'])) {
            $this->form_validation->set_message('is_unique', '%s Sudah Ada');
            $this->form_validation->set_rules('u_name', 'username', 'trim|required|is_unique[tb_user.username]');
            $this->form_validation->set_rules('passwd', 'password', 'required');
            $this->form_validation->set_rules('nama', 'Nama Pengguna', 'required');
            $this->form_validation->set_rules('jeniskel', 'Jenis Kelamin', 'required');
            $this->form_validation->set_rules('alamatuser', 'Alamat User', 'required');  
            $this->form_validation->set_rules('level', 'Level Pengguna', 'required'); 
            $this->form_validation->set_rules('grup', 'User Grup', 'required');
            $this->form_validation->set_rules('notelp', 'Nomor Telepon', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
            $this->form_validation->set_rules('noidentitas', 'No Identitas', 'required');
            $this->form_validation->set_rules('lampiran', 'Lampiran User', 'required');
            if ($this->form_validation->run() == true) {
                $paswd = $this->input->post('passwd');
                $this->M_image->do_upload();
                $image = $this->upload->file_name;
                $data   =   array(  'username'      =>  $_POST['u_name'],
                                    'nama_user'     =>  $_POST['nama'],
                                    'jenis_kelamin' =>  $_POST['jeniskel'],
                                    'alamat'        =>  $_POST['alamatuser'],
                                    'password'      =>  SHA1($paswd . $this->config->item('key_login')),
                                    'grup_id'       =>  $_POST['grup'],
                                    'no_telp'       =>  $_POST['notelp'],
                                    'email'         =>  $_POST['email'],
                                    'pekerjaan'     =>  $_POST['pekerjaan'],
                                    'no_identitas'  =>  $_POST['noidentitas'],
                                    'lampiran_user' =>  $_POST['lampiran'],
                                    'last_login'    =>  date('Y-m-d h:i:s'),
                                    'role'          =>  $_POST['level'],
                                    'image_user'    =>  $image);
                $this->db->insert('tb_user',$data);
                redirect(base_url().'user');
            } else{
                $data['record']=$this->db->get_where('tb_grup')->result();            
                $this->template->display('backend/template','user/tambah', $data);   
            }
            
        }else {
            $data['record']=$this->db->get_where('tb_grup')->result();            
            $this->template->display('backend/template','user/tambah', $data);   
        }
    }
    
    function edit() {
        if(isset($_POST['submit'])) {      
            $config['upload_path']          = './assets/foto/';
            $config['allowed_types']        = 'jpg|png';
            $config['max_size']             = 2000;
            $config['overwrite']            = FALSE;
            $config['file_name']            = $_FILES['userfile']['name'];
 
            $this->load->library('upload', $config);

            $id         = $this->input->post('id');
            $nama       = $this->input->post('nama');
            $jenisid    = $this->input->post('jenisid');
            $noid       = $this->input->post('noidentitas');
            $jk         = $this->input->post('jeniskel');
            $alamat     = $this->input->post('alamatuser');
            $grup       = $this->input->post('grup');
            $level      = $this->input->post('level');
            $password   = SHA1($this->input->post('passwd').$this->config->item('key_login'));
            $pekerjaan  = $this->input->post('pekerjaan');
            $notelp     = $this->input->post('notelp');
            $email      = $this->input->post('email');
            $lampiran   = $this->input->post('lampiran');
            $img        = $this->input->post('image');
            $foto       = $_FILES['userfile']['name'];

            if($_FILES['userfile']['name']=='')
            {
                $this->M_user->update($id, $nama, $jenisid, $noid, $jk, $alamat, $grup, $level, $password, $pekerjaan, $notelp, $email, $lampiran, $img);
            }else{
                if (!$this->upload->do_upload('userfile')){
                    $id = $this->uri->segment(3);
                    $data['record']     =  $this->M_user->get_user($id);
                    $data['grup']       =  $this->M_group->get_all();
                    $data['katmenu']    =  $this->M_menu->get_katmenu();
                    $data['error']      =  $this->upload->display_errors();
                    $this->template->display('backend/template','user/edit', $data);   
                }else{
                    $this->M_user->update($id, $nama, $jenisid, $noid, $jk, $alamat, $grup, $level, $password, $pekerjaan, $notelp, $email, $lampiran, $foto);
                }
            }
        }else {
            $id = $this->uri->segment(3);
            $data['record']     =  $this->M_user->get_user($id);
            $data['grup']       =  $this->M_group->get_all();
            $data['katmenu']    =  $this->M_menu->get_katmenu();
            $data['error']      = '';
            $this->template->display('backend/template','user/edit', $data);   
        }
    }

    function profile(){
        if(isset($_POST['submit'])) {            
            
            $id     = $this->input->post('id');  
            $nama   = $this->input->post('nama');  
            $passwd = $this->input->post('passwd');  

            $config['upload_path']          = './assets/foto/';
            $config['allowed_types']        = 'jpg|png';
            $config['max_size']             = 2000;
            $config['overwrite']            = FALSE;
            $config['file_name']            = $_FILES['userfile']['name'];
 
            $this->load->library('upload', $config);

            if($_FILES['userfile']['name']==''){
                $foto   = $this->input->post('gambar'); 
                $this->M_user->updprofile($id, $nama, $passwd, $foto);
            }else{
                if (!$this->upload->do_upload('userfile')){
                    $id= $this->uri->segment(3);
                    $data['record']     =  $this->M_user->get_user($id);
                    $data['grup']       =  $this->M_group->get_all();
                    $data['katmenu']    =  $this->M_menu->get_katmenu();
                    $data['notif']      = '';
                    $data['error']      = $this->upload->display_errors();
                    $this->template->display('backend/template','user/profile', $data);  
                }else{ 
                    $foto       = $_FILES['userfile']['name'];
                    $this->M_user->updprofile($id, $nama, $passwd, $foto);
                }
            }
        }
        else {
            $id= $this->uri->segment(3);
            $data['record']     =  $this->M_user->get_user($id);
            $data['grup']       =  $this->M_group->get_all();
            $data['katmenu']    =  $this->M_menu->get_katmenu();
            $data['notif']      = '';
            $data['error']      = '';
            $this->template->display('backend/template','user/profile', $data);   
        }
    }

    function delete($id){
        $this->M_user->delete($id);
    }

}