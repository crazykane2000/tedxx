<?php session_start();
      if(isset($_SESSION['user'], $_SESSION['loged_primitives']))
      {
          include 'connection.php';
          $sql = "SELECT * FROM login WHERE user = '".htmlentities(mysql_real_escape_string($_SESSION['user']))."'";
          $result = mysql_query($sql, $con) or die(mysql_error());
          $row = mysql_fetch_assoc($result);
          $pass = md5($row['pass']);

          if($pass != $_SESSION['loged_primitives'])
          {
             header('Location:index.php?choice=error&value=Session Out, Please do Login Again.');
          }
      }
      else
      {
        header('Location:index.php?choice=error&value=Session Out, Please do Login Again.');
      }
  ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Master : Employee : CTG Security</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
 <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'header.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include 'sidebar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1  style="font-family:georgia">
       Add Employee Here
        <small></small>
      </h1>
   
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-5">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Employee</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="employee_handle.php" enctype="multipart/form-data">
              <div class="box-body">
               
                
                <div class="form-group">
                  <label >Employee Name</label>
                  <input type="text" name="name"  class="form-control"  placeholder="Enter Employee Name" />
                </div>
                       
                <div class="form-group">
                  <label >Father Name</label>
                   <input type="text" name="father_name"  class="form-control"  placeholder="Enter father Name" />
                </div>
                  
                <div class="form-group">
                  <label >Date of Joining</label>
                   <input type="text" name="joining_date" id="joining_date" class="form-control"  placeholder="Date of Joining" />
                </div>
                  
                <div class="form-group">
                  <label >Status</label>
                   <input type="text" name="status"  class="form-control"  placeholder="Status Here" />
                </div>
                  
                  <div class="form-group">
                  <label >Date of Leaving</label>
                   <input type="text" name="leaving_date"  id="leaving_date" class="form-control"  placeholder="Date of Leaving" />
                </div>
                  
                <div class="form-group">
                  <label >Upload Image</label>
                   <input type="file" name="file"  class="form-control"  placeholder="Enter File Here" />
                </div>
                  
                 <div class="form-group">
                  <label >Email Id</label>
                   <input type="email" name="email"  class="form-control"  placeholder="Enter Email Id" />
                </div>
                  
                  <div class="form-group">
                  <label >Gender</label>
                   <select name="gender"  class="form-control" >
                      <option>Male</option>
                       <option>Female</option>
                      </select>
                </div>
                  
                <div class="form-group">
                  <label >Enter Designation</label>
                   <textarea name="designation"   class="form-control"  placeholder="Enter Designation here" ></textarea>
                </div>
                  
                <div class="form-group">
                  <label >Employee Id</label>
                   <input type="text" name="employee_id"  class="form-control"  placeholder="Enter Employee Id Here" />
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-success">Add Employee</button>
              </div>
            </form>
              <br/>
          </div>
          <!-- /.box -->

        </div>
          
       
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include 'footer.php'; ?>
<?php include 'control_sidebar.php';  ?>
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
        <script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
    <script>
        $('#joining_date').datepicker();
         $('#leaving_date').datepicker();
    </script>
</body>
</html>
