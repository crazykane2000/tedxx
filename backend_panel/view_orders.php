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
    <title>View Stock : Status</title>
  <?php include 'head.php'; ?>
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <script type="text/javascript">
        function printDiv() {
          var divToPrint=document.getElementById('game');
          var newWin=window.open('','Print-Window');
          newWin.document.open();
          newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
          newWin.document.close();
          setTimeout(function(){newWin.close();},10);
        }
    </script>
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
        View Samples (<span id="kant" onclick='printDiv();'>Print</span>)
        <small></small>
      </h1>
    
    </section>

    <!-- Main content -->
    <section class="content" style="font-family:'Open Sans'">
      <div class="row">
        <div class="col-xs-8">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">View Previous Samples</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow-x:scroll" id="game">
                <?php
                    if(isset($_REQUEST['choice']))
                    {
                      echo '<div  style="padding:10px;color:#fff;background-color:#55a32c">'.$_REQUEST['value'].'</div><br/>';  
                    }
                ?>
              <table id="example1" class="table table-bordered table-striped" style="font-family:calibri;font-size:14px;">
                <thead>
                <tr>
                    <th>S.No.</th>
                    <th>Sample No.</th>
                    <th>Party Name</th>
                    <th>Date</th>
                    <th>Action</th>    
                  </tr>
                </thead>
                <tbody>
                <?php
                       $i=1;
                       $sql = "SELECT * FROM `store_order` ORDER BY id DESC";
                       $result = mysql_query($sql) or die(mysql_error());
                       while($row = mysql_fetch_array($result))
                       {
                           $garden = @explode("|", $row['party_name']);
                          // $balance = $row['balance'];
                            echo '<tr style="border-bottom:solid 1px #ccc">
                                <td style="border-bottom:solid 1px #ccc">'.$i.'</td>
                                <td style="border-bottom:solid 1px #ccc"><b style="background-color:green;
                              color:#fff;padding:4px;border-radius:4px">SAMPLE '.$row['id'].'</b></td>
                                <td style="border-bottom:solid 1px #ccc"><b style="background-color:orangered;
                              color:#fff;padding:4px;border-radius:4px">'.$garden[1].'</b></td>
                                <td style="border-bottom:solid 1px #ccc"><b style="background-color:red;
                              color:#fff;padding:4px;border-radius:4px">'.$row['date'].'</b></td>
                                
                                <td style="border-bottom:solid 1px #ccc">
                              <a href="view_order_details.php?id='.$row['id'].'">
                              <button  class="btn btn-xs btn-success"><i class="fa fa-fw fa-eye"></i>View </button></a>
                              
                              <a href="delete_sample.php?id='.$row['id'].'" onclick="return alert("Are You Sure You Want to Delete This?");">
                              <button  class="btn btn-xs btn-danger"><i class="fa fa-fw fa-times"></i>Delete</button></a></td>
                            </tr>';
                           $i++;
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