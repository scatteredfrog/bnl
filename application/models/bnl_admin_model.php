<?php

class Bnl_admin_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
        function verifySignin($form_data)
        {
            $sql = "SELECT admin_username FROM tbShitballs WHERE admin_username = ? AND admin_password = ? LIMIT 1";
            $loginName=$this->db->query($sql,array($form_data['bnl_admin_username'],md5($form_data['bnl_admin_password'])));
            $query=$loginName->result_array();
            return $query;
        }
        
}

?>
