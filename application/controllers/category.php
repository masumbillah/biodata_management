<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends MY_Controller
{
    public function __construct() {
        parent::__construct();
        
         $this->checklogin() ; 
    }
    
    public function index()
    {
    	 
    	$data['category_list']=$this->CM->getAll('category','id DESC');
        $this->load->view('category/index',$data);         
    }
    
    
        public function add()
    {
     
        $data['id'] = ''; 
        $data['name'] = "";
        
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Name', 'required');
        if ($this->form_validation->run() == FALSE)
        {
                $this->load->view('category/category_form', $data); 
        }
        else
        {
                 
            $datas['name'] = $this->input->post('name');
            $datas['status'] = 1;
            $datas['District_name'] = "masum";

            $insert = $this->CM->insert('category',$datas) ; 
            
            if($insert)
            {
        	$msg = "Operation Successfull!!";
        	$this->session->set_flashdata('success', $msg);
        	redirect('category');
            }
            else 
            {
                $msg = "There is an error, Please try again!!";
        	$this->session->set_flashdata('error', $msg); 
        	redirect('category/add'); 
            }
        }
        
    }
    
    
    
    public function edit($id)
    {
        $content = $this->CM->getInfo('category', $id) ;
        
        
        $data['id'] = $content->id;
        $data['name'] =  $content->name;
        
         $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Name', 'required');
        
        if ($this->form_validation->run() == FALSE)
        {
           $this->load->view('category/category_form', $data); 
        }
        else
        { 
            $datas['name'] = $this->input->post('name');
			
            if($this->CM->update('category', $datas, $id))
            {
                $msg = "Operation Successfull!!";
                
        	$this->session->set_flashdata('success', $msg);
                redirect('category'); 
            }else
            {
                $msg = "There is an error, Please try again!!";
        		$this->session->set_flashdata('error', $msg);
        		 
        		 redirect('category'); 	
            }
            
            
        }
        
        
    }
    

    public function delete($id)
    {
        if($this->CM->delete_db('category',$id))
        { 
            $msg = "Operation Successfull!!";
            $this->session->set_flashdata('success', $msg);
        } 
        else 
        {
                $msg = "There is an error, Please try again!!";
        	$this->session->set_flashdata('error', $msg);
        }
        
        redirect('category');
    }
      
}   
