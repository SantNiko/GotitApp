<?php 

class Main_model extends CI_Model {

        public function bd_login($data)
        {
               $this->load->database();  
               $query = $this->db->query('select pass_user from users where name_user="'.$data["username"].'"');
               $row = $query->first_row();
               if(!$row){
                   return false;
               }
               return $row->pass_user == $data["password"];
               
        }

       

}