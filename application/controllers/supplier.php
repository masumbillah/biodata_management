<?php
class Supplier extends MY_Controller {
    public function __construct() {
        parent::__construct();
    }
    
    
    public function index()
    {
        $data['sup_list']=  $this->CM->getAll('supplier','id DESC');
        $this->load->view('supplier/index',$data);
    }
    public function add()
    {
      $data['id']="";
      $data['name']="";
      $data['phone']="";
      $data['email']="";
      $data['address']="";
      $data['status']="";
      
      
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required');
        
        if ($this->form_validation->run() == FALSE)
        {  
         $this->load->view('supplier/form',$data);
        }
        else
        {
                 
            $datas['name'] = $this->input->post('name');
            $datas['phone'] = $this->input->post('phone');
            $datas['email'] = $this->input->post('email');
            $datas['address'] = $this->input->post('address');
            $datas['status'] = 1;
            
            $insert = $this->CM->insert('supplier',$datas) ; 
            
            if($insert)
            {
        	$msg = "Operation Successfull!!";
        	$this->session->set_flashdata('success', $msg);
        	redirect('supplier');
            }
            else 
            {
                $msg = "There is an error, Please try again!!";
        	$this->session->set_flashdata('error', $msg); 
        	redirect('supplier/add'); 
            }
        }
    }
    public function edit($id)
    {
      $content=  $this->CM->getinfo('supplier',$id);
        
      $data['id']=$content->id;
      $data['name']=$content->name;
      $data['phone']=$content->phone;
      $data['email']=$content->email;
      $data['address']=$content->address;
      
      
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required');
        
        if ($this->form_validation->run() == FALSE)
        {  
         $this->load->view('supplier/form',$data);
        }
        else
        {
                 
            $datas['name'] = $this->input->post('name');
            $datas['phone'] = $this->input->post('phone');
            $datas['email'] = $this->input->post('email');
            $datas['address'] = $this->input->post('address');
            $datas['status'] = 1;
            
            $insert = $this->CM->update('supplier',$datas,$id) ; 
            
            if($insert)
            {
        	$msg = "Operation Successfull!!";
        	$this->session->set_flashdata('success', $msg);
        	redirect('supplier');
            }
            else 
            {
                $msg = "There is an error, Please try again!!";
        	$this->session->set_flashdata('error', $msg); 
        	redirect('supplier/add'); 
            }
        }
    }
    
    public function delete($id)
    {
      if($this->CM->delete_db('supplier',$id))
      {
         $msg = "Operation Successfull!!";
         $this->session->set_flashdata('success', $msg);
      }
 else {
           $msg = "There is an error, Please try again!!";
           $this->session->set_flashdata('error', $msg); 
      }
      redirect('supplier','refresh');
    }
}

?>
