<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Diagram extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array('M_menu'));
        chek_session();
    }
    
	public function index() {
		$min = $this->input->post('min-date');
		$max = $this->input->post('max-date');

		if($min==''){
			//$min = date('Y-m-d', strtotime("-30 days"));
			$min = date('Y/m/01');
			$data['min_date'] = $min;
		}else{
			$data['min_date'] = $this->input->post('min-date');
		}

		if($max==''){
			$max = date('Y/m/d');
			$data['max_date'] = $max;
		}else{
			$data['max_date'] = $this->input->post('max-date');
		}

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

		$data['chart_saran'] = $this->M_menu->get_saran($min, $max);
		$data['chart_kritik'] = $this->M_menu->get_kritik($min, $max);
		$data['category'] = $this->M_menu->get_category($min, $max);
		$data['report'] = $this->M_menu->report($min, $max);
		$data['total'] = $this->M_menu->total($min, $max);

        $this->template->display('backend/template','diagram', $data);   
    }

}