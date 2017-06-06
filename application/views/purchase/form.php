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
                <li class="active"><a href="<?php echo base_url()?>index.php/purchase">Purchase</a></li>
                <li class="active"><a href="<?php echo base_url()?>index.php/purchase/add">Add Purchase</a></li>
            </ol>
        </section>
    <br/>


<!-- Start Working area --> 
<div class="col-md-12 main-mid-area"> 
    <?php $this->load->view('common/error_show') ?>
    <h2> Add New Purchase </h2>


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
<?php

$mgs=$this->session->flashdata('error');

if(!empty($mgs))
{
   // echo $mgs;
   
}

?>
        
        
        <div class="col-md-4">
             <label class="control-label">Supplier</label>
            <?php
            $class = 'class="form-control  required" ';
            $sup_data = array("0" => "Select Supplier");
            foreach ($sup_list as $sup) {
            $sup_data[$sup['id']] = $sup['name'];
            }
            echo form_dropdown('sid', $sup_data, $sid, $class);
            ?>
        </div>

     <div class="control-group col-md-5">
          <label class="control-label">Purchaser</label>
          <input type="text" class="fill-up form-control" name="purchaser" placeholder="Purchaser name" required/>
       </div>
        <div class="clearfix"></div>
<br/>  
        <table class="table table-responsive table-bordered" id="plateVolumes" >  
            <tr class="alert alert-info">
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
            <tr class="frow">
                    <td>
                    <?php
                    $class = 'class="form-control " ';
                    $pro_data = array("0" => "Select Category");
                    foreach ($pro_list as $pro) {
                        $pro_data[$pro['id']] = $pro['name'];
                    }
                    echo form_dropdown('pid[]', $pro_data, $pid, $class);
                    ?>
                </td>
                
                <td><input type='number' name="qty[]" id='qty' class="qty form-control"  onChange="WO()"/></td>
                <td><input type='number' name="cost[]" id='price' class="price form-control"  onChange="WO()" required/></td>
                <td><input type='text'  name="total[]" class="price form-control" readonly="" /></td>

            </tr>
        </table>
             <div class="text-right">
            <span class="btn btn-info btn-sm" id="add" >ADD ROW</span>
            <span class="btn btn-danger btn-sm" id="remove" >Remove ROW</span>
            </div>
    
    
<div class="clearfix"></div>

        <div class="col-md-12 ">
             <div class="form-group col-md-1"></div>
             <div class="form-group col-md-5 margin_padding">   
                 <label>Total Quantity</label>
                <?php
                $form_input = array(
                    'name' => 't_qty',
                    'class' => 'form-control t_qty',
                    'value' => '',
                    'readonly' => 'readonly' 
                );
                echo form_input($form_input);
                ?>
            </div>
            <div class="form-group col-md-5">
            <label>Total Cost</label>
                <?php
                $form_input = array(
                    'name' => 't_price',
                    'class' => 'form-control t_price',
                    'value' => ' ', 
                    'readonly' => 'readonly' , 
                );
                echo form_input($form_input);
                ?>
            </div>
             <div class="form-group col-md-1"></div>
        </div>  
       

        <div class=" text-center">
<?php
$form_input = array(
    'name' => 'submit',
    'class' => 'btn btn-lg btn-success ',
    'value' => 'add purchase'
);
echo form_submit($form_input);
?>

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

   function toatalquantity(){
    var sum = 0;
       // or $( 'input[name^="ingredient"]' )
       $( 'input[name^="qty"]' ).each( function( i , e ) {
           var v = parseInt( $( e ).val() );
           if ( !isNaN( v ) )
               sum += v;
       } );

              // alert(sum) ; 
             $(".t_qty").val(sum) ;   
       }  

         
   function toatalcost(){
    var sum = 0;
       // or $( 'input[name^="ingredient"]' )
       $( 'input[name^="total"]' ).each( function( i , e ) {
           var v = parseInt( $( e ).val() );
           if ( !isNaN( v ) )
               sum += v;
       } );

              // alert(sum) ; 
             $(".t_price"). val(sum) ;   
       }  

         
     

function WO() {
var table = document.getElementById("plateVolumes");

for(var i = 0; i < table.rows.length; i++) 
{
    var row = table.rows[i];
    var qty = row.cells[1].childNodes[0].value;
	
    var price = row.cells[2].childNodes[0].value;
    var answer = (Number(qty) * Number(price));
    row.cells[3].childNodes[0].value = answer;
	
    }
	
}

</script>

 

<?php $this->load->view('common/footer') ?>
        



