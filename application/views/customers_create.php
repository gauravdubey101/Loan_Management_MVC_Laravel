<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .form-group .required .control-label:after {
            content:"*";
            color:red;       
        }
        .error{
            color:red;
        }
    </style>
    
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
    
      <meta name="description" content="">
      <meta name="author" content="">
      <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.19/themes/start/jquery-ui.css" rel="stylesheet">
      <script src="https://code.jquery.com/jquery-1.10.2.js"></script>  
      <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.8/jquery.validate.min.js"></script>
      <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>   

      <?php $this->load->view("template/header"); ?>  
</head>

<body id="page-top">
   
  <?php $this->load->view("template/navbar"); ?>  

  <div id="wrapper">

    <?php $this->load->view("template/sidebar"); ?>  

    <div id="content-wrapper">

      <div class="container-fluid">

      <div class="form-row">
        <div class="form-group col-md-12">
          <h3> Manage Users </h3>
        </div>
      </div>
      
      <hr>
      
        <div class="form-row">
          <div class="form-group col-12 grid-margin">

            <?php echo form_open("Customers/add/"); ?>

                <div class="form-row mb-3 " >

                    <div class="form-group required col-md-3">
                        <label class = "control-label" for="name">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Customers name..." value="<?php if (isset($CustDetails)) { echo isset($CustDetails)?$CustDetails->name:'' ; } else echo set_value("name") ?>" />
                        <div class="error"> <?php echo form_error('name');?></div>
                    </div>

                    <div class="form-group required col-md-3">
                        <label class = "control-label">Email</label>
                        <input type="text" name="email" class="form-control" placeholder="Enter Customers email..."  value="<?php if (isset($CustDetails)) { echo isset($CustDetails)?$CustDetails->email:'' ; } else echo set_value("email") ?>" />
                        <div class="error"> <?php echo form_error('email');?></div>
                    </div>

                    <div class="form-group required col-md-3">
                        <label class = "control-label">Mobile</label>
                        <input type="text" name="mobile" class="form-control" placeholder="Enter Customers mobile..."  value="<?php if (isset($CustDetails)) { echo isset($CustDetails)?$CustDetails->mobile:'' ; } else echo set_value("mobile") ?>">
                        <div class="error"> <?php echo form_error('mobile');?></div>
                    </div>

                    <div class="form-group required col-md-3">
                        <label class = "control-label">Address</label>
                        <input type="text" name="address" class="form-control" placeholder="Select Customers Address ..."  value="<?php if (isset($CustDetails)) { echo isset($CustDetails)?$CustDetails->address:'' ; } else echo set_value("address") ?>"/>
                        <div class="error"><?php echo form_error('address');?></div>
                    </div>

                    <input type="hidden" name="udhar_amnt" class="form-control"  value="<?=$UdharAmount?>"/>
                    <input type="hidden" name="cust_id" class="form-control" value="<?php echo isset($CustDetails)?$CustDetails->cust_id:'' ?>">
                
                </div>

                <div class="form-group">
                    <div class="form-row">

                        <?php if(!$isEdit){ ?>
                        <div class="form-group col-sm-1">
                            <input  type="submit" value="Add" name="btnAdd" class="btn btn-primary btn-block"/>
                        </div>
                        <?php } else { ?>
                        <div class="form-group col-sm-1">
                            <input  type="submit" value="Update" name="btnUpdate" class="btn btn-primary btn-block"/>
                        </div>
                        <?php } ?>
                        
                        <div class="col-lg-4">
                            <a href="<?php echo base_url().'index.php/Customers/manage'?>" class="btn-secondary btn"> Back</a>
                        </div>
                    </div>
                </div>  
          </form>
        </div>
      </div> 
        <?php if($this->session->flashdata("message")) { ?>
        <p class="alert <?=$this->session->flashdata("style")?>"> <?=$this->session->flashdata("message")?> </p>
        <?php } ?>

      </div>
      
        <?php $this->load->view("template/footer"); ?>

    </div>
    <!-- /.content-wrapper -->
    </div>
  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>
  
</body>
</html>
