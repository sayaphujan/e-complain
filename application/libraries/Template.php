<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template {
		var $template_data = array();
		
		function set($name, $value)
		{
			$this->template_data[$name] = $value;
		}

		function load($template = '', $view = '' , $view_data = array(), $return = FALSE)
		{               
			$this->CI =& get_instance();
			$this->set('header', $this->CI->load->view('frontend/header', '', TRUE));			
			$this->set('footer', $this->CI->load->view('frontend/footer', '', TRUE));			
			$this->set('content', $this->CI->load->view($view, $view_data, TRUE));			
			return $this->CI->load->view($template, $this->template_data, $return);
		}

		function display($template = '', $view = '' , $view_data = array(), $return = FALSE)
		{               
			$this->CI =& get_instance();
			$this->set('_header', $this->CI->load->view('backend/header', '', TRUE));			
			$this->set('_sidebar', $this->CI->load->view('backend/sidebar', '', TRUE));			
			$this->set('_content', $this->CI->load->view($view, $view_data, TRUE));			
			return $this->CI->load->view($template, $this->template_data, $return);
		}
}

/* End of file Template.php */
/* Location: ./system/application/libraries/Template.php */