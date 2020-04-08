<?php

class Customers_model extends My_Model  {

      private $table = "customers";

      function __construct()
      {
            parent::__construct();
      }

      public function getCustomers()
      {
            $details = array();
            return $this->get_all($this->table);
      }

      function getCustById($id)
      {
            $res = $this->db->where("cust_id",$id)->get("customers")->row();  
            return $res;
      }

      public function customers_post($data)
      {
          return $this->post($this->table,$data);
      }

      public function customers_put($data,$id)
      {
          return $this->put($this->table,$data,$id);
      }

      public function customers_delete($id)
      {           
          return $this->delete($this->table,$id);
      }


}