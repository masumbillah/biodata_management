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
                <li class="active"><a href="<?php echo base_url()?>index.php/user/add">User password change</a></li>
            </ol>
        </section>
    <br/>
   <?php 

 $uri=$this->uri->segment('2');

?>

 <div class="col-md-8 main-mid-area"> 
 
     <ul class="nav nav-tabs" role="tablist">
      <li class="<?php if($uri=="profile") echo "active";  ?>"><a href="<?php  echo base_url();  ?>index.php/user/profile/<?php echo  $user_info->id; ?>">Profpile</a></li>
      <li class="<?php if($uri=="update") echo "active";  ?>"><a href="<?php  echo base_url();  ?>index.php/user/update/<?php echo  $user_info->id; ?>">Updat Profile</a></li>
      <li class="<?php if($uri=="pas_chng") echo "active";  ?>"><a href="<?php  echo base_url();  ?>index.php/user/pas_chng/<?php echo  $user_info->id; ?>">Change Password</a></li>
   </ul>
   
    <?php 
    echo form_open_multipart('') ; 
    ?>

<div class="form-group">
    <label>Current Password:  </label>
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
    <label>New Password:  </label>
    <?php 
    $form_input = array(
        'name' => 'password',
        'class' =>'form-control  c_p', 
        'id' => 'conf',
        'value' => ''
       
    );
    echo form_password($form_input); 
    ?>
</div>
    
 <p id="validation"></p>
    
<div class=" text-center">
     
    <?php 
    $form_input = array(
        'name' => 'submit',
        'class' =>'btn btn-lg btn-success ', 
        'value' => 'Change password'
    );
    echo form_submit($form_input); 
    ?>
    
</div>
   <?php echo form_close() ?> 
    
    

</div>
<!-- End  Working area --> 
<?php $this->load->view('common/footer') ?>
<script>
    $( ".new" ).change(function() {
        var valu = $( this ).val();
       // $( "#validation" ).text( value );
       //alert(value);
        })  
        
        
        $( ".conf" ).change(function() {
        var value = $( this ).val();
       // $( "#validation" ).text( value );
       //alert(value);
        });
        
        $( "#validation" ).click(function() {
                if (valu==value)
                 {
                     alert("yes");
                 }
                 else {
                     alert("not");
                     }
        });
        
    //.keyup();
</script>