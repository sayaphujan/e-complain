<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->Model(array('M_user'));
        chek_session();
    }
    
    function index() {
        $data['title']      = "Home";
	    $grup               = $this->session->userdata('grup_id');
        $role               = $this->session->userdata('role');
	    $data['grup']       = $this->db->get_where('tb_grup',array('grup_id'=>$grup))->row_array();
        $this->template->display('backend/template','dashboard/index', $data);    
    }

}
