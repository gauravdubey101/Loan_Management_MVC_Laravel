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
              <h3> Users Transactions</h3>
            </div>
            <div class="col-lg-3 text-right">
              <a href="<?php echo base_url().'index.php/Home'?>" class="btn-secondary btn">BACK </a>
            </div>
           
          </div>

         
          <div class="form-row">
            <div class="form-group col-lg-12 grid-margin stretch-card">
              <div class="table-responsive" >
                <table class="table table-bordered" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>User Name </th>
                      <th>Mobile</th>
                      <th>Email</th>
                      <th>Address</th>
                      <th>Pending Amount</th>
                    </tr>
                  </thead>

                  <tbody>
                    <tr>
                      <td><?=$customers->name?></td>
                      <td><?=$customers->mobile?></td>
                      <td><?=$customers->email?></td>
                      <td><?=$customers->address?></td>
                      <td><?=$customers->udhar_amnt?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <hr>

          
             <?php echo form_open("Transactions/Loan_transactions/".$id); ?>

                <div class="form-row mb-3 " >

                  <div id="order_table" class="col-md-3">  
                    <input type="date" name="from_date" id="from_date" class="form-control" placeholder="From Date" />  
                  </div>  
                  <div class="col-md-3">  
                      <input type="date" name="to_date" id="to_date" class="form-control" placeholder="To Date" />  
                  </div>  
                

                <div class="form-group">
                      <div class="col-md-5">  
                        <input type="submit" name="filter" value="Filter" class="btn btn-info" />  
                      </div>  
                </div>  
                </div>

            </form>

            <br />  


          <div class="form-row">
            <div class="form-group col-lg-12 grid-margin stretch-card">
              <div class="table-responsive" style="min-height:300px">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Shopkeepers Name </th>
                      <th>Loan Date</th>
                      <th>Loan Amount</th>
                    </tr>
                  </thead>

                  <tbody>
                    < ?php foreach($dates as $date){ ?>
                    <tr>
                      <td><?=$dates->shopkeepers_name?></td>
                      <td><?=$dates->udhar_date?></td>
                      <td><?=$dates->udhar_amnt?></td>
                      <!-- <td>
                          <a href="< ?php echo site_url('Customers/manage/'.$cust->cust_id);?>"class="btn btn-warning"> EDIT</a>
                          <a href="< ?php echo site_url('Customers/delete/'.$cust->cust_id);?>" class="btn btn-danger" onclick="return confirm('Are you Sure')">DELETE</a>
                        </td> -->
                    </tr>
                    < ?php } ?>
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

<script>  
      $(document).ready(function(){  
           $.datepicker.setDefaults({  
                dateFormat: 'yy-mm-dd'   
           });  
           $(function(){  
                $("#from_date").datepicker();  
                $("#to_date").datepicker();  
           });  
           $('#filter').click(function(){  
                var from_date = $('#from_date').val();  
                var to_date = $('#to_date').val();  
                if(from_date != '' && to_date != '')  
                {  
                     $.ajax({  
                          url:"<?php echo site_url('Transactions/Loan_transactions_Date');?>",
                          method:"POST",  
                          data:{from_date:from_date, to_date:to_date},  
                          success:function(data)  
                          {  
                            $('#order_table').html(data);  
                          }  
                     });  
                }  
                else  
                {  
                     alert("Please Select Date");  
                }  
           });  
      });  
 </script>