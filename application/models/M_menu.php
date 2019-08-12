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

    function get_pie_aum($min, $max){
        $res = $this->db->query("select 
                                    a.id_aum as jenis,
                                    b.nama_aum as nama,
                                    count(a.id_aum) as jumlah,
                                                DATE(a.tgl_complain) as periode, 
                                                count(a.jenis_complain) as total 
                                from tb_complain a, tb_master_aum b
                                WHERE a.id_aum = b.id_aum AND DATE(a.tgl_complain) BETWEEN '".$min."' AND '".$max."' 
                                GROUP BY a.id_aum
                                ORDER BY periode")->result_array();     

        return $res;
    }

    function get_pie_status($min, $max){
        $res = $this->db->query("select 
                                    CASE WHEN status = 'pending' THEN 'PENDING' WHEN status = 'diterima' THEN 'DITERIMA' ELSE 'DITOLAK' END as status, 
                                    DATE(tgl_complain) as periode, 
                                    (SELECT COUNT(status) FROM tb_complain WHERE status='pending') as pending, 
                                    (SELECT COUNT(status) FROM tb_complain WHERE status='diterima') as diterima, 
                                    (SELECT COUNT(status) FROM tb_complain WHERE status='ditolak') as ditolak,
                                    count(status) as total 
                                from tb_complain 
                                WHERE DATE(tgl_complain) BETWEEN '".$min."' AND '".$max."' 
                                GROUP BY status
                                ORDER BY periode")->result_array();     

        return $res;
    }

    function get_pie_daily($min, $max){
        $res = $this->db->query("select 
                                    count(id_complain) as jumlah,
                                    DATE(tgl_complain) as periode, 
                                    count(id_complain) as total 
                                from tb_complain 
                                WHERE DATE(tgl_complain) BETWEEN '".$min."' AND '".$max."' 
                                GROUP BY tgl_complain
                                ORDER BY periode")->result_array();     

        return $res;
    }

    function excel_daily($min, $max){
        $res = $this->db->query("SELECT 
                                    c.id_complain,
                                    c.id_user,
                                    c.id_aum,
                                    c.judul_complain,
                                    c.jenis_complain,
                                    c.tgl_complain,
                                    c.status_complain,
                                    c.grup_id,
                                    g.nama_grup,
                                    a.nama_aum,
                                    u.nama_user
                                FROM tb_complain c, tb_grup g, tb_master_aum a, tb_user u
                                WHERE c.grup_id = g.grup_id
                                AND c.id_aum = a.id_aum
                                AND c.id_user = u.id_user
                                AND DATE(tgl_complain) BETWEEN '".$min."' AND '".$max."'
                                ORDER BY tgl_complain");

        return $res;
    }

    function excel_aum($min, $max){
        $res = $this->db->query("SELECT 
                                    b.nama_aum,
                                    g.nama_grup,
                                    (SELECT COUNT(*) FROM tb_complain WHERE id_aum=a.id_aum AND jenis_complain='saran') as SARAN,
                                    (SELECT COUNT(*) FROM tb_complain WHERE id_aum=a.id_aum AND jenis_complain='kritik') as KRITIK,
                                    (SELECT COUNT(*) FROM tb_complain WHERE id_aum=a.id_aum) as JUMLAH
                                FROM tb_complain a, tb_master_aum b, tb_grup g
                                WHERE a.id_aum = b.id_aum 
                                AND a.grup_id = g.grup_id
                                AND DATE(a.tgl_complain) BETWEEN '".$min."' AND '".$max."' 
                                GROUP BY a.id_aum
                                ORDER BY b.nama_aum");

        return $res;
    }

    function excel_status($min, $max){
        $res = $this->db->query("SELECT 
                                    b.nama_aum,
                                    g.nama_grup,
                                    (SELECT COUNT(status) FROM tb_complain WHERE id_aum=a.id_aum AND status='pending') as pending, 
                                    (SELECT COUNT(status) FROM tb_complain WHERE id_aum=a.id_aum AND status='diterima') as diterima, 
                                    (SELECT COUNT(status) FROM tb_complain WHERE id_aum=a.id_aum AND status='ditolak') as ditolak,
                                    (SELECT COUNT(*) FROM tb_complain WHERE id_aum=a.id_aum) as jumlah,
                                    (SELECT COUNT(*) FROM tb_complain) as total
                                FROM tb_complain a, tb_master_aum b, tb_grup g
                                WHERE a.id_aum = b.id_aum 
                                AND a.grup_id = g.grup_id
                                AND DATE(a.tgl_complain) BETWEEN '".$min."' AND '".$max."' 
                                GROUP BY a.id_aum
                                ORDER BY b.nama_aum");


        return $res;
    }

    function excel_diagram($min, $max){
        $res = $this->db->query("SELECT 
                                    CASE WHEN jenis_complain = 'saran' THEN 'SARAN' ELSE 'KRITIK' END as jenis, 
                                    (SELECT COUNT(status) FROM tb_complain WHERE jenis_complain=jenis AND status='pending') as pending, 
                                    (SELECT COUNT(status) FROM tb_complain WHERE jenis_complain=jenis AND status='diterima') as diterima, 
                                    (SELECT COUNT(status) FROM tb_complain WHERE jenis_complain=jenis AND status='ditolak') as ditolak,
                                    (SELECT COUNT(*) FROM tb_complain WHERE jenis_complain=jenis) as jumlah,
                                    (SELECT COUNT(*) FROM tb_complain) as total
                                FROM tb_complain
                                WHERE DATE(tgl_complain) BETWEEN '".$min."' AND '".$max."'
                                GROUP BY jenis
                                ORDER BY jenis");

        return $res;
    }

}