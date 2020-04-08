<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

	public function index()
	{
		$this->load->model("login_model");

		$data = array();

		if($this->input->post("btnLogin"))
		{
			$username = $this->input->post("txtUsername");
			$password = $this->input->post("txtPassword");

			$isLoggedIn = $this->login_model->checkLogin($username, $password);

			if($username == ""){

				$this->session->set_flashdata("error","Please enter username!");				
			}
			elseif($password == ""){

				$this->session->set_flashdata("error","Please enter password!");
			}
			else{

				if($isLoggedIn){

					$loggenInData = array(

						"user_name" => $username,
						"user_id" 	=> $isLoggedIn->user_id
					);
					$this->session->set_userdata($loggenInData);

					redirect("Home");
				}
				else{
	
					$this->session->set_flashdata("error","Invalid Login, Please try again!");
				}
			}

		}

		$this->load->view('login_view',$data);
	}

	public function logout()
	{
		$this->session->sess_destroy();	

		redirect("app/");
	}

	public function profile()
	{
		$this->load->model("login_model");

		$data = array();

		$this->load->view('profile_view',$data);
	}

	public function changepassword()
	{
		$this->load->model("login_model");

		$data = array();

		$this->load->view('changepassword_view',$data);
	}
}
