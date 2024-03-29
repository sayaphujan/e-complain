<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct() {
        parent::__construct();
        $this->load->model(array('M_menu'));
    }

	public function index()
	{
		$this->template->load('frontend','frontend/home');
	}

	public function statistik()
	{

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

		$data['total'] = $this->M_menu->total($min, $max);

		$this->template->load('frontend','frontend/statistik_aum', $data);
	}

	public function statistik_aum()
	{
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

		$this->template->load('frontend','frontend/statistik_aum', $data);
	}

	public function statistik_status()
	{
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

		$this->template->load('frontend','frontend/statistik_aum', $data);
	}

	public function statistik_daily()
	{
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
		/*** END ***/

		$data['total'] = $this->M_menu->total($min, $max);

		$this->template->load('frontend','frontend/statistik_aum', $data);
	}

	public function get_nbm($id){
		$data = $this->db->where('id', $id)->get('tb_warga')->result();
		echo json_encode($data);
	}
}
