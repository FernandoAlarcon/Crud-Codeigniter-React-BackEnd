<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CantantesModel extends CI_Model { 
       

        public function get_Cantantes_like($data){
            $this->db->select("*");
            $this->db->from("cantantes C");
            $this->db->like("C.nombre_artistico",$data,'both');
            $this->db->like("C.nombre",$data,'both');
            $this->db->like("C.apellido",$data,'both');
            $this->db->like("C.genero_musical",$data,'both');
            $results=$this->db->get();
            return $results->result();
        }

        public function get_Cantantes(){ 

            $this->db->select("*");
            $this->db->from("cantantes"); 
            $results=$this->db->get();
            return $results->result();
        }

        public function insert_Cantante($data){ 
            $info = $this->db->insert("cantantes",$data);
            return ;
        }

        public function update_cantante($data,$id){
            $this->db->where("id",$id);
            $this->db->update("cantantes",$data);
            return;
        }

        public function delete($id){
            $this->db->where("id",$id);
            $this->db->delete("cantantes");
            return;
        }
        

    } 

?>