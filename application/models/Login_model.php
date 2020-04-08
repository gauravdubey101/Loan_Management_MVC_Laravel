<?php

class Login_model  extends CI_Model  {

	function __construct()
    {
        parent::__construct();
    }

	function checkLogin($username, $password)
	{
		$loggedinUser = $this->db->where(array("username"=>$username, "password"=>$password))->get("users");
		
		if($loggedinUser->num_rows() > 0)
			return $loggedinUser->result()[0];

		return false;
	}
}
