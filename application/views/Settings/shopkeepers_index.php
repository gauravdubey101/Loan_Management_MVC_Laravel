<!DOCTYPE html>
<html lang="en">

<head>
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
            <div class="form-group col-lg-9">
              <h3> Manage Shopkeepers</h3>
            </div>

            <div class="col-lg-3 text-right">
              <a href="<?php echo base_url().'index.php/Shopkeepers/add'?>" class="btn-primary btn">New Shopkeepers </a>
            </div>
           
          </div>
       
          <div class="form-row">
            <div class="form-group col-lg-12 grid-margin stretch-card">
              <div class="table-responsive" style="min-height:300px">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name </th>
                      <th>Mobile</th>
                      <th>Address</th>
                      <th>Action</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php foreach($shopkeepers as $shopkeeper){ ?>
                    <tr>
                      <td><?=$shopkeeper->name?></td>
                      <td><?=$shopkeeper->mobile?></td>
                      <td><?=$shopkeeper->address?></td>
                      <td>
                          <a href="<?php echo site_url('Shopkeepers/manage/'.$shopkeeper->id);?>"class="btn btn-warning"> EDIT</a>
                          <a href="<?php echo site_url('Shopkeepers/delete/'.$shopkeeper->id);?>" class="btn btn-danger" onclick="return confirm('Are you Sure')">DELETE</a>
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