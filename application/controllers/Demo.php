<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Demo extends CI_Controller {

	function __construct()
   	{
		parent::__construct();
	
		$this->load->library('session');
		if($this->session->user_name==False)
		redirect('app/');

	}

	public function index()
	{
        $this->load->model("Customers_model");
        
        $data['totall'] = $totall = 0;
		
        $data["customers"] = $customers	= $this->Customers_model->getCustomers();
        
        foreach($customers as $cust)
        {
            $data['totall']  = $totall += $cust->udhar_amnt;
        }

		$this->load->view('Demo_index',$data);

    }
}