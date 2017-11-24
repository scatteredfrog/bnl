<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bnl_sessions extends CI_Controller {

        function __construct(){
 		parent::__construct();
                $this->load->library('session');
	}	

	public function index()
	{
		$this->load->view('bnl_sessions');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */