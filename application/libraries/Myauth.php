<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Myauth{

	
	function __construct(){
		$this->ci =& get_instance();
	}

	public function set_database($db_name)
    {
		$db_data = $this->ci->load->database($db_name, TRUE);
		$this->ci->db = $db_data;
	}

	public function login($cond=array(),$table, $join){
	/* $cond = username & password */
	
		$data = array();
		/*foreach ($cond as $key => $value) {
			$data[$key] = $value;
		}*/

		$data['username'] = $cond['username'];
		$data['password'] = sha1($cond['password'].$cond['keylogin']);

		$get_paswd = $this->ci->db->query("SELECT * FROM ".$table." WHERE username='".$data['username']."'");
		foreach ($get_paswd->result_array() as $p) { 
			$password = substr($p['password'], 0, 8);

			if($cond['password'] == $password){
				$query = $this->ci->db->query("SELECT * FROM ".$table." JOIN ".$join." ON ".$join.".grup_id = ".$table.".grup_id WHERE ".$table.".username = '".$data['username']."'");
					if($query->num_rows() != 1){
						return false;
					}else{
						return $query->row();
					}
			}else{
				$query = $this->ci->db->query("SELECT * FROM ".$table." JOIN ".$join." ON ".$join.".grup_id = ".$table.".grup_id WHERE ".$table.".username = '".$data['username']."' AND ".$table.".password = '".$data['password']."'");
					if($query->num_rows() != 1){
						return false;
					}else{
						return $query->row();
					}
			}
			//echo '<script>console.log('.$password.' - '.$cond['password'].');</script>';
		}
	}


	function logged_in(){
	/* kalo input url, dan level != 6 redirect to beranda */
	/* modul ini dipanggil di Controller/mahasiswa*/
	
		$ses = $this->ci->session->userdata('idsession');
		
		if($ses == 'id_user'){
			header('location: '.site_url('panel'));
		}
	}

	function logout($props=array(),$page){
	/* $page nya Mahasiswa ke beranda */
	/* $page nya Dosen ke admin/login */
	
		foreach($props as $key => $value){
			
			$this->ci->session->unset_userdata($value);
			
		}

		header('location: '.site_url($page));
	}
}