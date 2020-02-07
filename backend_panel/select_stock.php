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
    <title>Select Stock : Status</title>
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
        View Stock (<span id="kant" onclick='printDiv();'>Print</span>)
        <small></small>
      </h1>
    
    </section>

    <!-- Main content -->
    <section class="content" style="font-family:'Open Sans'">
      <div class="row">
        <div class="col-xs-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Select Stock</h3>
            </div>
            <!-- /.box-header -->
           <form  method="post" >
                 <div class="box-body" id="game">
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
                            <th>Garden Mark</th>
                            <th>Grade</th>
                            <th>Invoice No.</th>
                            <th>Qty Balance</th>
                            <th>Box No.</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $i=1;
                        $sql = "SELECT * FROM `purchase_register` WHERE cast(balance AS SIGNED)>0 ORDER BY id DESC";    
                        $result = mysql_query($sql) or die(mysql_error());
                        while($row = mysql_fetch_array($result))
                        {
                            //print_r($row);
                            $broker_name = explode("|",$row['broker_name']);
                            $consigner_name = explode("|",$row['consigner_name']);
                            //print_r($broker_name);

                            $garden = @explode("|", $row['garden_mark']);
                            $balance = $row['balance'];

                               echo '<tr>
                                    <td><input type="checkbox" name="id[]" value="'.$row['id'].'" /></td>
                                    <td><b style="background-color:red;
                                  color:#fff;padding:4px;border-radius:4px">'.$garden[1].'</b></td>
                                    <td><b  style="background-color:green;
                                  color:#fff;padding:4px;border-radius:4px">'.$row['grade'].'</b></td>   
                                    <td><b>'.$row['invoice_no'].'</b></td>
                                    <td><b>'.$balance.' x '.$row['qty_kg'].' KG</b></td>                                
                                    <td><b style="background-color:orangered;color:#fff;padding:4px;border-radius:4px">
                                    '.$row['box_no'].'</b></td> 
                                </tr>'; 
                                $i++;
                        }
                    ?>
                  </table>
                  <hr/>
                  <button type="submit"  style="float:right" class="btn btn-info" formaction="select_stock_handle.php" >Add to Samples</button> 
                     <button type="submit"  style=";margin-right:10px;float:right" formaction="select_order_stock.php" class="btn btn-success" >Add to Orders</button>
                </div>  
            </form>
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