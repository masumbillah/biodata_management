<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class product extends MY_Controller
{
    public function __construct() {
        parent::__construct();
        
         $this->checklogin() ; 
    }
    
    public function index()
    {
        $data['product_list']=$this->CM->getAll('product','id DESC');
        $data['cat_list']=$this->CM->getAll('category');
        $this->load->view('product/index',$data);         
    }
    
      
    public function add()
    {
        $data['cat_list']=$this->CM->getAll('category');
        
        
        $data['id'] = ''; 
        $data['name'] = "";
        $data['cid'] = "";
        $data['bcost'] = "";
        $data['scost'] = "";
        $data['details'] = "";
        
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Name', 'required');
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('product/form', $data); 
        }
        else
        {
                 
            $datas['name'] = $this->input->post('name');
            $datas['cid'] = $this->input->post('cid');
            $datas['bcost'] = $this->input->post('bcost');
            $datas['scost'] = $this->input->post('scost');
            $datas['details'] = $this->input->post('details');
            $datas['status'] = 1;
            
            
                      
            if($datas['cid']=='0')
            {
              @$message="please select Supplier!";
              $this->session->set_flashdata('error', $message);
              redirect("product/add");
            }
            else {
                $insert = $this->CM->insert('product',$datas) ; 
            }
            
            
            if($insert)
            {
        	$msg = "Operation Successfull!!";
        	$this->session->set_flashdata('success', $msg);
        	redirect('product');
            }
            else 
            {
                $msg = "There is an error, Please try again!!";
        	$this->session->set_flashdata('error', $msg); 
        	redirect('product/add'); 
            }
        }
    }
      
    
    
        public function edit($id)
        {
        $data['cat_list']=$this->CM->getAll('category');
        $content=$this->CM->getinfo('product',$id);
        
        
        $data['id'] = $content->id; 
        $data['name'] = $content->name;
        $data['cid'] = $content->cid;
        $data['bcost'] = $content->bcost;
        $data['scost'] = $content->scost;
        $data['details'] = $content->details;
        
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Name', 'required');
            if ($this->form_validation->run() == FALSE)
            {
                $this->load->view('product/form', $data); 
            }
            else
            {

                $datas['name'] = $this->input->post('name');
                $datas['cid'] = $this->input->post('cid');
                $datas['bcost'] = $this->input->post('bcost');
                $datas['scost'] = $this->input->post('scost');
                $datas['details'] = $this->input->post('details');
                $datas['status'] = 1;

                $update = $this->CM->update('product',$datas,$id) ; 

                if($update)
                {
                    $msg = "Operation Successfull!!";
                    $this->session->set_flashdata('success', $msg);
                    redirect('product');
                }
                else 
                {
                    $msg = "There is an error, Please try again!!";
                    $this->session->set_flashdata('error', $msg); 
                    redirect('product/add'); 
                }
            } 
        }
        
        public function delete($id)
        {
               if($this->CM->delete_db('product',$id))
               { 
               $msg = "Operation Successfull!!";
               $this->session->set_flashdata('success', $msg);
               } 
                else 
               {
               $msg = "There is an error, Please try again!!";
               $this->session->set_flashdata('error', $msg);
               }

               redirect('product');
        }
    
}

?>