     
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
                <li class="active"><a href="<?php echo base_url()?>index.php/category/add">Add Category</a></li>
            </ol>
        </section>
    <br/>

    
<!-- Start Working area --> 
<div class="col-md-9 main-mid-area"> 
   
    <h2> Add New Category </h2>
    

    <?php 
    echo form_open_multipart('') ; 
    ?>

<div class="col-md-12">
    <div class="form-group">
        <label> <h4>Name </h4></label>
        <?php 
        $form_input = array(
            'name' => 'name',
            'class' =>'form-control ', 
            'value' => $name, 
            'required' => 'required'
        );
        echo form_input($form_input); 
        ?>
    </div>
</div>
<div class=" text-center">
    <?php 
    $form_input = array(
        'name' => 'submit',
        'class' =>'btn btn-lg btn-success ', 
        'value' => 'add Category'
    );
    echo form_submit($form_input); 
    ?>
    
</div>
    
   <?php echo form_close() ?> 
    
    

</div>
<!-- End  Working area --> 
<?php $this->load->view('common/footer') ?>
        
     

     
 