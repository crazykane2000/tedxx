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
  <title>Master : Page : Catpops Technobiz</title>
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
       Update Page Here
        <small></small>
      </h1>
   
    </section>
      
      <?php
        $sd = "SELECT * FROM page1 WHERE id=".htmlentities(mysql_real_escape_string($_REQUEST['id']));
        $result_sd = mysql_query($sd) or die(mysql_error());
        $row_sd = mysql_fetch_assoc($result_sd);  
        //print_r($row_sd);
      $data = $row_sd;
      ?>   

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-7">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Page / Type of Page</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="update_master_page_handle.php" enctype="multipart/form-data">
              <div class="box-body">
                  
                   <div class="form-group">
                      <label>Category</label>
                       <select name="category" class="form-control"  >
                          <option><?php echo $data['category']; ?></option>
                          <option>Web</option>
                          <option>Print</option>
                          <option>Design</option>
                          <option>Others</option>
                       </select>
                    </div>
                   
                <div class="form-group">
                  <label >Menu Name</label>
                  <input type="text" name="menu_name" value="<?php echo $data['menu_name']; ?>" class="form-control"  placeholder="Name of Menu Item">
                </div>
                
                <div class="form-group">
                  <label >Page Title</label>
                      <input type="text" name="title" value="<?php echo $data['title']; ?>" class="form-control"  placeholder="Title of Page">
                </div>
                  
                <div class="form-group">
                  <label >Little Description</label>
                    <textarea name="lil_desc" class="form-control"  placeholder="Little Description"><?php echo $data['description']; ?></textarea>
                </div>
                  
               
                  <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
                  
                   <div class="form-group">
                  <label >Page Strip</label>
                      <input type="text" name="title2" class="form-control" value="<?php echo $data['title2']; ?>"    placeholder="Title of Under Page">
                </div>
                  
                <div class="form-group">
                  <label >Little Description</label>
                    <textarea id="editor1" name="lil_desc2" class="form-control" placeholder="Enter Some Details Here Too" rows="10" cols="80">
              <?php echo $data['description2']; ?>       
                    </textarea>
                </div>
               
                  
                <div class="form-group">
                  <label >Remark</label>
                      <textarea name="remark" class="form-control"  placeholder="Remark for Person"><?php echo $data['remark']; ?>    </textarea>
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-success">Update Page</button>
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
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
   
  });
</script>
</body>
</html>
