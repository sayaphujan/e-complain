<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_group extends CI_Model {

    protected $tb_grup    = 'tb_grup';
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    function get_all()
    {
       return $this->db->get($this->tb_grup)->result();
    }
}