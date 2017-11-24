<?php

class Addacap extends CI_Controller {
               
	function __construct()
	{
 		parent::__construct();
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('addacap_model');
                error_log("Constructor");
	}	
	function index()
	{			
		$this->form_validation->set_rules('song', 'Song:', 'required|xss_clean|max_length[255]');			
		$this->form_validation->set_rules('correct_lyric', 'Correct lyric:', 'required|xss_clean');			
		$this->form_validation->set_rules('misheard_as', 'Misheard as:', 'required|xss_clean');			
		$this->form_validation->set_rules('misheard_by', 'Your name or e-mail address:', 'trim|xss_clean|max_length[255]');			
		$this->form_validation->set_rules('anonymous', 'Check here if you wish to be anonymous:', 'xss_clean');
			
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
                    $this->load->view('addacap_header');
                    $this->load->view('addacap_view');
                    $this->load->view('footer_generic');
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model
			
			$form_data = array(
					       	'song' => set_value('song'),
					       	'correct_lyric' => set_value('correct_lyric'),
					       	'misheard_as' => set_value('misheard_as'),
					       	'misheard_by' => set_value('misheard_by'),
                                                'date_time' => date('Y-m-d H:i:s'),
                                                'is_latest' => 1
						);
			// run insert model to write data to db
			if ($this->addacap_model->SaveForm($form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
		}
	}
	function success()
	{
			echo 'this form has been successfully submitted with all validation being passed. All messages or logic here. Please note
			sessions have not been used and would need to be added in to suit your app';
	}
}
?>