<?php
class Commons extends CI_Model{
    
    public function getEncrytedUrl($back_track){
        $bc = str_replace("/","-",$back_track);
        $bcl = strrev($bc);
        
        return $bcl;
    }
    
    public function revEncrytedUrl($back_track){
        $bc = strrev($back_track);
        
        $bcl = str_replace("-","/",$bc);
        
        
        return $bcl;
    }
    
    public  function words_count($text, $no)
        {
            $text = strip_tags($text);  
            $text = trim(preg_replace("/\s+/"," ",$text));
            $word_array = explode(" ", $text);
            if (count($word_array) <= $no)
            return implode(" ",$word_array);
            else
            {
            $text='';
            foreach ($word_array as $length=>$word)
            {
                $text.=$word ;
                if($length==$no) break;
                else $text.=" ";
            }
            }
            return $text;

        }



        public function getMaxID($table)
        {
           $this->db->select_max('id') ;
           $query = $this->db->get($table)->row();
           
           if(!$query->id)
           {
              $id = '1'; 
           }
           else 
           {
               $id = $query->id+1 ; 
           }
           
           return $id;
        }
        
        public function getAll($table)
        {
            $query = $this->db->get($table)->result_array();
            return $query ;
        }

        public function getInfo($table, $id)
        {
            $this->db->from($table) ; 
            $this->db->where('id', $id); 
            $query = $this->db->get()->row(); 
            return $query;
        }
        


        public function insert($table, $data)
        {
            $this->db->insert($table, $data); 
            return $this->db->insert_id() ; 
        }
    
        public function update($table, $data, $id)
        {
            $this->db->where('id', $id);
            return $this->db->update($table, $data); 
        }
        
        public function delete_db($table,$id)
        {
          
            $this->db->where('id', $id);
            return $this->db->delete($table); 
        }
        
        
        
        public function delete_where($table,$where)
        {
          
            $this->db->where($where);
            return $this->db->delete($table); 
    }
    
         /*        
         public function active_update($table,$id)
         {
              $this->db->set('status'='1')
              $this->db->where('id', $id);
              return $this->db->update($table); 
           }*/
        
        
}
