<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Diagram extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array('M_menu'));
        $this->load->library('session');
        chek_session();
    }
    
	public function index() {
		$min = $this->input->post('min-date');
		$max = $this->input->post('max-date');

		if($min==''){
			//$min = date('Y-m-d', strtotime("-30 days"));
			$min = date('Y-m-01');
			$data['min_date'] = $min;
		}else{
			$data['min_date'] = $this->input->post('min-date');
		}

		if($max==''){
			$max = date('Y-m-d');
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

		$data['total'] = $this->M_menu->total($min, $max);

        $this->template->display('backend/template','diagram', $data);   
    }

    public function statistik_aum()
	{
		$min = $this->input->post('min-date');
		$max = $this->input->post('max-date');

		if($min==''){
			//$min = date('Y-m-d', strtotime("-30 days"));
			$min = date('Y-m-01');
			$data['min_date'] = $min;
		}else{
			$data['min_date'] = $this->input->post('min-date');
		}

		if($max==''){
			$max = date('Y-m-d');
			$data['max_date'] = $max;
		}else{
			$data['max_date'] = $this->input->post('max-date');
		}

		/*** PIE PAYMENT ***/
		$array_kategori = array('Jumlah Data Masuk');
		$array_series = array(array('name'=>'Jumlah Data', 'data'=>array()));
		$array_datas = array();
		$data_payment = $this->M_menu->get_pie_aum($min, $max);

		$i=0;
		while($i < count($data_payment)){
		$array_datas[$data_payment[$i]['nama']] = intval($data_payment[$i]['total']);
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

	public function statistik_status()
	{
		$min = $this->input->post('min-date');
		$max = $this->input->post('max-date');

		if($min==''){
			//$min = date('Y-m-d', strtotime("-30 days"));
			$min = date('Y-m-01');
			$data['min_date'] = $min;
		}else{
			$data['min_date'] = $this->input->post('min-date');
		}

		if($max==''){
			$max = date('Y-m-d');
			$data['max_date'] = $max;
		}else{
			$data['max_date'] = $this->input->post('max-date');
		}

		/*** PIE PAYMENT ***/
		$array_kategori = array('Jumlah Data Masuk');
		$array_series = array(array('name'=>'Jumlah Data', 'data'=>array()));
		$array_datas = array();
		$data_payment = $this->M_menu->get_pie_status($min, $max);

		$i=0;
		while($i < count($data_payment)){
		$array_datas[$data_payment[$i]['status']] = intval($data_payment[$i]['total']);
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

	public function statistik_daily()
	{
		$min = $this->input->post('min-date');
		$max = $this->input->post('max-date');

		if($min==''){
			//$min = date('Y-m-d', strtotime("-30 days"));
			$min = date('Y-m-01');
			$data['min_date'] = $min;
		}else{
			$data['min_date'] = $this->input->post('min-date');
		}

		if($max==''){
			$max = date('Y-m-d');
			$data['max_date'] = $max;
		}else{
			$data['max_date'] = $this->input->post('max-date');
		}

		$array_kategori = array('Jumlah Data Masuk');
		$array_series = array(array('name'=>'Jumlah Data', 'data'=>array()));
		$array_datas = array();
		$data_payment = $this->M_menu->get_pie_daily($min, $max);

		$i=0;
		while($i < count($data_payment)){
		$array_datas[$data_payment[$i]['periode']] = intval($data_payment[$i]['total']);
		$i++;
		}
		 
		// set value per data grafik
		foreach($array_datas as $key=>$val){
		array_push($array_series[0]['data'], array((string)$key, $val));
		}
		 
		$data['array_kategori'] = json_encode($array_kategori);
		$data['pie'] = json_encode($array_series);

		$data['total'] = $this->M_menu->total($min, $max);

		$this->template->display('backend/template','diagram', $data);
	}

	public function excel_diagram()
	{
		$awal  = $this->input->post('min');
		$akhir = $this->input->post('max');

        $data['tampil']     = $this->M_menu->excel_diagram($awal, $akhir);
        $data['awal']       = substr($awal, -2).'-'.substr($awal, 5, 2).'-'.substr($awal, 0,4);
        $data['akhir']      = substr($akhir, -2).'-'.substr($akhir, 5, 2).'-'.substr($akhir, 0,4);

        $this->load->view('excel/excel_diagram', $data);
	}

	public function excel_daily()
	{
		$awal  = $this->input->post('min');
		$akhir = $this->input->post('max');

        $data['tampil']     = $this->M_menu->excel_daily($awal, $akhir);
        $data['awal']       = substr($awal, -2).'-'.substr($awal, 5, 2).'-'.substr($awal, 0,4);
        $data['akhir']      = substr($akhir, -2).'-'.substr($akhir, 5, 2).'-'.substr($akhir, 0,4);

        $this->load->view('excel/excel_daily', $data);
	}

	public function excel_aum()
	{
		$awal  = $this->input->post('min');
		$akhir = $this->input->post('max');

        $data['tampil']     = $this->M_menu->excel_aum($awal, $akhir);
        $data['awal']       = substr($awal, -2).'-'.substr($awal, 5, 2).'-'.substr($awal, 0,4);
        $data['akhir']      = substr($akhir, -2).'-'.substr($akhir, 5, 2).'-'.substr($akhir, 0,4);

        $this->load->view('excel/excel_aum', $data);
	}

	public function excel_status()
	{
		$awal  = $this->input->post('min');
		$akhir = $this->input->post('max');

        $data['tampil']     = $this->M_menu->excel_status($awal, $akhir);
        $data['awal']       = substr($awal, -2).'-'.substr($awal, 5, 2).'-'.substr($awal, 0,4);
        $data['akhir']      = substr($akhir, -2).'-'.substr($akhir, 5, 2).'-'.substr($akhir, 0,4);

        $this->load->view('excel/excel_status', $data);
	}
}