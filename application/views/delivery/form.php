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
                <li><a href="<?php echo base_url()?>index.php/home"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active"><a href="<?php echo base_url()?>index.php/delivery">Delivery</a></li>
                <li class="active"><a href="<?php echo base_url()?>index.php/delivery/add">Add Delivery</a></li>
            </ol>
        </section>
    <br/>


<!-- Start Working area --> 
<div class="col-md-12 main-mid-area"> 
    <?php $this->load->view('common/error_show') ?>
    <h2> Add New Delivery </h2>


    <?php
    echo form_open_multipart('');
    ?>

    <div class="col-md-12">
        
     <div class="control-group col-md-3">
          <label class="control-label">Date</label>
          <div class="controls " id="sandbox-container" >
              <input type="text" class="datepicker fill-up form-control col-md-2" name="date" placeholder="MM/DD/YYYY" required/>
              <span>Example: 08/30/2014<span>

              <i class=""></i>
          </div>
       </div>
       
      <div class="control-group col-md-3">
          <label class="control-label">Department</label>
           <?php
             $class = 'class="form-control " ';
             $data=array("0" => "Select Department");
             foreach ($dep_list as $dep){
                 $data[$dep['id']]=$dep['name'];
             }
             echo form_dropdown('department',$data,'',$class);
           ?>
          
        </div>
        <div class="clearfix"></div>
        <br/>
        
        <table class="table table-responsive table-bordered" >  
            <tr class="alert alert-info">
                <td>Product Name</td>
                <td>Quantity</td>
            </tr>
            <tr class="frow">
                <td>
                    <?php
                    $class = 'class="form-control pro_data" ';
                    $pro_data = array("0" => "Select Product");
                    foreach ($pro_list as $pro) {
                        $pro_data[$pro['id']] = $pro['name'];
                    }
                    echo form_dropdown('pid[]', $pro_data, $pid, $class);
                    ?>
                </td>

                <td>
                    <?php
                    $form_input = array(
                        'name' => 'quantity[]',
                        'class' => 'form-control quantity ',
                        'value' => $quantity,
                        'type'=>'number',
                        'required' => 'required'
                    );
                    echo form_input($form_input);
                    ?>
                </td>
               <td class="hidden"><input type="hidden" name="" value=""></td>
            </tr>
        </table>
        
        
         <div class="pull-right">
            <span class="btn btn-info btn-sm" id="add" >ADD ROW</span>
            <span class="btn btn-danger btn-sm" id="remove" >Remove ROW</span>
        </div>
     
        
        <div class="col-md-12">
            <div class="form-group col-md-7">
              <label>Comments</label>
                <?php
                $form_textarea = array(
                    'name' => 'comment',
                    'class' => 'form-control',
                    'value' => '',
                    'rows'=>'3',
                );
                echo form_textarea($form_textarea);
                ?>
            </div>
 
           <div class="form-group col-md-5">
             <label>Total Quantity</label>
                <?php
                $form_input = array(
                    'name' => 't_quantity',
                    'class' => 'form-control t_quantity',
                    'value' => '',
                    'readonly'=>'readonly'
                );
                echo form_input($form_input);
                ?>
            </div>
            
        </div>  
        <div class=" text-center">
                <?php
                $form_input = array(
                    'name' => 'submit',
                    'class' => 'btn btn-lg btn-success ',
                    'value' => 'add Delivery'
                );
                echo form_submit($form_input);
                ?>
        </div>

        <?php echo form_close() ?> 
    </div>
    <!-- End  Working area --> 

    

    <!-- start  add the row --> 
    <script>
        $(document).ready(function() {
            $('#sandbox-container input').datepicker();
            
            
            
            $("#add").click(function() {
                var row = "<tr class='frow'>" + $(".frow").html() + "</tr>";
                $(".table tr:last-child").last().after(row);
            });


            $("#remove").click(function() {
                $(".table tr:last-child").last().remove();
                toatalcost();
                toatalquantity();
            });
        });
        

$( '.table' ).on("change", toatalcost);    
$( '.table' ).on("change", toatalquantity);    



   function toatalcost(){
    
  var sum = 0;
// or $( 'input[name^="ingredient"]' )
$( 'input[name^="price"]' ).each( function( i , e ) {
    var v = parseInt( $( e ).val() );
    if ( !isNaN( v ) )
        sum += v;
} );

       // alert(sum) ; 
      $(".t_price").val(sum) ;   
}  
         
   function toatalquantity(){
    
  var sum_q = 0;
// or $( 'input[name^="ingredient"]' )
$( 'input[name^="quantity"]' ).each( function( i , e ) {
    var v = parseInt( $( e ).val() );
    if ( !isNaN( v ) )
        sum_q += v;
} );

       // alert(sum) ; 
      $(".t_quantity").val(sum_q) ;   
}  

 </script>
 
<?php $this->load->view('common/footer') ?>
        



