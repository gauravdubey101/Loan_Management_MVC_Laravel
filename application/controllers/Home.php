<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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

		$this->load->view('home_index',$data);
	}

	public function manage($edit=0)
	{		
		$this->load->model("Customers_model");
		$this->load->model("Customers_upg_model");

		$data["UdharAmount"] 	= 0	;


		$data["customers"]	= $this->Customers_model->getCustomers();

		$data["CustDetails"] 	=  		$CustDetails 	= 	$this->Customers_model->getCustById($edit);

		$data["UdharGheneData"]		=	$UdharGheneData		= $this->Customers_upg_model->getCustUdharGheneData($edit);

		foreach($UdharGheneData as $UdharGhene)
		{
			$data["UdharAmount"]	+=	$UdharGhene->udhar_amnt;
		}

		//Edit
		$data["Cust_Id"]			= "";
		$data["Name"]		= "";
		$data["Email"]		= "";
		$data["Mobile"]		= "";
		$data["Address"]	= "";

		if($edit != 0)
		{			
			$data["isEdit"] = true;

			$data["CustDetails"] 	=  		$CustDetails 	= $this->Customers_model->getCustById($edit);

			$data["Cust_Id"]   		= 		$CustDetails->cust_id;
			$data["Name"]    		= 		$CustDetails->name;
			$data["Email"]    		= 		$CustDetails->email;
			$data["Mobile"]		 	= 		$CustDetails->mobile;
			$data["Address"]     	= 		$CustDetails->address;

			$this->load->view('customers_create',$data);
		}
		
		$this->load->view('customers_index',$data);
	
	}

	public function add($id=0)
	{
		$data['isEdit']  = false;

		$data['cust_id'] =	$cust_id = $id;

		$data["UdharAmount"] 	= 0	;

		$this->load->model("Customers_model");
		$this->load->model("Customers_upg_model");

		$data["customers"]			= 	$this->Customers_model->getCustomers();

		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('email','Customers email','required');
		$this->form_validation->set_rules('mobile','Customers mobile','required');
		$this->form_validation->set_rules('address','Customers address','required');

		if($this->form_validation->run() == false)
		{
			$this->load->view('customers_create',$data);
		}

		else
		{
			if($this->input->post("btnAdd"))
			{	
				unset($_POST["btnAdd"]);
							
				$isAdded = $this->Customers_model->customers_post($_POST);
				if($isAdded){

					$this->session->set_flashdata("message","customers Added Successfully");
					$this->session->set_flashdata("style","alert-success");
				}
				else{
		
					$this->session->set_flashdata("message","Failed to Add customers");
					$this->session->set_flashdata("style","alert-danger");
				}
				redirect("Customers/manage");
			}
		
			else if($this->input->post("btnUpdate"))
			{
				unset($_POST["btnUpdate"]);
				$id = $this->input->post("cust_id");

				$isUpdated = $this->Customers_model->customers_put($_POST,$id);

				if($isUpdated){

					$this->session->set_flashdata("message","Customers Updated Successfully");
					$this->session->set_flashdata("style","alert-success");
				}
				else{
		
					$this->session->set_flashdata("message","Failed to Update Customers");
					$this->session->set_flashdata("style","alert-danger");
				}
				redirect("Customers/manage");
			}
		}
		
		$this->load->view('customers_create',$data);
	}

	public function delete($id)
	{		
		$this->load->model("Customers_model");

		$isDelete = $this->Customers_model->customers_delete($id);

		if($isDelete){
			$this->session->set_flashdata("message","Delete Successfully");
			$this->session->set_flashdata("style","alert-success");
		}
		else{
			$this->session->set_flashdata("message","Failed to Delete");
			$this->session->set_flashdata("style","alert-danger");
		}
		redirect("Customers/manage");

	}

	public function udhar_paise_ghene_add($cust_id=0,$udhar_amnt_id=0)
	{
		$data['cust_id']  			= 		$cust_id;
		$data['udhar_amnt_id']  	= 		$udhar_amnt_id;
		$data['isEdit']  			= 		false;

		$data["UdharAmount"]		=		$UdharAmount			='';
		$data["TotalUdharAmount"]	= 		$UdharAmount			='';
		$data["UdharReturnAmount"]	= 		$UdharReturnAmount		=	'';

		$this->load->model("Customers_model");
		$this->load->model("Customers_upg_model");
		$this->load->model("Customers_uprd_model");
		$this->load->model("Shopkeepers_model");

		$data["customers"] 	=  	$customers 	= $this->Customers_model->getCustById($cust_id);

		$data["UdharGheneData"]	= $this->Customers_upg_model->getCustUdharGheneData();
		
		$data["Shopkeepers"]	= $this->Shopkeepers_model->getShopkeepers();

		$this->load->library('form_validation');
		$this->form_validation->set_rules('udhar_date','Udhar date','required');
		$this->form_validation->set_rules('udhar_amnt','Udhar amnt','required');
		
		if($this->form_validation->run() == false)
		{
			$this->load->view('udharghene_create',$data);
		}

		else
		{
			if($this->input->post("btnAdd"))
			{	
				unset($_POST["btnAdd"]);

				$data['Uamnt'] = $Uamnt = $this->input->post('udhar_amnt') ;

				$data['CustomerID'] = $CustomerID = $this->input->post('cust_id') ; 
				
				$data["UdharGheneData"]		=	$UdharGheneData		= $this->Customers_upg_model->getUpgByICustomersd($CustomerID);

				foreach($UdharGheneData as $UdharGhene)
				{
					$data["UdharAmount"]	= 	$UdharAmount +=	$UdharGhene->udhar_amnt;
				}

				$data["UdharReturnData"]		=	$UdharReturnData		= $this->Customers_uprd_model->getCustUdharPaiseReturnDeneData($CustomerID);

				foreach($UdharReturnData as $UdharReturn)
				{
					$data["UdharReturnAmount"]	= 	$UdharReturnAmount +=	$UdharReturn->udhar_payment_amnt;
				}

				$data["TotalUdharAmount"]	=	$TotalUdharAmount		=	$UdharAmount	- $UdharReturnAmount;

				$data["Total"]				=		$Total 		=		$TotalUdharAmount	 +	$Uamnt;
							
				$isAdded = $this->Customers_upg_model->udharghene_post($_POST);

				$isUpdated = $this->Customers_upg_model->Customer_update($Total,$CustomerID);

				if($isAdded){

					$this->session->set_flashdata("message","Udhar paise ghene Added Successfully");
					$this->session->set_flashdata("style","alert-success");
				}
				else{
		
					$this->session->set_flashdata("message","Failed to Add Udhar paise ghene");
					$this->session->set_flashdata("style","alert-danger");
				}
				redirect("Home/");
			}
		
			else if($this->input->post("btnUpdate"))
			{
				unset($_POST["btnUpdate"]);
				$id = $this->input->post("cust_id");

				$isUpdated = $this->Customers_upg_model->udharghene_put($_POST,$id);

				if($isUpdated){

					$this->session->set_flashdata("message","Udhar paise ghene Updated Successfully");
					$this->session->set_flashdata("style","alert-success");
				}
				else{
		
					$this->session->set_flashdata("message","Failed to Update Udhar paise ghene");
					$this->session->set_flashdata("style","alert-danger");
				}
				redirect("Home/");
			}
		}
	}

	public function udhar_paise_return_dene_add($cust_id=0,$udhar_return_id=0)
	{

		$data['cust_id']  			= 		$cust_id;
		$data['udhar_return_id']  	= 		$udhar_return_id;
		$data['isEdit']  			= 		false;

		$data["TotalUdharAmountData"]		=		$TotalUdharAmountData				=	0;
		$data["TotalUdharAmount"]			= 		$TotalUdharAmount					=	0;

		$this->load->model("Customers_model");
		$this->load->model("Customers_uprd_model");
		$this->load->model("Customers_upg_model");
		$this->load->model("Shopkeepers_model");
		
		$data["customers"] 	=  	$customers 	= $this->Customers_model->getCustById($cust_id);

		$data["CustUdharReturnDeneData"]	= $this->Customers_uprd_model->getCustUdharReturnDeneData();
		
		$data["Shopkeepers"]	= $this->Shopkeepers_model->getShopkeepers();

		$this->load->library('form_validation');
		$this->form_validation->set_rules('udhar_payment_date','Udhar Payment date','required');
		$this->form_validation->set_rules('udhar_payment_amnt','Udhar Payment amnt','required');
		
		if($this->form_validation->run() == false)
		{
			$this->load->view('udharpaisedene_create',$data);
		}

		else
		{
			if($this->input->post("btnAdd"))
			{	
				unset($_POST["btnAdd"]);

				$data["TotalUdhar"]	= 	$TotalUdhar	=	0;

				$data['udhar_payment_amnt'] = $udhar_payment_amnt = $this->input->post('udhar_payment_amnt') ;

				$data['CustomerID'] = $CustomerID = $this->input->post('cust_id') ; 
				
				$data["TotalUdharAmountData"]		=	$TotalUdharAmountData		= 	$this->Customers_model->getCustById($CustomerID);
				$data["TotalUdharAmount"]			= 	$TotalUdharAmount 			=	$TotalUdharAmountData->udhar_amnt;

				$data["TotalUdharReturnAmountData"]		=	$TotalUdharReturnAmountData		= 	$this->Customers_uprd_model->getCustUprdById($CustomerID);

				foreach($TotalUdharReturnAmountData as $TotalUdharReturnAmount)
				{
					$data["TotalUdhar"]	= 	$TotalUdhar +=	$TotalUdharReturnAmount->udhar_payment_amnt;
				}

				$data["TotalUdharPaiseDeneAmount"]	=	$TotalUdharPaiseDeneAmount		= 	 $TotalUdharAmount -$udhar_payment_amnt ;
							
				$isAdded = $this->Customers_uprd_model->udharpaisedene_post($_POST);

				$isUpdated = $this->Customers_upg_model->Customer_update($TotalUdharPaiseDeneAmount,$CustomerID);

				if($isAdded){

					$this->session->set_flashdata("message","Udhar paise return dene Added Successfully");
					$this->session->set_flashdata("style","alert-success");
				}
				else{
		
					$this->session->set_flashdata("message","Failed to Add Udhar paise ghene");
					$this->session->set_flashdata("style","alert-danger");
				}
				redirect("Home/");
			}
		
			else if($this->input->post("btnUpdate"))
			{
				unset($_POST["btnUpdate"]);
				$id = $this->input->post("cust_id");

				$isUpdated = $this->Customers_upg_model->udharghene_put($_POST,$id);

				if($isUpdated){

					$this->session->set_flashdata("message","Udhar paise ghene Updated Successfully");
					$this->session->set_flashdata("style","alert-success");
				}
				else{
		
					$this->session->set_flashdata("message","Failed to Update Udhar paise ghene");
					$this->session->set_flashdata("style","alert-danger");
				}
				redirect("Home/");
			}
		}
	}

}
