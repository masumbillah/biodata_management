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
                <li class="active"><a href="<?php echo base_url()?>index.php/category">Category</a></li>
            </ol>
        </section>
    <br/>

    
<!-- Start Working area --> 
<div class="col-md-12 main-mid-area"> 
   <?php $this->load->view('common/error_show') ?>
   
    <div class="searchbar " >
    

    <div class="col-md-12 "  >
    </div>
        
        <div class=" pull-right"> 
          <a href="<?php echo base_url()?>index.php/category/add" class="btn btn-info pull-right " > <i class="fa fa-plus-square gap">  </i> Add Category</a> 
        </div>
        <div class="clearfix"></div>
   </div> 
    
    
        
            <table class="table table-bordered table-hover ">
                <tr>
                     <th>ID</th>
                    <th>Category Name</th>
                     
                    <th  id="action_btn_align">Action</th>
                    
                 </tr>
           
                 <?php 
               //  var_dump($company_list) ; 
                 foreach ($category_list as $cat){
                 ?>
                 
                 
              <tr>
                  <td> <?php echo $cat['id'] ?></td>
                  <td> <?php echo $cat['name'] ?></td>
                  <td id="action_btn_align">
                  <div class="btn-group"> 
                      
                      <a class="btn btn-primary  btn-flat" href="<?php echo base_url(); ?>index.php/category/edit/<?php echo $cat['id'] ?>"><i class="fa fa-pencil-square-o" ></i> Edit </a>
                      <a class="btn btn-danger  btn-flat"  onclick="return confirm('Are you sure want to dele');" href="<?php echo base_url(); ?>index.php/category/delete/<?php echo $cat['id'] ?>"><i class="fa fa-minus-circle"></i> Delete</a>
                 </div>
                 
                  </td>
               </tr>
              <?php } ?>
             

             </table> <!--
     
      
    </div>
        -->


<!-- End  Working area --> 
<?php $this->load->view('common/footer') ?>