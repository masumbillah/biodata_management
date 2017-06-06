
   <?php   $c = $this->uri->rsegment(1) ;  //echo $c; ?>
    
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <?php  
                   
                       $name=$this->session->userdata("username");
                       $user_type=$this->session->userdata("user_type");
                    ?>
                    
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php  echo base_url(""); ?>style_sheet/img/avatar.png" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hello, <?php  echo $name; ?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="<?php if($c=='home')echo "active"  ?>">
                            <a href="<?php echo base_url(); ?>index.php/home">
                                <i class="fa fa-home"></i> <span>Home</span>
                            </a>
                        </li>
                        <?php
                          if($user_type=="1")
                        {
                        ?>
                        <li class="<?php if($c=='category')echo "active"  ?>">
                            <a href="<?php echo base_url(); ?>index.php/user">
                                <i class="fa fa-user"></i> <span>User</span>
                            </a>
                        </li>         
                        <?php } ?>

                        <li class="<?php if($c=='custormers')echo "active"  ?>">
                            <a href="<?php echo base_url(); ?>index.php/custormers">
                                <i class="fa fa-users"></i> <span>Customers</span>
                            </a>
                        </li> 
                        
                        <li class="<?php if($c=='category')echo "active"  ?>">
                            <a href="<?php echo base_url(); ?>index.php/category">
                                <i class="fa fa-th"></i> <span>Category</span>
                            </a>
                        </li>  
                        <li class=" <?php if($c=='product')echo "active"  ?>">
                            <a href="<?php echo base_url(); ?>index.php/product">
                                <i class="fa fa-th"></i> <span>Product</span>
                            </a>
                        </li>
                        <li class=" <?php if($c=='supplier')echo "active"  ?>">
                            <a href="<?php echo base_url(); ?>index.php/supplier">
                                <i class="fa fa-th"></i> <span>Supplier</span>
                            </a>
                        </li>
                        <li class=" <?php if($c=='purchase')echo "active"  ?>">
                            <a href="<?php echo base_url(); ?>index.php/purchase">
                                <i class="fa fa-th"></i> <span>Purchase</span>
                            </a>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>
