<?php
$this->load->view('common/css_link');
$this->load->view('common/header');
$this->load->view('common/sidebar');
//$this->load->view('common/control_panel');
?> 

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
                <li class="active"><a href="<?php echo base_url()?>index.php/user">User</a></li>
            </ol>
        </section>
    <br/>

    
    


<!-- Start Working area --> 
<div class="col-md-12"> 
   <?php $this->load->view('common/error_show') ?>
   
    <div class="searchbar " >
    <div class="col-md-8"  >
    </div>
        
        <div class="pull-right"> 
          <a href="<?php echo base_url()?>index.php/user/add" class="btn btn-info pull-right" > <i class="fa fa-plus-square gap">  </i> Add User</a> 
        </div>
        <div class="clearfix"></div>
   </div> 
    
    
        
            <table class="table table-bordered table-hover ">
                <tr>
                     <th id="action_btn_align">SL</th>
                    <th id="action_btn_align">Name</th>
                    <th id="action_btn_align">District</th>
                    <th id="action_btn_align">Address</th>
                    <th id="action_btn_align">Phone</th>
                    <th id="action_btn_align">Email</th>
                    <th id="action_btn_align">Action</th>
                   
                 </tr>
           
                             
                 
                 <?php 
               //  var_dump($company_list) ; 
                 $i = 0;
                 foreach ($user_list as $user){

                   if($user['is_admin']!="1") {
                 ?>
                 
                 
              <tr id="action_btn_align">
                  <td> <?php echo $i ?></td>
                  <td> <?php echo $user['name'] ?></td>
                  <td> <?php echo $user['district_id'] ?></td>
                  <td> <?php echo $user['address'] ?></td>
                  <td> <?php echo $user['phone'] ?></td>
                  <td> <?php echo $user['email'] ?></td>
                  <td>
                            <?php
                                if($user['status']=="1")
                                   {
                                 ?>
                                    <a class="btn btn-primary btn-flat"  onclick="return confirm('Are you sure want to unactive !');"  href="<?php echo base_url(); ?>index.php/user/unactive/<?php echo $user['id'] ?>" title="Active"><i class="fa  fa-eye" ></i></a>
                                  <?php } 
                               else 
                                   { ?>
                                     <a class="btn btn-primary btn-flat"  onclick="return confirm('Are you sure want to active !');"  href="<?php echo base_url(); ?>index.php/user/active/<?php echo $user['id'] ?>"  title="Unactive"><i class="fa  fa-eye-slash" ></i></a>
                                  <?php
                                   }
                              ?>
                            <a class="btn btn-primary btn-flat" href="<?php echo base_url(); ?>index.php/user/edit/<?php echo $user['id'] ?>" title="Edit"><i class="fa fa-pencil-square-o" ></i> </a>
                           
                            <a class="btn btn-danger btn-flat "  onclick="return confirm('Are you sure want to dele');" href="<?php echo base_url(); ?>index.php/user/delete/<?php echo $user['id'] ?>"  title="Delete"><i class="fa fa-minus-circle"></i></a>
                         </div>
                    </td>     
               </tr>
              <?php
                  }

              $i++;
              } 
              ?>
                    
             </table> <!--
     
      
    </div>
        -->


<!-- End  Working area --> 
<?php $this->load->view('common/footer') ?>