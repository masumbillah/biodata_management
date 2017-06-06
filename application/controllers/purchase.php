<?php
class Purchase extends MY_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('Customize');
    }
    public function index()
    {
        $data['pur_count']=$this->CM->getAll('pur_info','id DESC');
        $this->load->view('purchase/index',$data);
    }
    public function add()
    {
         $data['pro_list']=$this->CM->getAll('product');
         $data['sup_list']=  $this->CM->getAll('supplier','id DESC');
       
        $data['id']="";
        $data['name']="";
        $data['cid']="";
        $data['pid']="";
        $data['sid']="";
        $data['price']="";
        $data['qty']="";
        $data['total_p']="";
        $data['t_price']="";
        $data['t_qty']="";
        
        
          
        $this->load->library('form_validation');

        $this->form_validation->set_rules('pid', 'product', 'required');
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('purchase/form', $data); 
        }
        else
        {
           
            $pur_info['date']=  $this->input->post('date');
            $pur_info['sid']=  $this->input->post('sid');
            $pur_info['purchaser']=  $this->input->post('purchaser');
            $pur_info['status']= 1;
            
            
            
            
            if($pur_info['sid']=='0')
            {
              @$message="please select Supplier!";
              $this->session->set_flashdata('error', $message);
              redirect("purchase/add");
            }
            else {
              $id=$this->CM->insert('pur_info',$pur_info);
            }
            
            
            
            
            $pid=  $this->input->post('pid');
            $cost=  $this->input->post('cost');
            $quantity=  $this->input->post('qty');
            $total_p=  $this->input->post('total');
           
            /*
            echo "<pre>";
            print_r($total);
           exit();
             * 
             */
                            
            
            $order=count($pid);
                if(!empty($pid))
                    {
                        for($i=0;$i<$order;$i++)
                        {
                            $datas['cid']=$id;
                            $datas['pid']=$pid[$i];
                            $datas['cost']=$cost[$i];
                            $datas['quantity']=$quantity[$i];
                            $datas['total_p']=$total_p[$i];
                            $datas['status']=1;
                            
                            $this->CM->insert('pur_product',$datas);
                        }
                    }
                    
                    if($this->input->post('t_price'))
                    {
                        
                     $total['t_price']=  $this->input->post('t_price');
                     $total['t_quantity']=  $this->input->post('t_qty');
                     $total['status']= 1;
                     $total['cid']=$id;    
                     
                        
                     $this->CM->insert('pur_count',$total);
                    
                    }   
                    if($id)
                       {
                           $msg = "Operation Successfull!!";
                           $this->session->set_flashdata('success', $msg); 
                           redirect('purchase');
                       }
                       else 
                       {
                           $msg = "There is an error, Please try again!!";
                           $this->session->set_flashdata('error', $msg); 
                       }
                       
                       
           redirect('purchase');
        }
     }
     
     
     
     
     
     /*
      * 
      * 
      ****************** Data edit section******************************>....
      * 
      * 
      * 
      */
     
     
     
     
     public function edit($id)
        {
            $eid=$id;
             $data['pro_list']=$this->CM->getAll('product');
             $data['sup_list']=  $this->CM->getAll('supplier','id DESC');
             
             
            $purchase=$this->CM->getInfo('pur_info',$id);
             
             $pur_count=$this->Customize->getWhere('pur_count',array('cid'=>$id));
             
             $data['pur_product_list']=$this->Customize->getAllWhere('pur_product',array('cid'=>$id));   
         
            
            
            //====purchase info table's data
            $data['id']=$purchase->id;
            $data['date']=$purchase->date;
            $data['sid']=$purchase->sid;
            $data['purchaser']=$purchase->purchaser;
              
            //====purchase count table's data
            $data['t_quantity']=$pur_count->t_quantity;
            $data['t_price']=$pur_count->t_price;
            
            
            $this->load->library('form_validation');
            $this->form_validation->set_rules('pid', 'product', 'required');
            
            
            if ($this->form_validation->run() == FALSE)
            {
                $this->load->view('purchase/eform', $data); 
            }
            else
            {
                //$pur_info['date']=  $this->input->post('date');
                
               
            $pur_info['date']=  $this->input->post('date');
            $pur_info['sid']=  $this->input->post('sid');
            $pur_info['purchaser']=  $this->input->post('purchaser');
            $pur_info['status']= 1;
            
            
            $this->db->update('pur_info',$pur_info,array('id' => $eid));  //purchase information updated code
            
            
            $pid=  $this->input->post('pid');
            $cost=  $this->input->post('cost');
            $quantity=  $this->input->post('qty');
            $total_p=  $this->input->post('price');
      
             $total['t_price']=  $this->input->post('t_price');
             $total['t_quantity']=  $this->input->post('t_qty');
            
           
    
             $order=count($pid);
             if(!empty($pid))
                    {
                        $this->CM->delete_where('pur_product',array('cid'=>$eid));
                        
                        for($i=0;$i<$order;$i++)
                        {
                            $datas['cid']=$eid;
                            $datas['pid']=$pid[$i];
                            $datas['cost']=$cost[$i];
                            $datas['quantity']=$quantity[$i];
                            $datas['total_p']=$total_p[$i];
                            $datas['status']=1;
                            
                            $this->CM->insert('pur_product',$datas);
                        }
                    }
                    
                        if($this->input->post('t_price'))
                        {
                         $total['status']= 1;
                         $total['cid']=$id;    
                         $this->db->update('pur_count',$total,array('cid'=>$eid));

                        }        
                        
                        if($eid=$id)
                       {
                           $msg = "Operation Successfull!!";
                           $this->session->set_flashdata('success', $msg); 
                           redirect('purchase');
                       }
                       else 
                       {
                           $msg = "There is an error, Please try again!!";
                           $this->session->set_flashdata('error', $msg); 
                       }
                       
                       
            }
        
         }
         
         
         

        /*
         * 
         * 
         * *********Data Delete Section***********************>...........
         * 
         * 
         * 
         * 
         */ 
         
         
         
         
         
        public function delete($id)
        {
               if($this->CM->delete_db('pur_info',$id))
               { 
                   $this->CM->delete_where('pur_product',array('cid'=>$id));
                   $this->CM->delete_where('pur_count',array('cid'=>$id));
                   
               $msg = "Operation Successfull!!";
               $this->session->set_flashdata('success', $msg);
               } 
                else 
               {
               $msg = "There is an error, Please try again!!";
               $this->session->set_flashdata('error', $msg);
               }

               redirect('purchase');
        }
    
     
    
}

?>
