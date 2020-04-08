<!DOCTYPE html>
<html lang="en">

<head>
<?php $this->load->view("template/header"); ?> 
<style>
@media print {
  * {
    display: none;
  }
  #printableTable {
    display: block;
  }
}</style>


<script>


  function printData()
  {
    var divToPrint=document.getElementById("printTable");
    newWin= window.open("");
    newWin.document.write(divToPrint.outerHTML);
    newWin.print();
    newWin.close();
  }

  $('button').on('click',function(){
  printData();
  })


</script>
</head>

<body>
  

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
          <h3> Users</h3>
        </div>

        </div>
      </div>
     
<button>Print me</button>


      <div class="form-row">
        <div class="form-group col-lg-12 grid-margin stretch-card">
            <table class="table table-bordered" id="printTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>User Name</th>
                  <th>Loan Amount</th>
                </tr>
              </thead>

              <tbody>
                <?php foreach($customers as $customer){ ?>
                <tr>
                  <td><?=$customer->name?></td>
                  <td><?=$customer->udhar_amnt?></td>
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

