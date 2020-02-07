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
  <title>Purchase Register : Chetan Tea</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <!-- Ionicons -->
    
    <!-- daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="plugins/colorpicker/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/select2.min.css">
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
       Orders
        <small></small>
      </h1>
   
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row" style="min-height:800px">
        <!-- left column -->
        <div class="col-md-3">
            
            
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">New Order</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="order_handle.php">
              <div class="box-body">
                <div class="form-group">
                    <label>Party Name</label>
                    <select class="form-control select2" name="buyer_name" style="width: 100%;" required>
                      <option value="">Buyer Name</option>
                      <?php
                            $sql = "SELECT id,name from master_people WHERE type='Buyer'";
                            $result = mysql_query($sql) or die(mysql_error());
                            while($row = mysql_fetch_assoc($result))
                            {
                                echo '<option value="'.$row['id'].' | '.$row['name'].'">'.$row['name'].'</option>';
                            }
                        ?>
                    </select>
                 </div>
                 
                  
            <div class="form-group">
                <label>Order Date:</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" value="<?php echo date("d/m/Y"); ?>" class="form-control pull-right" name="purchase_date" id="datepicker">
                </div>
                <!-- /.input group -->
              </div>
                  
                <div class="form-group">
                    <label>Garden Mark</label>
                    <select class="form-control select2" name="garden_mark" style="width: 100%;" required>
                      <option value="">Select Garden Mark</option>
                       <?php
                            $sql = "SELECT id,mark from master_garden";
                            $result = mysql_query($sql) or die(mysql_error());
                            while($row = mysql_fetch_assoc($result))
                            {
                                echo '<option value="'.$row['id'].' | '.$row['mark'].'">'.$row['mark'].'</option>';
                            }
                        ?>
                    </select>
                 </div>
                  
                  <div class="form-group">
                    <label>Grade</label>
                    <select class="form-control" name="grade" style="width: 100%;" required>
                      <option value="">Select Grade</option>
                      <?php
                            $sql = "SELECT grade from master_grade";
                            $result = mysql_query($sql) or die(mysql_error());
                            while($row = mysql_fetch_assoc($result))
                            {
                                echo '<option>'.$row['grade'].'</option>';
                            }
                        ?>
                    </select>
                 </div>
               
              
               <div class="form-group">
                    <label>Goods Status</label>
                    <select class="form-control" name="good_status" style="width: 100%;" >
                      <option value="">Select Status</option>
                     <?php
                            $sql = "SELECT status from master_status";
                            $result = mysql_query($sql) or die(mysql_error());
                            while($row = mysql_fetch_assoc($result))
                            {
                                echo '<option>'.$row['status'].'</option>';
                            }
                        ?>
                    </select>
                 </div>
                  
                
              
                <div class="form-group">
                  <label>Consignment Number</label>
                  <input type="text" name="consignmen_no" class="form-control"  placeholder="Consignment Number">
                </div>
                  
                <div class="form-group">
                  <label>Sample Box Number</label>
                  <input type="text" name="box_number" class="form-control"  placeholder="For Sample">
                </div>
                  
                  <div class="form-group">
                    <label>Quality</label>
                    <select class="form-control" name="quality" style="width: 100%;" >
                      <?php
                            $sql = "SELECT id,quality from master_quality";
                            $result = mysql_query($sql) or die(mysql_error());
                            while($row = mysql_fetch_assoc($result))
                            {
                                echo '<option>'.$row['quality'].'</option>';
                            }
                        ?>
                    </select>
                 </div>
                  
              </div>
                
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-success">Add Order</button>
              </div>
            </form>
              <br/>
          </div>
          <!-- /.box -->

        </div>
        
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">New Order</h3>
                </div>
                
                <div style="background-color:#eee;padding:10px;">
                    <div class="form-group" >
                         <div class="col-md-2" >
                             <label>Sample Box Number</label>
                            <input type="text" name="box_number" class="form-control"  placeholder="For Sample">
                         </div>

                        <div class="col-md-2" >
                             <label>Sample Box Number</label>
                            <input type="text" name="box_number" class="form-control"  placeholder="For Sample">
                         </div>

                        <div class="col-md-2" >
                             <label>Sample Box Number</label>
                            <input type="text" name="box_number" class="form-control"  placeholder="For Sample">
                         </div>
                    </div>
                    <div style="clear:both"></div>
                </div>
            </div>
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
<!-- Select2 -->
<script src="plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap color picker -->
<script src="plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

       $('#datepicker1').datepicker({
      autoclose: true
    });
      
        $('#datepicker2').datepicker({
      autoclose: true
    });

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  });
</script>
</body>
</html>