<?php
class M_image extends CI_Model {
  
 var $gallery_path;
 var $gallery_path_url;
  
 function __construct() {
  parent::__construct();
   
  $this->gallery_path = realpath(APPPATH . '../assets/foto/');
  $this->gallery_path_url = base_url().'assets/foto/';
 }
  
 function do_upload() {
   
  $config = array(
   'allowed_types' => 'jpg|jpeg|gif|png|bmp',
   'upload_path' => $this->gallery_path,
   'encrypt_name' => true,
   'max_size' => 2000
  );
   
  $this->load->library('upload', $config);
  $this->upload->do_upload();
  $image_data = $this->upload->data();
   
 $this->load->library('image_lib');
  $config = array(
   'image_library'   => 'gd2',
   'source_image' => $image_data['full_path'],
   'new_image' => $this->gallery_path . '/thumbs',
   'maintain_ratio' => false,
   'width' => 250,
  );
   
  $data = $this->image_lib->get_image_properties($config['source_image'], true);
  $config['height'] = ($config['width'] / $data['width']) * $data['height'];

  $this->image_lib->initialize($config);
  $this->image_lib->resize();

  /*$config = array(
   'source_image' => $this->gallery_path . '/thumbs',
   'new_image' => $this->gallery_path . '/thumbs_crop',
   
   'width' => 200,
   'height' => 230,
   'x_axis'=> '0',
   'y_axis'=>'0'
  );
   
  $this->load->library('image_lib', $config);
  $this->image_lib->crop(); */
   
 }
  
 function get_images() {
   
  $files = scandir($this->gallery_path);
  $files = array_diff($files, array('.', '..', 'thumbs'));
   
  $images = array();
   
  foreach ($files as $file) {
   $images []= array (
    'url' => $this->gallery_path_url . $file,
    'thumb_url' => $this->gallery_path_url . 'thumbs/' . $file
   );
  }
   
  return $images;
 }
  
}