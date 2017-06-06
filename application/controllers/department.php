<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Department extends MY_Controller
{
    public function __construct() {
        parent::__construct();
        
         $this->checklogin() ; 
    }
    
    public function index()
    {
    	 
    	$data['dep_list']=$this->CM->getAll('department','id DESC');
        $this->load->view('department/index',$data);         
    }
    
    
        public function add()
    {
     
        $data['id'] = ''; 
        $data['name'] = "";
        
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Name', 'required');
        if ($this->form_validation->run() == FALSE)
        {
                $this->load->view('department/form', $data); 
        }
        else
        {
                 
            $datas['name'] = $this->input->post('name');
            $datas['status'] = 1;

            $insert = $this->CM->insert('department',$datas) ; 
            
            if($insert)
            {
        	$msg = "Operation Successfull!!";
        	$this->session->set_flashdata('success', $msg);
        	redirect('department');
            }
            else 
            {
                $msg = "There is an error, Please try again!!";
        	$this->session->set_flashdata('error', $msg); 
        	redirect('department/add'); 
            }
        }
        
    }
    
    
    
    public function edit($id)
    {
        $content = $this->CM->getInfo('department', $id) ;
        
        
        $data['id'] = $content->id;
        $data['name'] =  $content->name;
        
         $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Name', 'required');
        
        if ($this->form_validation->run() == FALSE)
        {
           $this->load->view('department/form', $data); 
        }
        else
        { 
            $datas['name'] = $this->input->post('name');
			
            if($this->CM->update('department', $datas, $id))
            {
                $msg = "Operation Successfull!!";
                
        	$this->session->set_flashdata('success', $msg);
                redirect('department'); 
            }else
            {
                $msg = "There is an error, Please try again!!";
        		$this->session->set_flashdata('error', $msg);
        		 
        		 redirect('department'); 	
            }
            
            
        }
        
        
    }
    

    public function delete($id)
    {
        if($this->CM->delete_db('department',$id))
        { 
            $msg = "Operation Successfull!!";
            $this->session->set_flashdata('success', $msg);
        } 
        else 
        {
                $msg = "There is an error, Please try again!!";
        	$this->session->set_flashdata('error', $msg);
        }
        
        redirect('department');
    }
      
}   
