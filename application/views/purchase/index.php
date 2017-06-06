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
                <li class="active"><a href="<?php echo base_url()?>index.php/purchase">Purchase</a></li>
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
          <a href="<?php echo base_url()?>index.php/purchase/add" class="btn btn-info pull-right" > <i class="fa fa-plus-square gap">  </i> Add Purchase</a> 
        </div>
        <div class="clearfix"></div>
   </div> 
    
    
        
            <table class="table table-bordered table-hover ">
                <tr>
                    <th id="action_btn_align">ID</th>
                    <th id="action_btn_align">Total Quantity</th>
                    <th id="action_btn_align">Total Cost</th>
                    <th id="action_btn_align">Date</th>
                    <th id="action_btn_align">Action</th>
                 </tr>
                 <?php 
                 foreach ($pur_count as $pur)
                 {
                     $data=$this->Customize->getWhere('pur_count',array('cid'=>$pur['id']));
                 ?>
              <tr id="action_btn_align">
                  <td> <?php echo $pur['id'] ?></td>
                  <td> <?php echo $data->t_quantity; ?></td>
                  <td> <?php echo $data->t_price; ?></td>
                  <td> <?php  echo $pur['date']; ?>
                  </td>
                  <td>
                  <div class="btn-group"> 
                      <a class="btn btn-primary btn-flat" href="<?php echo base_url(); ?>index.php/purchase/edit/<?php echo $pur['id'] ?>"><i class="fa fa-pencil-square-o" ></i> Edit </a>
                      <a class="btn btn-danger btn-flat "  onclick="return confirm('Are you sure want to dele');" href="<?php echo base_url(); ?>index.php/purchase/delete/<?php echo $pur['id'] ?>"><i class="fa fa-minus-circle"></i> Delete</a>
                 </div>
                 
                  </td>
               </tr>
                 <?php } ?>

             </table> <!--
     
      
    </div>
        -->


<!-- End  Working area --> 
<?php $this->load->view('common/footer') ?>