<?php

class Banadmin extends CI_Controller {
               
	function __construct()
	{
 		parent::__construct();
		$this->load->library('form_validation');
                $this->load->library('session');
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('bnl_admin_model');
	}	
	function index()
	{			
		$this->form_validation->set_rules('bnl_admin_username', 'User name', 'required|xss_clean');			
		$this->form_validation->set_rules('bnl_admin_password', 'Password', 'required|xss_clean');
			
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$this->load->view('bnl-admin-form_view');
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model
			
			$form_data = array(
                            'bnl_admin_username' => set_value('bnl_admin_username'),
                            'bnl_admin_password' => set_value('bnl_admin_password')
                        );
                        $result=$this->bnl_admin_model->verifySignin($form_data);
                        foreach($result as $row)
                        {
                            $userName=$row['admin_username'];
                        }
                        if(isset($userName) && $userName!="")
                        {
                            $sessionData=array('bnl_admin_username'=>$userName);
                            $this->session->set_userdata($sessionData);
                            $this->success();
                        }
					
		}
	}
	function success() {
            $this->load->view('banadmin-menu');
        }
}
?>