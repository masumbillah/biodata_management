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
        <section class="content-header">
            <h1>
                Dashboard
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url()?>index.php/home"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active"><a href="<?php echo base_url()?>index.php/delivery">Delivery</a></li>
            </ol>
        </section>
    <br/>
<!-- Start Working area --> 
<div class="col-md-12 main-mid-area"> 
   <?php $this->load->view('common/error_show') ?>
   
    <div class="searchbar " >
    

    <div class="col-md-12 "  >
    </div>
        
        <div class="pull-right"> 
          <a href="<?php echo base_url()?>index.php/delivery/add" class="btn btn-info pull-right" > <i class="fa fa-plus-square gap">  </i> Add Delivery</a> 
        </div>
        <div class="clearfix"></div>
   </div> 
    
            <table class="table table-bordered table-hover ">
                <tr>
                    <th  id="action_btn_align">ID</th>
                    <th  id="action_btn_align">Total Quantity</th>
                    <th  id="action_btn_align">Date</th>
                    <th  id="action_btn_align">Department</th>
                    <th  id="action_btn_align">Action</th>
                 </tr>
                 <?php 
                 foreach ($del_list as $del)
                 {
                  $data=$this->Customize->getWhere('del_count',array('cid'=>$del['id']));
                 ?>
              <tr  id="action_btn_align">
                  <td> <?php echo $del['id'] ?></td>
                  <td> <?php echo $data->t_quantity; ?></td>
                  <td> <?php  echo $del['date']; ?>
                  <td> <?php 
                        foreach ($dep_list as $dep)
                         {if($del['depid']==$dep['id'])
                          { echo  $dep['name'];}
                         }
                      ?>
                  </td>
                  <td>
                  <div class="btn-group"> 
                    <!--  <a class="btn btn-primary btn-flat" href="<?php echo base_url(); ?>index.php/delivery/edit/<?php echo $del['id'] ?>"><i class="fa fa-pencil-square-o" ></i> Edit </a>-->
                   <a class="btn btn-primary btn-flat" href="<?php echo base_url(); ?>index.php/delivery/edit/<?php echo $del['id'] ?>"><i class="fa fa-pencil-square-o" ></i> Edit </a>
                   <a class="btn btn-danger btn-flat "  onclick="return confirm('Are you sure want to dele');" href="<?php echo base_url(); ?>index.php/delivery/delete/<?php echo $del['id'] ?>"><i class="fa fa-minus-circle"></i> Delete</a>
                 </div>
                 
                  </td>
               </tr>
                 <?php } ?>

             </table> <!--
     
      
    </div>
        -->


<!-- End  Working area --> 
<?php $this->load->view('common/footer') ?>