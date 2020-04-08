<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transactions extends CI_Controller {

    function __construct()
    {
        parent::__construct();
    
        $this->load->library('session');
        if($this->session->user_name==False)
        redirect('app/');

    }
	public function index()
	{
		$this->load->view('transaction_index');
    }
    
    public function Loan_transactions($id)
	{
        $this->load->model("Transaction_model");
        $this->load->model("Customers_model");

		$from_date = $this->input->post("from_date");
        $to_date = $this->input->post("to_date");

        $data["dates"] = $dates   = $this->Transaction_model->dateRange($from_date,$to_date);

        $data["customers"] = $customers	= $this->Customers_model->getCustById($id);
        $data["id"] = $id	= $customers->cust_id;

        $data["LoanTransactions"] = $LoanTransactions   = $this->Transaction_model->getLoanTransactions($id);

		$this->load->view('LoanTransaction_index',$data);
    }
    
    public function Loan_transactions_Date()
    {
        $this->load->model("Transaction_model");
        
        $data["LoanTransactionsDate"] = $LoanTransactionsDate   = $this->Transaction_model->getLoanTransactionsDate();
        
    }

    public function LoanReturn_transactions($id)
    {
        $this->load->model("Transaction_model");
        $this->load->model("Customers_model");

        $data["customers"] = $customers = $this->Customers_model->getCustById($id);

        $data["LoanTransactions"] = $LoanTransactions   = $this->Transaction_model->getLoanTransactions($id);

        $data["LoanReturnTransactions"] = $LoanReturnTransactions   = $this->Transaction_model->getLoanReturnTransactions($id);

        $this->load->view('LoanReturnTransaction_index',$data);
    }

    public function reports()
    {
        $this->load->model("Transaction_model");

        $data["customers"] = $customers = $this->Transaction_model->getReports();

        $this->load->view('users_reports',$data);
    }


}
