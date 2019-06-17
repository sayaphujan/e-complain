<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Diagram extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array('M_menu'));
        chek_session();
    }
    
	public function index() {
		/*** PIE PAYMENT ***/
		$array_kategori = array('Jumlah Data');
		$array_series = array(array('name'=>'Jumlah Data', 'data'=>array()));
		$array_datas = array();
		$data_payment = $this->M_menu->get_pie($min, $max);

		$i=0;
		while($i < count($data_payment)){
		$array_datas[$data_payment[$i]['jenis']] = intval($data_payment[$i]['total']);
		$i++;
		}
		 
		// set value per data grafik
		foreach($array_datas as $key=>$val){
		array_push($array_series[0]['data'], array((string)$key, $val));
		}
		 
		$data['array_kategori'] = json_encode($array_kategori);
		$data['pie'] = json_encode($array_series);
		/*** END ***/

		$data['total'] = $this->M_menu->total($min, $max);

        $this->template->display('backend/template','diagram', $data);   
    }

}