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
                <li class="active"><a href="<?php echo base_url()?>index.php/supplier">Supplier</a></li>
            </ol>
        </section>
    <br/>

    
    

<!-- Start Working area --> 
<div class="col-md-12 main-mid-area"> 
   <?php $this->load->view('common/error_show') ?>
   
    <div class="searchbar " >
    <div class="col-md-8"  >
    </div>
        
        <div class="pull-right"> 
          <a href="<?php echo base_url()?>index.php/supplier/add" class="btn btn-info pull-right" > <i class="fa fa-plus-square gap">  </i> Add Supplier</a> 
        </div>
        <div class="clearfix"></div>
   </div> 
    
    
        
            <table class="table table-bordered table-hover ">
                <tr>
                    <th  id="action_btn_align">ID</th>
                    <th  id="action_btn_align">Name</th>
                    <th  id="action_btn_align">Phone/Mobile No</th>
                    <th  id="action_btn_align">E-mail</th>
                    <th  id="action_btn_align">Address</th>
                    <th  id="action_btn_align">Action</th>
                  
                   
                 </tr>
             <?php 
             
             foreach ($sup_list as $sup)
             {
             
             ?>
              <tr  id="action_btn_align">
                  <td> <?php echo $sup['id'] ?></td>
                  <td> <?php echo $sup['name'] ?></td>
                  <td> <?php echo $sup['phone'] ?></td>
                  <td> <?php echo $sup['email'] ?></td>
                  <td> <?php echo $sup['address'] ?></td>
                  <td>
                  <div class="btn-group"> 
                      
                      <a class="btn btn-primary btn-flat" href="<?php echo base_url(); ?>index.php/supplier/edit/<?php echo $sup['id'] ?>"><i class="fa fa-pencil-square-o" ></i> Edit </a>
                      <a class="btn btn-danger btn-flat "  onclick="return confirm('Are you sure want to dele');" href="<?php echo base_url(); ?>index.php/supplier/delete/<?php echo $sup['id'] ?>"><i class="fa fa-minus-circle"></i> Delete</a>
                 </div>
                 
                  </td>
               </tr>
             <?php } ?>

             </table> <!--
     
      
    </div>
        -->


<!-- End  Working area --> 
<?php $this->load->view('common/footer') ?>