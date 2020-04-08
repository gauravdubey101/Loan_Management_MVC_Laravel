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

        <!-- Data Table -->
      <div class="container-fluid">
     
          <?php if($this->session->flashdata("message")) { ?>
          <p class="alert <?=$this->session->flashdata("style")?>"> <?=$this->session->flashdata("message")?> </p>
          <?php } ?>

          <div class="form-row">
          <div class="form-group col-lg-10">
              <h3> Arithmetic  operations</h3>
          </div>
          <div class="col-lg-2 text-right">
                <a href="<?php echo base_url().'index.php/Admin/add'?>" class="btn-primary btn"> ADD </a>
          </div>
          </div>
          <br>

        
          <div class="form-row">
            <div class="form-group col-lg-12 grid-margin stretch-card">
              <div class="table-responsive" style="min-height:300px">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Number One</th>
                      <th>Number Two</th>
                      <th>Results</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php foreach($ArithmeticData as $add){ ?>
                    <tr>
                      <td><?=$add->no1?></td>
                      <td><?=$add->no2?></td>
                      <td><?=$add->result?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
      
          <!-- /.Data Table -->     

        <?php $this->load->view("template/footer"); ?>

            <!-- /.content-wrapper -->

      </div>
            <!-- /#wrapper -->
      </div>
</div>

      <!--Core plugin JavaScript-->
      <script src="<?=base_url()?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

      <!-- Page level plugin JavaScript-->
      <script src="<?=base_url()?>assets/vendor/datatables/jquery.dataTables.js"></script>
      <script src="<?=base_url()?>assets/vendor/datatables/dataTables.bootstrap4.js"></script>

      <!-- Custom scripts for all pages-->
      <script src="<?=base_url()?>assets/js/sb-admin.min.js"></script>

      <!-- Demo scripts for this page-->
      <script src="<?=base_url()?>assets/js/demo/datatables-demo.js"></script>


</body>

</html>
