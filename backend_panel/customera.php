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
    <title>View Master : People</title>
  <?php include 'head.php'; ?>
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php include 'header.php'; ?>
<?php  include 'sidebar.php';  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Customers <a class="btn  btn-success btn-sm" title="Add New People" href="add_vendor.php"><i class="fa  fa-black-tie"></i>  Add New</a>
        <small></small>
      </h1>
    
    </section>

    <!-- Main content -->
    <section class="content" style="font-family:'Open Sans'">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Customers</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <?php
                    if(isset($_REQUEST['choice']))
                    {
                      echo '<div  style="padding:10px;color:#fff;background-color:#55a32c">'.$_REQUEST['value'].'</div><br/>';  
                    }
                ?>
              <table id="example1" class="table table-bordered table-striped" style="font-size:14px;font-family:calibri">
                <thead>
                <tr>
                  <th>People Type</th>
                    <th>Business Name</th>
                  <th>Name</th>
                    <th>Mobile</th>
                    <th>Business</th>
                    <th>year</th>
                    <th>Reference Froms</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $sql = "SELECT * FROM `master_people` WHERE type='Customer' ORDER BY `type` DESC";    
                    $result = mysql_query($sql) or die(mysql_error());
                    while($row = mysql_fetch_array($result))
                    {
                      $bg = 'red';
                      switch ($row['type']) {
                        case 'Customer':
                         $bg = 'red';
                          break;
                          
                         case 'Vendor':
                         $bg = 'green';
                          break;

                           case 'Associate Partner':
                         $bg = 'orange';
                          break;
                              
                         case 'Employee':
                         $bg = 'purple';
                          break;
                       
                      }
                        //print_r($row);
                       echo '<tr>
                              <td> <b style="background-color:'.$bg.';
                              color:#fff;padding:4px;border-radius:4px">'.$row['type'].'</b></td>
                               <td><b>'.$row['business_name'].'</b></td>
                              <td><b>'.$row['name'].'</b><br/>'.$row['address'].'</td>
                              <td>'.$row['mobile'].'<br/>
                              '.$row['email'].'</td>
                              <td>'.$row['deals_with'].'</td>
                              <td>'.$row['year'].'</td>
                              <td>'.$row['reference_from'].'</td>
                             <td><a href="delete_master_people.php?id='.$row['id'].'" onclick="return alert("Are You Sure You Want to Delete This?");">
                              <button  class="btn btn-xs btn-danger"><i class="fa fa-fw fa-times"></i></button></a>
                              <a href="update_master_grade.php?id='.$row['id'].'">
                              <button  class="btn btn-xs btn-success"><i class="fa fa-fw fa-rotate-left"></i></button></a>
                              </td>
                            </tr>'; 
                    }
                ?>
               
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
    <?php include 'footer.php'; ?>
    <?php include 'control_sidebar.php'; ?>
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</body>
</html>