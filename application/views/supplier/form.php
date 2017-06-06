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
                <li class="active"><a href="<?php echo base_url()?>index.php/supplier/add">Add Supplier</a></li>
            </ol>
        </section>
    <br/>

    
<!-- Start Working area --> 
<div class="col-md-9 main-mid-area"> 
   <?php $this->load->view('common/error_show') ?>
    <h2> Add New Category </h2>
    

    <?php 
    echo form_open_multipart('') ; 
    ?>

<div class="col-md-12">
    <div class="form-group">
        <label> <h4>Name</h4></label>
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
    
    <div class="form-group">
        <label>Phone/Mobile No</label>
        <?php 
        $form_input = array(
            'name' => 'phone',
            'class' =>'form-control ', 
            'value' => $phone, 
            'required' => 'required'
        );
        echo form_input($form_input); 
        ?>
    </div>
    <div class="form-group">
        <label>E-mail</label>
        <?php 
        $form_input = array(
            'name' => 'email',
            'class' =>'form-control ', 
            'value' => $email, 
            'required' => 'required'
        );
        echo form_input($form_input); 
        ?>
    </div>
    <div class="form-group">
        <label>Address</label>
        <?php 
        $form_input = array(
            'name' => 'address',
            'class' =>'form-control ', 
            'value' => $address, 
            'required' => 'required'
        );
        echo form_textarea($form_input); 
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
        
     

     
 