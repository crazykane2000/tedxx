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
    <style></style>
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
        Select Stock (<span id="kant" onclick='printDiv();'>Print</span>)
        <small></small>
      </h1>
    
    </section>

    <!-- Main content -->
    <section class="content" style="font-family:'Open Sans'">
      <div class="row">
        <div class="col-xs-7">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Select Stock</h3>
            </div>
            <!-- /.box-header -->
           <form action="store_order_handle.php" method="post" >
                 <div class="box-body" id="game">
                     <img src="img/chetan_tea_challan.png" style="width:100%" />
                     <hr/>
                        <div class="form-group">
                    <label>Party Name</label>
                    <select class="form-control select2" name="party_name" style="width: 100%;" required>
                      <option value="">Party  Name</option>
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
                      <label >Order Date</label>
                      <input type="date" value="<?php echo date("Y-m-d"); ?>" name="order_date" class="form-control"  >
                    </div> 
                     
                      <div class="form-group">
                          <label >Remark</label>
                           <textarea  name="remark" class="form-control"  placeholder="Any More Information"></textarea>
                        </div> 
                     <br/>
                    <?php
                        if(isset($_REQUEST['choice']))
                        {
                          echo '<div  style="padding:10px;color:#fff;background-color:#55a32c">'.$_REQUEST['value'].'</div><br/>';  
                        }
                    ?>
                     
                     <?php
                        //print_r($_REQUEST);
                     ?>
                   <table id="example1" class="table table-bordered table-striped" style="font-family:calibri;font-size:14px;">
                      <tr>
                        <th>S.No.</th>
                        <th>Garden Mark</th>
                        <th>Grade</th>
                        <th>Invoice No.</th>
                        <th>Qty Balance</th>
                          <th>Qty Wanted</th>
                        <th>Price</th>
                        <th>Box No.</th>                      
                      </tr>
                       <?php
                           $ids = implode(",", $_REQUEST['id']);
                           $i=1;

                           //echo $ids;
                            $sql = "SELECT * FROM `purchase_register` WHERE  id IN (".$ids.")";

                           //echo $sql;
                           $result = mysql_query($sql) or die(mysql_error());
                           while($row = mysql_fetch_array($result))
                           {
                               $balance = $row['balance'];
                                $garden = @explode("|", $row['garden_mark']);
                                echo '<tr style="border-bottom:solid 1px #ccc">
                                        <td style="border-bottom:solid 1px #ccc">'.$i.'</td>
                                        <td style="border-bottom:solid 1px #ccc">'.$garden[1].'</td>
                                        <td style="border-bottom:solid 1px #ccc">'.$row['grade'].'</td>
                                        <td style="border-bottom:solid 1px #ccc">'.$row['invoice_no'].'</td>
                                        <td style="border-bottom:solid 1px #ccc">'.$balance.' x '.$row['qty_kg'].' KG</td>
                                         <td style="border-bottom:solid 1px #ccc"><input type="number" 
                                         name="qty[]" min="0" max="'.$balance.'" onblur="if(this.value>'.$balance.'){alert(\'Qty. Must be less then Balance Quantity\');this.value=0;}" required style="width:50px;" /></td>
                                         <td style="border-bottom:solid 1px #ccc"><input type="number" 
                                         name="price[]" required style="width:50px;" /></td>
                                        <td style="border-bottom:solid 1px #ccc">'.$row['box_no'].'
                                        <input type="hidden" name="id[]" value="'.$row['id'].'" /></td>
                                </tr>';
                               $i++;
                           }
                       ?>
                      
                  </table>
                  <hr/>
                  <input type="submit" value="Store Order and Print" style="float:right" class="btn btn-success" />
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
</html>s