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
  <title>Update Master :<?php include 'title.php'; ?></title>
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
       Update Product Here 
        <small></small>
      </h1>
   
    </section>

    <!-- Main content -->
       <form role="form" method="POST" action="master_product_update_handle.php" enctype="multipart/form-data">
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-8">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Update Product </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <?php
                $sa = "SELECT * FROM product WHERE id=".clean($_REQUEST['id']);
                $result_sa = mysql_query($sa) or die(mysql_error());
                $row_sa = mysql_fetch_assoc($result_sa);
              ?>
           
              <div class="box-body">
                 
                <div class="form-group">
                  <label style="color:red" >Select Category</label>
                    <select name="category" required class="form-control">
                      <option value="">Select Category</option>  
                        <option><?php echo $row_sa['category']; ?></option>
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
                  <label >Product Title </label>
                      <input value="<?php echo $row_sa['title']; ?>" name="title" required class="form-control"  placeholder="Product Title" />
                </div> 
            
                <div class="form-group">
                  <label >Little Description</label>
                    <textarea required name="lil_desc" class="form-control" placeholder="Enter Some Details Here Too" >
                      <?php echo $row_sa['lil_discription']; ?>
                    </textarea>
                </div>
                  
                <div class="form-group">
                  <label > Description</label>
                    <textarea required id="editor1" name="description" class="form-control" >
                      <?php echo $row_sa['description']; ?>
                    </textarea>
                </div>
                              
              </div>
              <!-- /.box-body -->

              
          </div>
          <!-- /.box -->

        </div>
           <div class="col-md-4">
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
                      <input name="menu_name" value="<?php echo $row_sa['menu_name']; ?>" required class="form-control"  placeholder="Menu Name" />
                </div>   
                  
                <div class="form-group">
                  <label >Status</label>
                  <select name="status" required class="form-control" >
                      <option><?php echo $row_sa['status']; ?></option>
                    <option>Avialable</option>
                    <option>Unavailables</option>
                  </select>
                </div> 
                  
                <div class="form-group">
                  <label >Brands</label>
                  <select name="brand" required class="form-control" >
                      <option><?php echo $row_sa['brand']; ?></option>
                    <option>Equipped</option>
                    <option>Sokkia</option>
                    <option>Bosch</option>
                    <option>Garmin</option>
                    <option>Waker Neuson</option>
                    <option>Potain</option>
                    <option>Discher</option>
                      <option>Others</option>
                  </select>
                </div> 
                  <input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>" />
                  
             
                  
                <div class="form-group">
                  <label >Tags (Separate with commas)</label>
                      <textarea name="tag" class="form-control"   placeholder="Tags"><?php echo $row_sa['tag']; ?></textarea>
                </div>
                
                  <div class="box-footer">
                <button type="submit" class="btn btn-success btn-bg">Update Page and Make it Active</button>
              </div>
           
              <br/>
                  
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
        height: '190',
    });
    CKEDITOR.replace( 'editor2');
  });
</script>
</body>
</html>
s