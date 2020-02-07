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
    <title>Purchase Register : Status</title>
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
        Purchase Register
        <small></small>
      </h1>
    
    </section>

    <!-- Main content -->
    <section class="content" style="font-family:'Open Sans'">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Purchase Register</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow-x:scroll">
                <?php
                    if(isset($_REQUEST['choice']))
                    {
                      echo '<div  style="padding:10px;color:#fff;background-color:#55a32c">'.$_REQUEST['value'].'</div><br/>';  
                    }
                ?>
                 <button>Ftaaka</button>
              <table id="example1" class="table table-bordered table-striped table2excel" style="font-family:calibri;font-size:14px;width:2400px">
                <thead>
                <tr style="background-color:#ddd">
                <th>S.No.</th>
                  <th>Broker</th>
                  <th>Cons. Name</th>
                    <th>Pur. Date</th>
                    <th>Garden Mark</th>
                     <th>Grade</th>
                    <th>Invoice No.</th>
                    <th>Qty.B</th>
                    <th>Qty KG</th>
                    <th>Qty Bal.</th>
                    <th>Price</th>
                    <th>Transport</th>
                    <th>Builty No.</th>
                    <th>Good Status</th>
                    <th>Status Date</th>
                    <th>PS</th>
                    <th>BS</th>
                    <th>Bill No.</th>
                    <th>Bill Date</th>
                    <th>CS No.</th>
                    <th>Box No.</th>
                    <th>Quality</th>
                   
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i=1;
                    $sql = "SELECT * FROM `purchase_register` ORDER BY id DESC";    
                    $result = mysql_query($sql) or die(mysql_error());
                    while($row = mysql_fetch_array($result))
                    {
                        //print_r($row);
                        $broker_name = explode("|",$row['broker_name']);
                        $consigner_name = explode("|",$row['consigner_name']);
                        //print_r($broker_name);
                        $garden = @explode("|", $row['garden_mark']);
                       echo '<tr>
                       <td>'.$i.'</td>
                              <td> <b style="background-color:red;                              color:#fff;padding:4px;border-radius:4px">'.@$broker_name[1].'</b></td>
                              <td><b style="background-color:green;
                              color:#fff;padding:4px;border-radius:4px">'.@$consigner_name[1].'</b></td>
                               
                                <td><b>'.$row['purchase_date'].'</b></td>
                                <td><b>'.$garden[1].'</b></td>
                                 <td><b>'.$row['grade'].'</b></td>   
                                <td><b>'.$row['invoice_no'].'</b></td>
                                <td><b>'.$row['qty_bag'].'</b></td>
                                <td><b>'.$row['qty_kg'].' KG</b></td>
                                <td style="color:#fff;background-color:green"><b>'.$row['balance'].'</b></td>
                                <td><b>Rs. '.$row['price'].'</b></td>
                                <td><b>'.$row['transport'].'</b></td>
                                <td><b>'.$row['transport_builty_no'].'</b></td>
                                <td><b  style="background-color:green;                              color:#fff;padding:4px;border-radius:4px">'.$row['good_status'].'</b></td>
                                
                                <td><b>'.$row['status_date'].'</b></td>   
                                 <td><b>'.$row['purchase_sample'].'</b></td>   
                                  <td><b>'.$row['bag_sample'].'</b></td>   
                                <td><b>'.$row['bill_no'].'</b></td>   
                                <td><b>'.$row['bill_date'].'</b></td>   
                                <td><b>'.$row['consignment_no'].'</b></td>   
                                <td><b>'.$row['box_no'].'</b></td> 
                               <td><b>'.$row['quality'].'</b></td>   
                            
                                              
                               <td><a href="delete_purchase_register.php?id='.$row['id'].'" onclick="return alert("Are You Sure You Want to Delete This?");">
                              <button  class="btn btn-xs btn-danger"><i class="fa fa-fw fa-times"></i></button></a>
                              <a href="update_purchase_register.php?id='.$row['id'].'">
                              <button  class="btn btn-xs btn-success"><i class="fa fa-fw fa-rotate-left"></i></button></a>
                              </td>
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
    <script type="text/javascript" src="jquery.table2excel.js"></script>
    <script>
        $(document).ready(function(){
            $("button").click(function(){
              $(".table2excel").table2excel({
                // exclude CSS class
                exclude: ".noExl",
                name: "Worksheet Name",
                filename: "SomeFile" //do not include extension
              }); 
            });
        });
    </script>
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