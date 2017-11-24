<?php

class Addacap_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	
	// --------------------------------------------------------------------

      /** 
       * function SaveForm()
       *
       * insert form data
       * @param $form_data - array
       * @return Bool - TRUE or FALSE
       */

	function SaveForm($form_data)
	{
                $data = array('is_latest' => '0');
                $this->db->where('is_latest',1);
                $this->db->update('tbCap',$data);
		$this->db->insert('tbCap', $form_data);
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
	}
        
        function getCap() {
            $sql_string = 'SELECT song, correct_lyric, misheard_as, misheard_by, youtube_link FROM tbCap';
            $sql_string .= ' WHERE is_approved = 1';
            $query = $this->db->query($sql_string);
            unset($sql_string);
            $getCapData = array();
            foreach($query->result_array() as $row) {
                $getCapData[] = $row;
            }
            return $getCapData;
        }
}
?>