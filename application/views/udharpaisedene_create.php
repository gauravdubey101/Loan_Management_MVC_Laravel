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


      <div class="form-group col-md-12">
          <h3> Customers Details</h3>
      </div>
      <div class="form-row">
          <div class="form-group col-lg-12 grid-margin stretch-card">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                  <tr>
                    <th>Customers Name</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Address</th>
                  </tr>
                </thead>

                <tbody>
                  <tr>
                    <td><?=$customers->name?></td>
                    <td><?=$customers->mobile?></td>
                    <td><?=$customers->email?></td>
                    <td><?=$customers->address?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
      </div>

      <hr>
     
      <div class="form-row">
        <div class="form-group col-md-12">
          <h3> Manage Customers Return Loan</h3>
        </div>
      </div>
        <div class="form-row">
          <div class="form-group col-12 grid-margin">

            <?php echo form_open("Home/udhar_paise_return_dene_add/"); ?>

                <div class="form-row mb-3 " >

                  <div class="form-group required col-md-4">

                    <label class="control-label">Shopkeeper Name</label>
                    <select name="shopkeepers_name" class="form-control" >
                  
                    <option value=""> Select Shopkeeper Name </option>
                    <?php foreach($Shopkeepers as $Shopkeeper){ ?>
                    <option value="<?=$Shopkeeper->name?>"> <?=$Shopkeeper->name?> </option>
                    <?php } ?>
                    </select>
                  </div>

                  <div class="form-group required col-md-4">
                      <label class = "control-label" f>Udhar Payment Date</label>
                      <input type="date" name="udhar_payment_date" class="form-control"  value="<?php if (isset($UdharPaiseDeneDetails)) { echo isset($UdharPaiseDeneDetails)?$UdharPaiseDeneDetails->udhar_payment_date:'' ; } else echo date('Y-m-d'); ?>"/>
                      <div class="error"> <?php echo form_error('udhar_payment_date');?></div>
                  </div>

                  <div class="form-group required col-md-4">
                      <label class = "control-label">Udhar Payment Amnt</label>
                      <input type="text" name="udhar_payment_amnt" class="form-control" placeholder="Enter Customers udhar_amnt..."  value="<?php if (isset($UdharPaiseDeneDetails)) { echo isset($UdharPaiseDeneDetails)?$UdharPaiseDeneDetails->udhar_amnt:'' ; } else echo set_value("udhar_amnt") ?>">
                      <div class="error"> <?php echo form_error('udhar_payment_amnt');?></div>
                  </div>

                  <input type="hidden" name="cust_id" class="form-control" value="<?=$cust_id?>"/>
                  <input type="hidden" name="udhar_return_id" class="form-control" value="<?=$udhar_return_id?>"/>

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
                            <a href="<?php echo base_url().'index.php/Home'?>" class="btn-secondary btn"> Back</a>
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
