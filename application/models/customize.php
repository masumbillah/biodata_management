<?php
class Customize extends CI_Model{
    
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
        
        public function getAll($table,$order=NULL)
        {
        	//$this->db->order_by("id", "desc"); 
            
            if($order!= NULL)
                {
                    $this->db->order_by($order) ; 
                }
            
            $query = $this->db->get($table)->result_array();
            return $query ;
        }
        
        
        
        
        public function getAllWhere($table, $where=NULL,$order=NULL)
        {
            if($where != NULL) {
        	$this->db->where($where);
            }
                    if($order!==NULL)
                    {
                        $this->db->order_by('id',$order) ;
                    }
                
        	$query = $this->db->get($table)->result_array();
            return $query ;
        }
        
        public function getWhere($table, $where=NULL,$order=NULL)
        {
            if($where != NULL) {
        	$this->db->where($where);
            }
                    if($order!==NULL)
                    {
                        $this->db->order_by('id',$order) ;
                    }
                
        	$query = $this->db->get($table)->row();
            return $query ;
        }
     
     
        
    
        


        

        /**
         *  Checak a data exist or not in a table
         * @param str $table
         * @param array $data
         * @return boolean
         */
        public function checkDataExist($table, $data){
        
        	$this->db->where($data);
        	$this->db->from($table);
        	$query = $this->db->get();
        
        	if($query->num_rows() > 0){
        		return  TRUE;
        	}else{
        		return FALSE;
        	}
        }
        
        /**
         * Custom SQL Exucution
         * @param  str $sql
         * @param boolean $isArray
         * @return boolean
         */
        public function customSql($sql, $isArray=false){
        	$sql = $this->db->query($sql);
        	if($isArray===true){
        		$query = $sql->result_array();
        	}  else {
        		$query = $sql->row();
        	}
        	return $query;
        }

        
}
