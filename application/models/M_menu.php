<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_menu extends CI_Model {

    protected $tb_menu    = 'tb_menu';
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    function get_katmenu()
    {
       return $this->db->get_where($this->tb_menu, 'parent=0')->result();
    }

    function total($min, $max){
        return $this->db->query("select COUNT('*') as jumlah from tb_complain WHERE DATE(tgl_complain) BETWEEN '".$min."' AND '".$max."'")->row_array()['jumlah'];
    }

    function get_pie($min, $max){
        $res = $this->db->query("select 
                                    CASE WHEN jenis_complain = 'saran' THEN 'SARAN' ELSE 'KRITIK' END as jenis, 
                                    DATE(tgl_complain) as periode, 
                                    (SELECT COUNT(jenis_complain) FROM tb_complain WHERE jenis_complain='saran') as saran, 
                                    (SELECT COUNT(jenis_complain) FROM tb_complain WHERE jenis_complain='kritik') as kritik, 
                                    count(jenis_complain) as total 
                                from tb_complain
                                WHERE DATE(tgl_complain) BETWEEN '".$min."' AND '".$max."' 
                                GROUP BY jenis_complain
                                ORDER BY periode")->result_array();     

        return $res;
    }
}