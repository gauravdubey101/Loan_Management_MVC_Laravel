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

            <div class="form-group">
                <h3>Add two number using text box as input using javascript</h3>
            </div>
            <hr>

            <div class="form-row">
                <div class="form-group col-6 grid-margin">
                    Enter First Number : <input class="form-control" type="text" id="Text1" name="no1"><br>
                
                    Enter Second Number : <input  class="form-control" type="text" id="Text2" name="no2"><br>

                    <input type="button" name="clickbtn" value="Display Result" onclick="add_number()">

                </div>

                <div class="form-group col-6 grid-margin">
                  Result : <input class="form-control" type="text" id="txtresult" name="TextBox3"><br>

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
        function add_number()
        {
            var first_number = parseInt(document.getElementById("Text1").value);
            var second_number = parseInt(document.getElementById("Text2").value);
            var result = first_number + second_number;

            document.getElementById("txtresult").value = result;
        }
</script>