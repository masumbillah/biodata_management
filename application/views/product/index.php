<?php
$this->load->view('common/css_link');
$this->load->view('common/header');
$this->load->view('common/sidebar');
//$this->load->view('common/control_panel');
?> 
//control panel and link....

    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header" style="margin-top:-10px!important;">
            <h1>
                Dashboard
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url()?>index.php/home"><i class="fa fa-home"></i> Home</a></li>
                <li class="active"><a href="<?php echo base_url()?>index.php/product">Product</a></li>
            </ol>
        </section>
    <br/>

      
    

<!-- Start Working area --> 
<div class="col-md-12"> 
   <?php $this->load->view('common/error_show') ?>
   
    <div class="" >
    

    <div class="col-md-12 "  >
    </div>
        
        <div class=" pull-right"> 
          <a href="<?php echo base_url()?>index.php/product/add" class="btn btn-info pull-right" > <i class="fa fa-plus-square gap">  </i> Add Product</a> 
        </div>
        <div class="clearfix"></div>
   </div> 
    
    
        
            <table class="table table-bordered table-hover ">
                <tr>
                    <th id="action_btn_align">ID</th>
                    <th id="action_btn_align">Product Name</th>
                    <th id="action_btn_align">Category</th>
                    <th id="action_btn_align">Buy Cost</th>
                    <th id="action_btn_align">Sell Cost</th>
                    <th id="action_btn_align">Details</th>
                    <th id="action_btn_align">Action</th>
                  
                   
                 </tr>
           
                             
                 
                 <?php 
               //  var_dump($company_list) ; 
                 foreach ($product_list as $pro){
                 ?>
              <tr id="action_btn_align">
                  <td> <?php echo $pro['id'] ?></td>
                  <td> <?php echo $pro['name'] ?></td>
                  <td> 
                      <?php             
                        $c_name=$this->CM->getinfo('category',$pro['cid']);
                        echo $c_name->name;
                     ?>
                  </td>
                  <td> <?php echo $pro['bcost'] ?></td>
                  <td> <?php echo $pro['scost'] ?></td>
                  <td> <?php echo $pro['details'] ?></td>
                  <td id="action_btn_align">
                  <div class="btn-group"> 
                      
                      <a class="btn btn-primary btn-flat" href="<?php echo base_url(); ?>index.php/product/edit/<?php echo $pro['id'] ?>"><i class="fa fa-pencil-square-o" ></i> Edit </a>
                      <a class="btn btn-danger btn-flat "  onclick="return confirm('Are you sure want to dele');" href="<?php echo base_url(); ?>index.php/product/delete/<?php echo $pro['id'] ?>"><i class="fa fa-minus-circle"></i> Delete</a>
                 </div>
                 
                  </td>
               </tr>
              <?php } ?>
             

             </table> <!--
     
      
    </div>
        -->


<!-- End  Working area --> 
<?php $this->load->view('common/footer') ?>