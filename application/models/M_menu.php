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

    function get_saran($min, $max){
        $res = $this->db->query("select DATE(tgl_complain) as tgl_saran, COUNT('*') as saran from tb_complain WHERE jenis_complain='saran' AND DATE(tgl_complain) BETWEEN '".$min."' AND '".$max."' GROUP BY DATE(tgl_complain)");
        //return array_column($res->result(), 'saran');
        if($res->num_rows() > 0){
            foreach($res->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

    function get_kritik($min, $max){
        $res = $this->db->query("select DATE(tgl_complain) as tgl_kritik, COUNT('*') as kritik from tb_complain WHERE jenis_complain='kritik' AND DATE(tgl_complain) BETWEEN '".$min."' AND '".$max."' GROUP BY DATE(tgl_complain)");
        //return array_column($res->result(), 'kritik');
        if($res->num_rows() > 0){
            foreach($res->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

    function get_category($min, $max){
        $res = $this->db->query("select DATE(tgl_complain) as tanggal from tb_complain WHERE DATE(tgl_complain) BETWEEN '".$min."' AND '".$max."' GROUP BY DATE(tgl_complain)");
        //return array_column($res->result(), 'jenis');
        if($res->num_rows() > 0){
            foreach($res->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

    function report($min, $max){
        $query = $this->db->query("select jenis_complain as jenis, count('*') as jumlah from tb_complain WHERE DATE(tgl_complain) BETWEEN '2019/06/01' AND '2019/06/15' GROUP BY jenis_complain");
         
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
}