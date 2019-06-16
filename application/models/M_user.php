<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_user extends CI_Model {

    protected $tb_user    = 'tb_user';
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function upd_lastlogin($username)
    {
       $res = $this->db->query("UPDATE ".$this->tb_user." SET last_login='".date('Y-m-d H:i:s')."' WHERE username='".$username."'");
            if($res)
            { 
                redirect(base_url('dashboard')); 
            }
    }

    function registrasi($jenis, $nomor, $nama, $ttl, $alamat, $telp, $pekerjaan, $jk, $email, $username, $password){
        $keylogin   = $this->config->item('key_login');
            if($jenis=='nbm'){ $role = 'wargaMuh'; }else{ $role = 'Umum'; }
            $datauser = array(
                        'jenis_identitas'   => $jenis,
                        'no_identitas'      => $nomor,
                        'nama_user'         => $nama,
                        'tgl_lahir'         => $ttl,
                        'alamat'            => $alamat,
                        'no_telp'           => $telp,
                        'pekerjaan'         => $pekerjaan,
                        'jenis_kelamin'     => $jk,
                        'email'             => $email,
                        'username'          => $username,
                        'password'          => sha1($password.$keylogin),
                        'role'              => $role,
                        'last_login'        => date('Y-m-d H:i:s'),
                        'grup_id'           => 1
                        );
            $res = $this->db->insert($this->tb_user, $datauser);
            $insert_id = $this->db->insert_id();
            $key = 'registrasi';
            if($res){ $this->send_email($email, $key); }
    }

    function update ($id, $nama, $jenisid, $noid, $jk, $alamat, $grup, $level, $password, $pekerjaan, $notelp, $email, $lampiran, $foto){
        $keylogin   = $this->config->item('key_login');
        if(empty($password))
        {
                $dataupdt = array(
                            'nama_user'         => $nama,
                            'jenis_identitas'   => $jenisid,
                            'no_identitas'      => $noid,
                            'jenis_kelamin'     => $jk,
                            'alamat'            => $alamat,
                            'grup_id'           => $grup,
                            'role'              => $level,
                            'pekerjaan'         => $pekerjaan,
                            'no_telp'           => $notelp,
                            'email'             => $email,
                            'lampiran_user'     => $lampiran,
                            'image_user'        => $foto
                                );
        }
        else
        {
            $dataupdt = array(
                            'nama_user'         => $nama,
                            'password'          => $password,
                            'jenis_identitas'   => $jenisid,
                            'no_identitas'      => $noid,
                            'jenis_kelamin'     => $jk,
                            'alamat'            => $alamat,
                            'grup_id'           => $grup,
                            'role'              => $level,
                            'pekerjaan'         => $pekerjaan,
                            'no_telp'           => $notelp,
                            'email'             => $email,
                            'lampiran_user'     => $lampiran,
                            'image_user'        => $foto
                                );
        }

        $this->db->where('id_user', $id);
        $res = $this->db->update($this->tb_user, $dataupdt);
            if($res){ redirect(base_url('user')); }

    }

    function updprofile($id, $nama, $password, $foto){
        $keylogin   = $this->config->item('key_login');
        $data   =   array(  'nama_user'     =>  $nama,
                            'password'      =>  SHA1($password . $keylogin),
                            'image_user'    => $foto
                          );

        $this->db->where('id_user',$id);
        $res = $this->db->update($this->tb_user,$data);
        if($res)
            { 
                redirect(base_url('dashboard')); 
            }
    }

    function delete($id){
        $this->db->where('id_user',$id);
        $this->db->delete($this->tb_user);
        redirect(base_url().'user');
    }

    function send_email($email, $key){

        $config['protocol']     = 'smtp';
        $config['smtp_host']    = 'smtp.sendgrid.net';
        $config['smtp_user']    = 'golden-case';
        $config['smtp_pass']    = 'h72wupFA496pNA';
        $config['smtp_port']    = '587';
        $config['mailtype']     = 'html';
        $config['charset']      = 'iso-8859-1';
        $config['wordwrap']     = TRUE;
        $config['crlf']         = "\r\n";
        $config['newline']      = "\r\n";

        $this->email->initialize($config);


        $getdata = $this->db->query("SELECT * FROM tb_user WHERE email ='".$email."'")->result_array();

        foreach ($getdata as $key => $input) {}

        $data = array(
                'nama'          => $input['nama_user'],
                'email'         => $input['email'],
                'password'      => substr($input['password'], 0, 8),
                    );

        $msg = $this->load->view('email_templates/registrasi',$data,true);    
        $this->email->subject('Selamat Datang di e-complaint PCM Bligo');
        $this->email->from('admin@pcm-bligo.com','Admin e-complaint PCM Bligo');
        $this->email->to($email);
        $this->email->cc('shinta.setiawati@gmail.com');
        $this->email->message($msg);
        if($this->email->send())
        {
            redirect(base_url().'dashboard');
        }else
        {
            redirect(base_url());
        
        }

    }

    function send_lupa($email, $key){

        //$this->load->library('email');

        $config['protocol']     = 'smtp';
        $config['smtp_host']    = 'smtp.sendgrid.net';
        $config['smtp_user']    = 'golden-case';
        $config['smtp_pass']    = 'h72wupFA496pNA';
        $config['smtp_port']    = '587';
        $config['mailtype']     = 'html';
        $config['charset']      = 'iso-8859-1';
        $config['wordwrap']     = TRUE;
        $config['crlf']         = "\r\n";
        $config['newline']      = "\r\n";

        $this->email->initialize($config);


        $getdata = $this->db->query("SELECT * FROM tb_user WHERE email ='".$email."'")->result_array();

        foreach ($getdata as $key => $input) {}

        $data = array(
                'nama'          => $input['nama_user'],
                'email'         => $input['email'],
                'password'      => substr($input['password'], 0, 8),
                    );

        $msg = $this->load->view('email_templates/forget',$data,true);    
        $this->email->subject('Lupa password di e-complaint PCM Bligo');
        $this->email->from('admin@pcm-bligo.com','Admin e-complaint PCM Bligo');
        $this->email->to($email);
        $this->email->cc('shinta.setiawati@gmail.com');
        $this->email->message($msg);
        if($this->email->send())
        {
            return 1;
        }else
        {
            redirect(base_url());
        
        }

    }

    function semua() {
        return $this->db->get($this->tb_user);
    }

    function get_user($id) {
        return $this->db->get_where($this->tb_user,'id_user = '.$id)->row_array();
    }

    function cekKode($kode) {
        $this->db->where("username", $kode);
        return $this->db->get($this->tb_user);
    }

}