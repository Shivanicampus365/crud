<!DOCTYPE html>
<html>
<head>
    <title>Crud Application - Employee Details</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.min.css';?>">
</head>
<body>
<div class = "navbar navbar-dark bg-dark">
    <div class = "container">
         <a href="#" class="navbar-brand">CRUD APPLICATION</a>
    </div>
</div>
<div class= "container" style="padding-top: 10px;">
     <div class="row">
           <div class="col-md-12">
                <?php
                $success = $this->session->userdata('success');
                if($success != "") {
                ?>
                <div class="alert alert-success"><?php echo $success;?></div>
                <?php
                }
                ?>
                <?php
                $failure = $this->session->userdata('failure');
                if($failure != "") {
                ?>
                <div class="alert alert-success"><?php echo $failure;?></div>
                <?php
                }
                ?>
            </div>
        </div>
      
    <div class="row">
        <div class="col-md-15">
            <div class="row">
                <div class="col-6"><h3>Employee Details</h3></div>
               
            </div>
            <hr>
        </div>
    </div>




      <div class="row">

        <div class="col-md-7">
             <table class="table table-striped">
                <tr>
                    <th>Employee_Name</th>
                    <th>Employee_Salary</th>
                    <th>Mobile</th>
                    <!-- <th width="60">Edit</th>
                    <th width="80">Delete</th> -->
                </tr>
                
                <?php if (!empty($emp)) { foreach($emp as $user) {?>
                <tr>
                
                    <td><?php echo $user['emp_name']?></td>
                    <td><?php echo $user['emp_salary']?></td>
                    <td><?php echo $user['mobile']?></td>
                    <!-- <td>
                        <a href="<?php echo base_url().'index.php/user/edit/'.$user['user_id']?>" class="btn btn-outline-primary">Edit</a>
                </td>
                <td>
                <a href="<?php echo base_url().'index.php/user/delete/'.$user['user_id']?>" class="btn btn-outline-danger">Delete</a>
                </td> -->
                </tr>
                <?php } } else { ?>
                <tr>
                    <td colspan="5">Records not found</td>
                </tr>
                <?php } ?>
                
                
             </table>


           
        </div>
    </div>
</div>


</body>
</html>