<?php

class Addamovie extends CI_Controller {
               
	function __construct()
	{
 		parent::__construct();
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('addamovie_model');
	}	
	function index()
	{			
		$this->form_validation->set_rules('movieThought', 'What I THOUGHT I knew', 'required|xss_clean|max_length[255]');			
		$this->form_validation->set_rules('movieLearned', 'What I learned', 'required|xss_clean|max_length[2555]');			
		$this->form_validation->set_rules('movieWhich', 'Which Movie', '');
			
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$this->load->view('addamovie_view');
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model
			
			$form_data = array(
					       	'movieThought' => set_value('movieThought'),
					       	'movieLearned' => set_value('movieLearned'),
					       	'movieWhich' => set_value('movieWhich')
						);
					
			// run insert model to write data to db
		
			if ($this->addamovie_model->SaveForm($form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect('addamovie/success');   // or whatever logic needs to occur
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