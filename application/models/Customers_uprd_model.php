<?php

class Customers_uprd_model extends My_Model  {

      private $table = "udhar_amnt_payment";

      function __construct()
      {
            parent::__construct();
      }

      function getCustUprdById($id)
      {
            $res = $this->db->where("udhar_return_id",$id)->get("udhar_amnt_payment")->result();  
            return $res;
      }
      function getCustUdharPaiseReturnDeneData($id)
      {
            $res = $this->db->where("cust_id",$id)->get("udhar_amnt_payment")->result();  
            return $res;
      }

      public function udharpaisedene_post($data)
      {
          return $this->post($this->table,$data);
      }

      public function udharpaisedene_put($data,$id)
      {
          return $this->put($this->table,$data,$id);
      }

      public function udharpaisedene_delete($id)
      {           
          return $this->delete($this->table,$id);
      }

    public function getCustUdharReturnDeneData()
    {
       return $this->db->select('*')
                         ->from('udhar_amnt_payment')
                         ->join('customers','udhar_amnt_payment.cust_id = udhar_amnt_payment.cust_id') 
                         ->get()->result();   
    }
}