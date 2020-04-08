<?php

class Transaction_model extends My_Model  {

      private $table = "udhar_amnt";

      function __construct()
      {
          parent::__construct();
      }

      public function getCustUdharGhene()
      {
          $details = array();
          return $this->get_all($this->table);
      }

      public function dateRange($from_date,$to_date)
      {
            $res = $this->db->where("udhar_date", "BETWEEN '$from_date' AND '$to_date'")->get("udhar_amnt")->result();  
            return $res;
      }

      function getCustUpgById($id)
      {
          $res = $this->db->where("udhar_amnt_id",$id)->get("udhar_amnt")->row();  
          return $res;
      }

      public function udharghene_post($data)
      {
          return $this->post($this->table,$data);
      }

      public function udharghene_put($data,$id)
      {
          return $this->put($this->table,$data,$id);
      }

      public function udharghene_delete($id)
      {           
          return $this->delete($this->table,$id);
      }

      function Customer_update($TotalUdharAmount= 0, $CustomerID = 0)
      {
          $data = array(
                      'udhar_amnt' => $TotalUdharAmount,
                      );
  
          return $this->db->update('customers',$data,array('cust_id' => $CustomerID));
      }

    public function getCustUdharGheneData()
    {
       return $this->db->select('*')
                         ->join('udhar_amnt','udhar_amnt.cust_id = customers.cust_id') 
                         ->get('customers')->result();   
    }

    function getLoanTransactions($id)
    {
        $details = array();

        return $this->db->select('*')
                        ->from('customers')
                        ->join('udhar_amnt','udhar_amnt.cust_id = customers.cust_id') 
                        ->where(array('customers.cust_id'=>$id))  
                        ->get()->result();
    }

    function getLoanReturnTransactions($id)
    {
        $details = array();

        return $this->db->select('*')
                        ->from('customers')
                        ->join('udhar_amnt_payment','udhar_amnt_payment.cust_id = customers.cust_id') 
                        ->where(array('customers.cust_id'=>$id))  
                        ->get()->result();
    }


      function getReports()
      {
          $details = array();

          return $this->db->select('*')
                          ->from('customers')
                          ->get()->result();
      }

}