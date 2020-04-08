<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shopkeepers extends CI_Controller {

    function __construct()
    {
        parent::__construct();
    
        $this->load->library('session');
        if($this->session->user_name==False)
        redirect('app/');

    }
	public function index()
	{
		$this->load->view('settings/shopkeepers_index');
    }
    
    public function manage($edit=0)
    {       
        $this->load->model("Shopkeepers_model");

        $data["shopkeepers"]  = $this->Shopkeepers_model->getShopkeepers();

        //Edit
        $data["Id"]            = "";
        $data["Name"]       = "";
        $data["Mobile"]     = "";
        $data["Address"]    = "";

        if($edit != 0)
        {           
            $data["isEdit"] = true;

            $data["ShopkeepersDetails"]    =       $ShopkeepersDetails    = $this->Shopkeepers_model->getShopkeepersById($edit);

            $data["Id"]        =       $ShopkeepersDetails->id;
            $data["Name"]           =       $ShopkeepersDetails->name;
            $data["Mobile"]         =       $ShopkeepersDetails->mobile;
            $data["Address"]        =       $ShopkeepersDetails->address;

            $this->load->view('settings/shopkeepers_create',$data);
        }
        
        $this->load->view('settings/shopkeepers_index',$data);
    
    }

    public function add($id=0)
    {
        $data['isEdit']  = false;

        $this->load->model("Shopkeepers_model");

        $this->load->library('form_validation');
        $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('mobile','Shopkeepers mobile','required');
        $this->form_validation->set_rules('address','Shopkeepers address','required');

        if($this->form_validation->run() == false)
        {
            $this->load->view('settings/shopkeepers_create',$data);
        }

        else
        {
            if($this->input->post("btnAdd"))
            {   
                unset($_POST["btnAdd"]);
                            
                $isAdded = $this->Shopkeepers_model->shopkeepers_post($_POST);
                if($isAdded){

                    $this->session->set_flashdata("message","Shopkeepers Added Successfully");
                    $this->session->set_flashdata("style","alert-success");
                }
                else{
        
                    $this->session->set_flashdata("message","Failed to Add Shopkeepers");
                    $this->session->set_flashdata("style","alert-danger");
                }
                redirect("Shopkeepers/manage");
            }
        
            else if($this->input->post("btnUpdate"))
            {
                unset($_POST["btnUpdate"]);
                $id = $this->input->post("id");

                $isUpdated = $this->Shopkeepers_model->shopkeepers_put($_POST,$id);

                if($isUpdated){

                    $this->session->set_flashdata("message","Shopkeepers Updated Successfully");
                    $this->session->set_flashdata("style","alert-success");
                }
                else{
        
                    $this->session->set_flashdata("message","Failed to Update Shopkeepers ");
                    $this->session->set_flashdata("style","alert-danger");
                }
                redirect("Shopkeepers/manage");
            }
        }
        
        $this->load->view('settings/shopkeepers_create',$data);
    }

    public function delete($id)
    {       
        $this->load->model("Shopkeepers_model");

        $isDelete = $this->Shopkeepers_model->shopkeepers_delete($id);

        if($isDelete){
            $this->session->set_flashdata("message","Delete Successfully");
            $this->session->set_flashdata("style","alert-success");
        }
        else{
            $this->session->set_flashdata("message","Failed to Delete");
            $this->session->set_flashdata("style","alert-danger");
        }
        redirect("Shopkeepers/manage");

    }


}
