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
              <h3> Manage Udhar Paise Dene </h3>
            </div>

            <!-- <div class="col-lg-3 text-right">
              <a href="< ?php echo base_url().'index.php/Customers/add'?>" class="btn-primary btn"> Add New  Udhar Paise Dene </a>
            </div> -->
          </div>

          <div class="form-row">
            <div class="form-group col-lg-12 grid-margin stretch-card">
              <div class="table-responsive" style="min-height:300px">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Customers Name</th>
                      <th>Udhar Payment Date</th>
                      <th>Udhar Return Amount</th>
                      <!-- <th>Action</th> -->
                    </tr>
                  </thead>

                  <tbody>
                    <?php foreach($UdharReturnDene as $UdharReturn){ ?>
                    <tr>
                      <td><?=$UdharReturn->name?></td>
                      <td><?=$UdharReturn->udhar_payment_date?></td>
                      <td><?=$UdharReturn->udhar_payment_amnt	?></td>
                      <!-- <td> -->
                          <!-- <a href="< ?php echo site_url('Customers/udhar_ghene_manage/'.$UdharGhene->udhar_amnt_id);?>"class="btn btn-warning"> EDIT</a> -->
                          <!-- <a href="< ?php echo site_url('Customers/delete/'.$UdharGhene->udhar_amnt_id);?>" class="btn btn-danger" onclick="return confirm('Are you Sure')">DELETE</a> -->
                        <!-- </td> -->
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <!-- <div class="modal fade" id="upg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Customers udhar paise</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                < ?php echo form_open("Customers/upg/.$cust->id"); ?>

                    <div class="form-row mb-3 " >

                        <div class="form-group required col-md-12">
                            <label class = "control-label">Customers udhar paise</label>
                            <input type="text" name="upg" class="form-control" placeholder="Enter Customers udhar paise..."  value="< ?php if (isset($CustDetails)) { echo isset($CustDetails)?$CustDetails->upg:'' ; } else echo set_value("upg") ?>">
                            <div class="error"> < ?php echo form_error('upg');?></div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                  <div class="form-group">
                    <div class="form-row">

                        <div class="form-group col-lg-6">
                            <input  type="submit" value="Add" name="btnAdd" class="btn btn-primary btn-block"/>
                        </div>

                        <div class="form-group col-lg-6">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>  
                </div>
              </div>
            </div>
          </div> -->
      
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