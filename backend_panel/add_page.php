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
  <title>Master :<?php include 'title.php'; ?></title>
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
       Add Page Here 
        <small></small>
      </h1>
   
    </section>

    <!-- Main content -->
       <form role="form" method="POST" action="master_page_handle.php" enctype="multipart/form-data">
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-9">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Add Personals / Type of Personals</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
           
              <div class="box-body">
                 
                <div class="form-group">
                  <label style="color:red" >Select Category Of Plant</label>
                    <select name="category" required class="form-control">
                      <option value="">Select Category</option>  
                        <?php  
                            $ds = "SELECT category FROM category ORDER BY category";
                            $result_ds = mysql_query($ds) or die(mysql_error());
                            while($row_ds = mysql_fetch_array($result_ds))
                            {
                                echo '<option>'.$row_ds['category'].'</option>';
                            }
                        ?>
                    </select>
                </div>
                  
                  <div class="form-group">
                  <label >Page Title </label>
                      <input name="title" required class="form-control"  placeholder="Page Title" />
                </div> 
            
                <div class="form-group">
                  <label >Little Description</label>
                    <textarea id="editor1" required name="lil_desc2" class="form-control" placeholder="Enter Some Details Here Too" rows="10" cols="80">
                      
                    </textarea>
                </div>
                              
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-success">Add Page and Make it Active</button>
              </div>
           
              <br/>
          </div>
          <!-- /.box -->

        </div>
           <div class="col-md-3">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Additional Meta data</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
                <div class="form-group">
                  <label >Menu Name</label>
                      <input name="menu_name" required class="form-control"  placeholder="Menu Name" />
                </div>   
                  
                <div class="form-group">
                  <label >Plant Name</label>
                  <input name="plant_name" required class="form-control"  placeholder="Enter Plants Name" />
                </div> 
                  
                <div class="form-group">
                  <label>Scientific Name</label>
                  <input name="scientific_name" required class="form-control"  placeholder="Scientific Name" />
                </div>
                  
                  <div class="form-group">
                  <label >Featured Image</label>
                      <input name="lil_file" type="file" required class="form-control"  placeholder="Page Title" />
                </div> 
            
                  
                <div class="form-group">
                  <label >Application</label>
                      <textarea name="  application" class="form-control" id="editor2"  placeholder="Application"></textarea>
                </div>
                
              </div>
             
          </div>
          <!-- /.box -->

        </div>
          
       
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
         </form>
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
    <script src="ckeditor/ckeditor.js"></script>
    <script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace( 'editor1', {
      extraPlugins: 'imageuploader,colorbutton,imageresize',  
        height: '500px',
    });
    CKEDITOR.replace( 'editor2');
  });
</script>
</body>
</html>
