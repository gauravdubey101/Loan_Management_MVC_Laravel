<?php

class Customers_upg_model extends My_Model  {

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

      function getCustUpgById($id)
      {
            $res = $this->db->where("udhar_amnt_id",$id)->get("udhar_amnt")->row();  
            return $res;
      }

      function getUpgByICustomersd($id)
      {
            $res = $this->db->where("cust_id",$id)->get("udhar_amnt")->result();  
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
}