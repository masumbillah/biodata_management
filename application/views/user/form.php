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
                <li class="active"><a href="<?php echo base_url()?>index.php/user/add">Add User</a></li>
            </ol>
        </section>
    <br/>


<!-- Start Working area --> 
<div class="main-mid-area"> 
   <?php $this->load->view('common/error_show') ?>
    <h2> Add New User </h2>
    

    <?php 
    echo form_open_multipart('') ; 
    ?>


<div class="form-group">
    <label> User Name </label>
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
    <label> District </label>
    <?php
        $class = 'class="form-control  required" style="width:250px;"';
        $district_data = array("0" => "Select district");
        foreach ($district_list as $district) {
            $district_data[$district['eng_name']] = $district['eng_name'] . " (". $district['bang_name'].")";
        }
        echo form_dropdown('district_id', $district_data, "", $class);
    ?>
</div>

<div class="form-group">
    <label> User Address </label>
    <?php 
    $form_input = array(
        'name' => 'address',
        'class' =>'form-control ', 
        'value' => $address, 
        'rows' => 3, 
        'cols' => 5, 
        'size' => 100, 
        'required' => 'required'
    );
    echo form_textarea($form_input); 
    ?>
    
</div>


<div class="form-group">
    
    <label>Phone  </label>
    <?php 
    $form_input = array(
        'name' => 'phone',
        'class' =>'form-control ', 
        'value' => $phone,
        
    );
    echo form_input($form_input); 
    ?>
    
</div>
   
    
    
<div class="form-group">
    
    <label>Email  </label>
    <?php 
    $form_input = array(
        'name' => 'email',
        'class' =>'form-control ', 
        'value' => $email,
    );
    echo form_input($form_input); 
    ?>
    
</div>
    
    <?php if($password=="") {?>
<div class="form-group">
    
    <label>Password  </label>
    <?php 
    $form_input = array(
        'name' => 'password',
        'class' =>'form-control ', 
        'value' => ''
       
    );
    echo form_password($form_input); 
    ?>
    
</div>
    
<div class="form-group">
    
    <label>Is Administrator  </label>
     
            <?php 
             
                    
            if($user_type == '1')
            {
                 $utradio1 = array(
              'name'=>'user_type' , 
              'checked'=>'checked' ,
              'value'=>'1' 
                );
                 
                 $utradio2 = array(
              'name'=>'user_type' ,
              'value'=>'0' 
                );
            }
            
            if($user_type == '0')
            {
                 $utradio1 = array(
              'name'=>'user_type' ,
              'value'=>'1' ,
                );
                 
                 $utradio2 = array(
              'name'=>'user_type' ,
              'value'=>'0' ,
                'checked'=>'checked' 
                );
            }
            
           
            
            echo "<label>".form_radio($utradio1)." Yes </label> &nbsp;  &nbsp;  ";   
        
            echo "<label>".form_radio($utradio2)." No </label>";   ?>  
    
</div>
    <?php }?>
    
    
<div class=" text-center">
     
    <?php 
    $form_input = array(
        'name' => 'submit',
        'class' =>'btn btn-lg btn-success ', 
        'value' => 'Add User'
        
       
    );
    echo form_submit($form_input); 
    ?>
    
</div>
   <?php echo form_close() ?> 
    
    

</div>
<!-- End  Working area --> 
<?php $this->load->view('common/footer') ?>
        
     

     
 