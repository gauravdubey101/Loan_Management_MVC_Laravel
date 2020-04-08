<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<?php $this->load->view("template/header"); ?>  

</head>


<body id="page-top">

   
    <?php $this->load->view("template/navbar"); ?>  

    <div id="wrapper">

    <?php $this->load->view("template/sidebar"); ?>  

    <div id="content-wrapper">
      
        <div class="container-fluid">

          <?php if($this->session->flashdata("message")) { ?>
          <p class="alert <?=$this->session->flashdata("style")?>"> <?=$this->session->flashdata("message")?> </p>
          <?php } ?>

          <div class="form-row">
            <div class="form-group col-lg-10">
              <h3> Home</h3>
            </div>
            <div class="col-lg-2">
                    <h5 class="btn-danger btn "> Total Amount : <?php echo $totall?></h5>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-lg-12 grid-margin stretch-card">
              <div class="table-responsive" style="min-height:300px">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>User Name</th>
                      <th>Amount</th>
                      <th>Action</th>
                    </tr>
                  </thead>

                  <tbody>

                    <?php foreach($customers as $cust){ ?>
                    <tr>
                      <td width="40%"><?=$cust->name?></a></td>
                      <td width="30%"><?=$cust->udhar_amnt	?></td>
                      <td width="30%">
                          <a href="<?php echo site_url('Transactions/Loan_transactions/'.$cust->cust_id);?>"class="btn btn-primary"> LT </a>
                          <a href="<?php echo site_url('Transactions/LoanReturn_transactions/'.$cust->cust_id);?>"class="btn btn-success"> LRT </a>
                          <a href="<?php echo site_url('Home/udhar_paise_ghene_add/'.$cust->cust_id);?>" class="btn btn-warning"> Loan </a>
                          <a href="<?php echo site_url('Home/udhar_paise_return_dene_add/'.$cust->cust_id);?>"class="btn btn-secondary"> Loan Return </a>
                        </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

            <hr>

      </div>
        <?php $this->load->view("template/footer"); ?>
    </div>
  </div>
</body>
</html>

<!--Core plugin JavaScript-->
<script src="<?=base_url()?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Page level plugin JavaScript-->
<script src="<?=base_url()?>assets/vendor/datatables/jquery.dataTables.js"></script>
<script src="<?=base_url()?>assets/vendor/datatables/dataTables.bootstrap4.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?=base_url()?>assets/js/sb-admin.min.js"></script>

<!-- Demo scripts for this page-->
<script src="<?=base_url()?>assets/js/demo/datatables-demo.js"></script>