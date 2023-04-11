  <!DOCTYPE html>
  <html>
  <head>
      <title>Details</title>
      <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.min.css';?>">

  </head>
  <body>
  <div class = "navbar navbar-dark bg-dark">
      <div class = "container">
          <a href="#" class="navbar-brand">Employee Details</a>
      </div>
  </div>
  <div class= "container" style="padding-top: 10px;">
        <h3>Add Employee </h3>
        <hr>
        <form method="post" name="Add Employee" action="<?php echo base_url(). 'index.php/user/employee';?>">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
              
                <!-- <div><input type="text" name="mytext[]"></div> -->
              <div class="button_box">
                <input type="button" name="submit" class="pull-right" id="submit" value="Add More" onclick="add_more(1)">
              </div> 
              
              <label for="validationCustom01" class="form-label">Emp_Name</label>
              <input type = "text" id="emp_name_1" name ="emp_name" value="<?php echo set_value('emp_name');?>" class="form-control"><br>
              <?php echo form_error('emp_name');?>
            </div>
          <div class ="form-group">
            <label for="validationCustom01" class="form-label">Emp_salary</label>
                <input type = "text" id="emp_salary_1" name ="emp_salary" value ="<?php echo set_value('emp_salary');?>" class ="form-control"><br>
                <?php echo form_error('emp_salary');?>
          </div>
          <div class ="form-group">
            <label for="validationCustom01" class="form-label">Mobile</label>
                <input type = "text" id="emp_mobile_1" name ="mobile" value ="<?php echo set_value('mobile');?>" class ="form-control"><br>
                <?php echo form_error('mobile');?>
                 <!-- <div id="input_field_wrap">
                <button name="submit" value="submit"id="add_field_button">Add More</button>
                </div> 
                <div><input type="text" name="mytext[]"></div> -->
              <div id="wrap">
                  <div class="my_box">
                    <div class="field_box">
                    </div> 
                  </div>
                </div> 
          </div>
          
              <!-- <style>
                .button_box{float:right;width:20%;}
              </style> -->
              <br>
              <br>
              <div class = "form-group">
                  <button class = "btn btn-primary">Submit</button>
                  <a href ="<?php echo base_url().'index.php/user/sample';?>" class="btn-secondary btn">Back</a>
              </div>
        </div>
      </div>
      </form>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" ></script>
  <script>
        function add_more(id) {
          var new_id = id+1;
        jQuery("#wrap").append('<div class="my_box"><div class="field_box"><input type="text" id="emp_name_'+new_id+'" name="mytext[]" class ="form-control" /><br></div></div>');
        $("#submit").attr('onclick','add_more('+new_id+')');
        }
  </script>        
                
                
  </body>
  </html>




  <!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/fontawesome.min.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <div class="container">
      <h1 style="text-align: center;" > <u> Dynamic-Form</u></h1>
        <form action="<?= base_url('admin/dynamic_form_jquery/save') ?>" method="post">

            <!-- here the default count value is 2 -->
            <input type="hidden" id="total_count" name="total_count" value="2">

            <!-- first form -->
            <div class="row formulation-div">
                <a href="javascript:void(0)" class="btn btn-danger add_more_btn" title="Add More" style="float: right; margin-right: 150px; margin-top: 20px;">Add More</a>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="vName">Name</label>
                        <input type="text" class="form-control" id="vName" placeholder="Enter name" name="vName_1">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="vEmail" placeholder="Enter city" name="vEmail_1">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="vCity">City</label>
                        <input type="text" class="form-control" id="vCity" placeholder="Enter name" name="vCity_1">
                    </div>
                </div>
            </div>
            <!-- first form end -->

            <!-- script form add by ajax dynamically -->
            <script id="hidden-template" type="text/html">
                <div class="script-form formulation-div" id="second-pharmacy">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="vName">Name</label>
                                <input type="text" class="form-control" id="vName" placeholder="Enter name" name="vName_{0}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="vEmail" placeholder="Enter city" name="vEmail_{0}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="vCity">City</label>
                                <input type="text" class="form-control" id="vCity" placeholder="Enter name" name="vCity_{0}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="d-flex justify-content-end">
                                <a href="javascript:void(0)" class="remove-form" title="Delete" style="color:red; font-size:30px;" ><i class="fa fa-trash"></i></a>
                            </div>
                        </div>

                    </div>
                </div>
                
            </script>


            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>

</body>

</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" type="text/javascript"></script>

<script type="text/javascript">
    var formulation_count = $("#total_count").val();

    // add form on click of add more button
    $(document).on("click", ".add_more_btn", function() {

        var template = jQuery.validator.format(
            $.trim($("#hidden-template").html())
        );

        $(template(formulation_count)).insertAfter($(".formulation-div").last());
        formulation_count++;
        $("#total_count").val(formulation_count);
    });


    // delete the form on click of delete button
    $(document).on("click", ".remove-form", function() {
        $(this).parent().parent().parent().remove();
        formulation_count--;
        $("#total_count").val(formulation_count);
    });
</script>
