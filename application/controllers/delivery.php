<?php
class Delivery extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Customize');
    }
    public function index()
    {
        $data['del_list']=$this->CM->getAll('del_info','id DESC');
        $data['dep_list']=$this->CM->getAll('department','id DESC');
        $this->load->view('delivery/index',$data);
    }
    
    
    
   public function add()
    {
         $data['pro_list']=$this->CM->getAll('product');
         $data['dep_list']=$this->CM->getAll('department');
         $pur_product_list=$this->CM->getAll('pur_product');
       
        $data['id']="";
        $data['name']="";
        $data['cid']="";
        $data['pid']="";
        $data['sid']="";
        $data['quantity']="";
        $data['t_price']="";
        $data['t_quantity']="";
        
        
        $this->load->library('form_validation');

        $this->form_validation->set_rules('pid', 'product', 'required');
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('delivery/form', $data); 
        }
        else
        {
           
            $del_info['date']=  $this->input->post('date');
            $del_info['depid']=  $this->input->post('department');
            $del_info['comment']=  $this->input->post('comment');
            $del_info['status']= 1;
            
            
            
            if ($del_info['depid'] == '0') {
            @$message = "please select Department!";
            $this->session->set_flashdata('error', $message);
            redirect("delivery/add");
            } 
            
            else {
               $id=$this->CM->insert('del_info',$del_info);
            }

            
            
            $pid=  $this->input->post('pid');
            $quantity=  $this->input->post('quantity');

              $order=count($pid);
                if(!empty($pid))
                    {
                        for($i=0;$i<$order;$i++)
                        {
                            $datas['cid']=$id;
                            $datas['pid']=$pid[$i];
                            $datas['quantity']=$quantity[$i];
                            $datas['status']=1;
                            
                            
                            $this->CM->insert('del_product',$datas);                    
                            
                        }
                    }
                    if($this->input->post('t_quantity'))
                    {
                     $total['t_quantity']=  $this->input->post('t_quantity');
                     $total['status']= 1;
                     $total['cid']=$id;  
                     
                    $this->CM->insert('del_count',$total);
                    
                    }   
                    if($id)
                       {
                           $msg = "Operation Successfull!!";
                           $this->session->set_flashdata('success', $msg); 
                           redirect('delivery');
                       }
                       else 
                       {
                           $msg = "There is an error, Please try again!!";
                           $this->session->set_flashdata('error', $msg); 
                       }
                       
                       
           redirect('delivery');
        }
     }
     
     
     /*
      * 
      * ===========Delivary Editing code......
      * 
      * 
      */
         
     public function edit($id)
             {
              $eid=$id;
              $data['pro_list']=$this->CM->getAll('product');
              $data['dep_list']=$this->CM->getAll('department');
         
              $delivery=$this->CM->getInfo('del_info',$eid);        //purchase info get all data
              $data['del_product_list']=$this->Customize->getAllWhere('del_product',array('cid'=>$eid));    //purchase product get all data
              $del_count=$this->Customize->getWhere('del_count',array('cid'=>$eid));    //purchase count get all data
              
           
             //delivary info table
              $data['id']=$delivery->id;
              $data['date']=$delivery->date;
              $data['department']=$delivery->depid;
              $data['comment']=$delivery->comment;
            
       
              
             //delivary count table
              $data['t_quantity']=$del_count->t_quantity;
              
              
              
                $this->load->library('form_validation');

                $this->form_validation->set_rules('pid', 'product', 'required');
                if ($this->form_validation->run() == FALSE)
                {
                    $this->load->view('delivery/eform', $data); 
                }
                else
                {
                    $del_info['date']=  $this->input->post('date');
                    $del_info['depid']=  $this->input->post('department');
                    $del_info['comment']=  $this->input->post('comment');
                    $del_info['status']= 1;
                    
                    $this->db->update('del_info',$del_info,array('id'=>$eid));  //update del_info
                  
                    $pid=  $this->input->post('pid');
                    $quantity=  $this->input->post('quantity');
                    
                   
                      $order=count($pid);
                        if(!empty($pid))
                            {
                              $this->CM->delete_where('del_product',array('cid'=>$eid));
                                for($i=0;$i<$order;$i++)
                                {
                                    $datas['cid']=$id;
                                    $datas['pid']=$pid[$i];
                                    $datas['quantity']=$quantity[$i];
                                    $datas['status']=1;


                                    $this->CM->insert('del_product',$datas);      //update del_product              

                                }
                            }
                            
                            if($this->input->post('t_quantity'))
                            {
                             $total['t_quantity']=  $this->input->post('t_quantity');
                             $total['status']= 1;
                             $total['cid']=$id;  

                            $this->db->update('del_count',$total,array('cid'=>$eid));  //update del_count

                            }   
                            if($id)
                               {
                                   $msg = "Operation Successfull!!";
                                   $this->session->set_flashdata('success', $msg); 
                                   redirect('delivery');
                               }
                               else 
                               {
                                   $msg = "There is an error, Please try again!!";
                                   $this->session->set_flashdata('error', $msg); 
                               }


                   redirect('delivery');
                }
              
              
             }
     
     
             public function checkproduct($id)
             {
               $pid=$id;
               $data= $this->Customize->getWhere('pur_count',array('id'=>$pid)); 
               echo json_encode($data);
             }






             /*
      * 
      * ===========Delivary Delete code......
      * 
      * 
      */
         
        public function delete($id)
        {
               if($this->CM->delete_db('del_info',$id))
               { 
                   $this->CM->delete_where('del_product',array('cid'=>$id));
                   $this->CM->delete_where('del_count',array('cid'=>$id));
                   
               $msg = "Operation Successfull!!";
               $this->session->set_flashdata('success', $msg);
               } 
                else 
               {
               $msg = "There is an error, Please try again!!";
               $this->session->set_flashdata('error', $msg);
               }

               redirect('delivery');
        }
    
     
     
}

?>
