<?php

class Shopkeepers_model extends My_Model  {

      private $table = "shopkeepers";

      function __construct()
      {
            parent::__construct();
      }

      public function getShopkeepers()
      {
            $details = array();
            return $this->get_all($this->table);
      }

      function getShopkeepersById($id)
      {
            $res = $this->db->where("id",$id)->get("shopkeepers")->row();  
            return $res;
      }

      public function shopkeepers_post($data)
      {
          return $this->post($this->table,$data);
      }

      public function shopkeepers_put($data,$id)
      {
          return $this->put($this->table,$data,$id);
      }

      public function shopkeepers_delete($id)
      {           
          return $this->delete($this->table,$id);
      }


}