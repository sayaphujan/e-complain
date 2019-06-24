<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->Model(array('M_user'));
    }

	function index()
	{
		$original_string = array_merge(range(0,9), range('a','z'), range('A', 'Z'));
        $original_string = implode("", $original_string);
        $captcha = substr(str_shuffle($original_string), 0, 6);

            $vals = array(
			        'word'          => $captcha,
			        'img_path'      => './captcha/',
			        'img_url'       => base_url().'/captcha/',
			        'font_path'     => './path/to/fonts/texb.ttf',
			        'img_width'     => '150',
			        'img_height'    => 30,
			        'expiration'    => 7200,
			        'word_length'   => 8,
			        'font_size'     => 20,
			        'img_id'        => 'Imageid',
			        'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

			        // White background and border, black text and red grid
			        'colors'        => array(
			                'background' => array(255, 255, 255),
			                'border' => array(255, 255, 255),
			                'text' => array(0, 0, 0),
			                'grid' => array(255, 40, 40)
			        )
			);

			$cap = create_captcha($vals);
 
            // store image html code in a variable
            $data = array(
            	'image'    => $cap['image'],
            	'word'	   => $vals['word'],
				'username' => '',
				'password' => '',
				'captcha'  => '',
				'role' 	   => 'Administrator',
				'src'	   => 'assets/img/person.png',
                'title'    => 'Login Administrator',
                'value'    => 'Administrator',
				);

			$this->template->load('frontend','frontend/login', $data);
	}

	function muh()
	{
		$original_string = array_merge(range(0,9), range('a','z'), range('A', 'Z'));
        $original_string = implode("", $original_string);
        $captcha = substr(str_shuffle($original_string), 0, 6);

            $vals = array(
			        'word'          => $captcha,
			        'img_path'      => './captcha/',
			        'img_url'       => base_url().'/captcha/',
			        'font_path'     => './path/to/fonts/texb.ttf',
			        'img_width'     => '150',
			        'img_height'    => 30,
			        'expiration'    => 7200,
			        'word_length'   => 8,
			        'font_size'     => 20,
			        'img_id'        => 'Imageid',
			        'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

			        // White background and border, black text and red grid
			        'colors'        => array(
			                'background' => array(255, 255, 255),
			                'border' => array(255, 255, 255),
			                'text' => array(0, 0, 0),
			                'grid' => array(255, 40, 40)
			        )
			);

			$cap = create_captcha($vals);
 
            // store image html code in a variable
            $data = array(
            	'image'    => $cap['image'],
            	'word'	   => $vals['word'],
				'username' => '',
				'password' => '',
				'captcha'  => '',
				'role' 	   => 'WargaMuh',
				'src' 	   => 'assets/img/logo.png',
                'title'    => 'Login Warga Muhammadiyah',
                'value'    => 'WargaMuh'
				);

			$this->template->load('frontend','frontend/login', $data);
    }

    function registrasi()
	{
		$original_string = array_merge(range(0,9), range('a','z'), range('A', 'Z'));
        $original_string = implode("", $original_string);
        $captcha = substr(str_shuffle($original_string), 0, 6);

            $vals = array(
			        'word'          => $captcha,
			        'img_path'      => './captcha/',
			        'img_url'       => base_url().'/captcha/',
			        'font_path'     => './path/to/fonts/texb.ttf',
			        'img_width'     => '150',
			        'img_height'    => 30,
			        'expiration'    => 7200,
			        'word_length'   => 8,
			        'font_size'     => 20,
			        'img_id'        => 'Imageid',
			        'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

			        // White background and border, black text and red grid
			        'colors'        => array(
			                'background' => array(255, 255, 255),
			                'border' => array(255, 255, 255),
			                'text' => array(0, 0, 0),
			                'grid' => array(255, 40, 40)
			        )
			);

			$cap = create_captcha($vals);
 
            // store image html code in a variable
            $data = array(
            	'image'    => $cap['image'],
            	'word'	   => $vals['word'],
            	'jenis'    => '',
            	'nomor'	   => '',
            	'nama'     => '',
            	'ttl'	   => '',
            	'jk'	   => '',
            	'alamat'   => '',
            	'telp'	   => '',
            	'pekerjaan'=> '',
            	'email'    => '',
				'username' => '',
				'password' => '',
				'captcha'  => '',
				'grup_id'  => ''
				);

            $data['record']=$this->db->get_where('tb_grup')->result();   
			$this->template->load('frontend','frontend/registrasi', $data);
    }

    function forget()
	{
            $data = array(
            	'email'    => '',
            	'message'  => ''
				);

			$this->template->load('frontend','frontend/forget', $data);
    }

	function submitmuh()
	{
		$username 	= $this->input->post('username');		
		$password 	= $this->input->post('password');
		$captchapost= $this->input->post('captcha');
		$word 	 	= $this->input->post('word');
		$role 	 	= $this->input->post('role');

			  if($role =='WargaMuh'){
                $src = 'assets/img/logo.png';
                $title = 'Login Warga Muhammadiyah';
                $value = 'WargaMuh';
              }else if($role == 'Umum'){
                $src = 'assets/img/person.png';
                $title = 'Login Masyarakat Umum';
                $value = 'Umum';
              }else{
                $src = 'assets/img/person.png';
                $title = 'Login Administrator';
                $value = 'Administrator';
              }

		$this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_user_check');
		$this->form_validation->set_rules('word','word','required');
		$this->form_validation->set_rules('captcha','Kode Keamanan','required|callback__notMatch');
		$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

		if($this->form_validation->run() == FALSE){

			$original_string = array_merge(range(0,9), range('a','z'), range('A', 'Z'));
	        $original_string = implode("", $original_string);
	        $captcha = substr(str_shuffle($original_string), 0, 6);

	            $vals = array(
				        'word'          => $captcha,
				        'img_path'      => './captcha/',
				        'img_url'       => base_url().'/captcha/',
				        'font_path'     => './path/to/fonts/texb.ttf',
				        'img_width'     => '150',
				        'img_height'    => 30,
				        'expiration'    => 7200,
				        'word_length'   => 8,
				        'font_size'     => 20,
				        'img_id'        => 'Imageid',
				        'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

				        // White background and border, black text and red grid
				        'colors'        => array(
				                'background' => array(255, 255, 255),
				                'border' => array(255, 255, 255),
				                'text' => array(0, 0, 0),
				                'grid' => array(255, 40, 40)
				        )
				);

				$cap = create_captcha($vals);
	 
	            // store image html code in a variable
	            $data = array(
            	'image'    => $cap['image'],
            	'word'	   => $vals['word'],
				'username' => $username,
				'password' => $password,
				'captcha'  => '',
				'role'     => $role,
				'src'      => $src,
				'title'    => $title,
				'value'    => $value
				);

	            $this->template->load('frontend','frontend/login', $data);
				
		}else{
			$this->M_user->upd_lastlogin($username);
		}
	}

	function _notMatch($captcha)
	{
		$word   = $this->input->post('word');
		if($captcha != $word){
		   $this->form_validation->set_message('_notMatch', 'Kode keamanan tidak cocok.');
		   return false;
		}
		return true;
	}

	public function user_check($password)
    {
    	$keylogin 	= $this->config->item('key_login');
        $username   = $this->input->post('username');
        $table      = 'tb_user';
        $join       = 'tb_grup';
    

        $cond = array();
        $cond['username']  = $username;
        //$cond['password']  = sha1($password.$keylogin);
        $cond['password']  = $password;
        $cond['keylogin']  = $keylogin;

        $this->myauth->set_database('default');
        $result = $this->myauth->login($cond,$table,$join);

        if($result == FALSE ){

            $this->form_validation->set_message('user_check','Username atau password Anda salah');
            return FALSE;
        }else{
            $ses = $result->username;

            if($result->role == 'WargaMuh'){ $level = 'Warga Muhammadiyah'; }
            	else if($result->role == 'Umum'){ $level = 'Masyarakat Umum'; }
            		else{ $level = 'Administrator'; }

            if($this->input->post('role') != $result->role)
            {
            	$this->form_validation->set_message('user_check','Anda terdaftar sebagai '.$level.'. Gunakan menu login yang sesuai dengan user Anda. Terima kasih.');
            	return FALSE;
            }else{
            	$session = array(
                'id_user'        => $result->id_user,
                'username'       => $result->username,
                'nama_user'      => $result->nama_user,
                'image_user'     => $result->image_user,
                'role'           => $result->role,
                'email'        	 => $result->email,
                'noid'       	 => $result->no_identitas,
                'last_login'     => $result->last_login,
                'grup_id'     	 => $result->grup_id,
                'grup'     	 	 => $result->nama_grup,
                'status_login'	 => 'login_diterima'
                );

	            $this->session->set_userdata($session);
	            $this->session->set_userdata('logged_in', TRUE); 

	            return TRUE;
            }
        }

    }

	function regmuh()
	{
		$jenis 		= $this->input->post('jenis');
		$nomor 		= $this->input->post('nomor');
		$nama 		= $this->input->post('nama');
		$ttl 		= $this->input->post('ttl');
		$jk 		= $this->input->post('jk');
		$alamat 	= $this->input->post('alamat');
		$telp 		= $this->input->post('telp');
		$pekerjaan 	= $this->input->post('pekerjaan');
		$username 	= $this->input->post('username');		
		$password 	= $this->input->post('password');
		$email 		= $this->input->post('email');
		$grup 		= $this->input->post('grup');
		$captcha 	= $this->input->post('captcha');
		$word 	 	= $this->input->post('word');

		$this->form_validation->set_rules('word','word','required');
		$this->form_validation->set_rules('captcha','Kode Keamanan','required|callback__notMatch');
		$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

		if($this->form_validation->run() == FALSE){

			$original_string = array_merge(range(0,9), range('a','z'), range('A', 'Z'));
	        $original_string = implode("", $original_string);
	        $captcha = substr(str_shuffle($original_string), 0, 6);

	            $vals = array(
				        'word'          => $captcha,
				        'img_path'      => './captcha/',
				        'img_url'       => base_url().'/captcha/',
				        'font_path'     => './path/to/fonts/texb.ttf',
				        'img_width'     => '150',
				        'img_height'    => 30,
				        'expiration'    => 7200,
				        'word_length'   => 8,
				        'font_size'     => 20,
				        'img_id'        => 'Imageid',
				        'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

				        // White background and border, black text and red grid
				        'colors'        => array(
				                'background' => array(255, 255, 255),
				                'border' => array(255, 255, 255),
				                'text' => array(0, 0, 0),
				                'grid' => array(255, 40, 40)
				        )
				);

				$cap = create_captcha($vals);
				$data = array(
		            	'image'    => $cap['image'],
		            	'word'	   => $vals['word'],
		            	'jenis'    => $jenis,
		            	'nomor'	   => $nomor,
		            	'nama'     => $nama,
		            	'ttl'	   => $ttl,
		            	'jk'	   => $jk,
		            	'alamat'   => $alamat,
		            	'telp'	   => $telp,
		            	'pekerjaan'=> $pekerjaan,
		            	'email'    => $email,
						'username' => $username,
						'password' => $password,
						'captcha'  => $captcha
						);
				$this->template->load('frontend','frontend/registrasi', $data);
		}else{
			$this->M_user->registrasi($jenis, $nomor, $nama, $ttl, $alamat, $telp, $pekerjaan, $jk, $email, $grup, $username, $password);
		}
	}

	function forgetmuh()
	{
		$email 		= $this->input->post('email');
		$key 		= 'forget';
		$kirim = $this->M_user->send_lupa($email, $key);
		if($kirim == 1){
			$data = array(
            	'email'    => '',
            	'message'  => 'Silakan periksa email Anda'
				);

			$this->template->load('frontend','frontend/forget', $data);
		}
	}

	function umum()
	{
		$original_string = array_merge(range(0,9), range('a','z'), range('A', 'Z'));
        $original_string = implode("", $original_string);
        $captcha = substr(str_shuffle($original_string), 0, 6);

            $vals = array(
			        'word'          => $captcha,
			        'img_path'      => './captcha/',
			        'img_url'       => base_url().'/captcha/',
			        'font_path'     => './path/to/fonts/texb.ttf',
			        'img_width'     => '150',
			        'img_height'    => 30,
			        'expiration'    => 7200,
			        'word_length'   => 8,
			        'font_size'     => 20,
			        'img_id'        => 'Imageid',
			        'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

			        // White background and border, black text and red grid
			        'colors'        => array(
			                'background' => array(255, 255, 255),
			                'border' => array(255, 255, 255),
			                'text' => array(0, 0, 0),
			                'grid' => array(255, 40, 40)
			        )
			);

			$cap = create_captcha($vals);
 
            // store image html code in a variable
            $data = array(
            	'image'    => $cap['image'],
            	'word'	   => $vals['word'],
				'username' => '',
				'password' => '',
				'captcha'  => '',
				'role' 	   => 'Umum',
				'src' 	   => 'assets/img/person.png',
                'title'    => 'Login Masyarakat Umum',
                'value'    => 'Umum'
				);

		$this->template->load('frontend','frontend/login', $data);
	}
        
    function logout()
	{
        $this->session->sess_destroy();
        header('location: '.base_url());
	}
}