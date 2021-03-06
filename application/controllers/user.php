<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller 
{
    public function __construct() {
        parent::__construct();
        
          $this->load->model('Commons', 'CM') ;  
    }
    
    public function index()
    {
        $data['user_list']=$this->CM->getAll('user');
        $this->load->view('user/index',$data);                 
    }
    
        public function add()
    {
     
        $data['id'] = $this->CM->getMaxID('user'); 
        $data['district_list'] = $this->CM->getAll('districts');
        
        $data['name'] = "";
        $data['district_id'] = "";
        $data['phone'] = "";
        $data['address'] = "";
        $data['email'] ="";
        $data['password'] ="";
        $data['user_type'] ="0";
      
        $this->load->library('form_validation');

        $this->form_validation->set_rules('phone', 'name','email', 'required');
        if ($this->form_validation->run() == FALSE)
        {
                $this->load->view('user/form', $data); 
        }
        else
        {
            
            $datas['name'] = $this->input->post('name'); 
            $datas['district_id'] = $this->input->post('district_id'); 
            $datas['phone'] = $this->input->post('phone'); 
            $datas['address'] = $this->input->post('address'); 
            $datas['email'] =$this->input->post('email') ;
            $datas['password'] = md5($this->input->post('password')) ;
            $datas['user_type'] =$this->input->post('user_type') ;
            $datas['status'] = 1;
            $datas['is_admin'] = 0;
       

            $insert = $this->CM->insert('user',$datas) ; 
            if($insert)
            {
                 $msg = "Operation Successfull!!";
        		$this->session->set_flashdata('success', $msg);
                redirect('user'); 
            }
            else 
            {
                $msg = "There is an error, Please try again!!";
        		$this->session->set_flashdata('error', $msg);
        		$this->load->view('user/form', $data); 
            }
              redirect('user','refresh'); 
        }
        
    }
    
    
    
    public function edit($id)
    {
        $content = $this->CM->getInfo('user', $id) ; 
        
        $data['name'] = $content->name;
        $data['address'] = $content->address;
        $data['phone'] = $content->phone;
        $data['email'] = $content->email;
        $data['password'] = $content->password;
        $data['user_type'] = $content->user_type;
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules( 'email', 'password','required');
        if ($this->form_validation->run() == FALSE)
        {
                $this->load->view('user/form', $data); 
        }
        else
        {
            $datas['name'] = $this->input->post('name'); 
            $datas['phone'] = $this->input->post('phone'); 
            $datas['address'] = $this->input->post('address');
            $datas['email'] = $this->input->post('email'); 
            $datas['user_type'] = $this->input->post('user_type'); 
            if($this->input->post('password') != "") {
            $datas['password'] = md5($this->input->post('password')) ;
            }
            //$datas['status'] = $this->input->post('status'); 
           if($this->CM->update('user', $datas, $id))
            {
                $msg = "Operation Successfull!!";
        		$this->session->set_flashdata('success', $msg);
                redirect('user'); 
           }
          else
            {
                $msg = "There is an error, Please try again!!";
        		$this->session->set_flashdata('error', $msg);
        		 $this->load->view('user/form', $data); 
            }
            
        }
        
}


public function update($id)

  {
        $uri= 'user/profile/'.$id;
        $data['user_info'] = $this->CM->getInfo('user', $id) ; 
        $content = $this->CM->getInfo('user', $id) ; 
        
        $data['name'] = $content->name;
        $data['address'] = $content->address;
        $data['phone'] = $content->phone;
        $data['email'] = $content->email;
        $data['password'] = $content->password;
        $data['user_type'] = $content->user_type;
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules( 'email', 'password','required');
        if ($this->form_validation->run() == FALSE)
        {
                $this->load->view('user/update', $data); 
        }
        else
        {
            $datas['name'] = $this->input->post('name'); 
            $datas['phone'] = $this->input->post('phone'); 
            $datas['address'] = $this->input->post('address');
            $datas['email'] = $this->input->post('email'); 
            $datas['user_type'] = $this->input->post('user_type'); 
            if($this->input->post('password') != "") {
            $datas['password'] = md5($this->input->post('password')) ;
            }
            //$datas['status'] = $this->input->post('status'); 
           if($this->CM->update('user', $datas, $id))
            {
                $msg = "Operation Successfull!!";
        		$this->session->set_flashdata('success', $msg);
                
            
                redirect($uri); 
           }
          else
            {
                $msg = "There is an error, Please try again!!";
        		$this->session->set_flashdata('error', $msg);
        		 $this->load->view('user/update', $data); 
            }
            
        }
        
    }



    public function delete($id)
    {
        if($this->CM->delete_db('user',$id))
        {
        	$msg = "Operation Successfull!!";
        	$this->session->set_flashdata('success', $msg);
        }else 
        {
        	$msg = "There is an error, Please try again!!";
        	$this->session->set_flashdata('error', $msg);
        }
        
        redirect('user');
    }
    
    
    
        
    public function active($id)
        {

            $content = $this->CM->getInfo('user', $id) ; 
            
            $data['id']=$content->id;
            $data['status']=1;
            $this->CM->update('user', $data, $id);
            redirect('user');
            
         }
        
        
        
        
    public function unactive($id)
        {
            $content = $this->CM->getInfo('user', $id) ; 
            
            $data['id']=$content->id;
            $data['status']=0;
            $this->CM->update('user', $data, $id);
            redirect('user');
         }
    
    
    public function pas_chng($id)
        {
             $uri= 'user/profile/'.$id;
             
             $data['user_info'] = $this->CM->getInfo('user', $id) ; 
            
            $this->load->library('form_validation');
            $this->form_validation->set_rules('password','required');
            if ($this->form_validation->run() == FALSE)
            {
               $this->load->view('user/eform_pas', $data); 
            }
            else
            {
                if($this->input->post('password') != "")
                {
                    $datas['password'] = md5($this->input->post('password')) ;
                }
            
               if($this->CM->update('user', $datas, $id))
                {
                    $msg = "Operation Successfull!!";
                    $this->session->set_flashdata('success', $msg);
                    redirect($uri); 
               }
              else
                {
                    $msg = "There is an error, Please try again!!";
                    $this->session->set_flashdata('error', $msg);
                     $this->load->view($uri, $data); 
                }
                
            }
           
         }
    
    
    
    
    
    public function profile($id)
    {
        $data['user_info'] = $this->CM->getInfo('user', $id) ; 
       
        $this->load->view('user/profile',$data);
        
        
        }
    
       
    
}   
