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
    <title>View Order Details</title>
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
    <style type="text/css">
        
        #game{font-size: 12px;}
        
        @media print
        {
            body{ visibility: hidden; }
            #game { visibility: visible; width:5in ; font: 10px verdana, sans-serif;}  
            .log{width:100%}
            #byu{display: none;}
            th{ background-color: #eeeeee !important;  -webkit-print-color-adjust: exact; }
           
        }
        th{background-color: #888;color:#fff;}
        
</style>
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
        View Order Details(<span id="kant" onclick='printDiv();'>Print</span>)
        <small></small>
      </h1>
    
    </section>

    <!-- Main content -->
    <section class="content" style="font-family:'Open Sans'">
      <div class="row">
        <div class="col-xs-7">
          <div class="box">
            
            <!-- /.box-header -->
            <?php
                $sql = "SELECT * FROM orders WHERE id=".$_REQUEST['id'];
                $result = mysql_query($sql) or die(mysql_error());
                $rows = mysql_fetch_assoc($result);
              ?>
              
                 <div class="box-body portrait" id="game" >
                     <img src="img/chetan_tea_challan.png" class="log" style="width:100%" />
                     <hr/>
                        <div class="form-group">
                    <label>Order No.</label> : <?php echo "ORD".$rows['id']; ?><br/>
                    <label>Party Name</label> : <?php $garden = @explode("|", $rows['party_name']); echo $garden[1]; ?><br/>
                    <label>Order Date</label> : <?php echo $rows['date'];?>
                    
                 </div>
                 
                   <table id="example1" class="table table-bordered table-striped" >
                      <tr style="background-color:#eee">
                        <th>S.No.</th>
                        <th>Garden Mark</th>
                        <th>Grade</th>
                        <th>Invoice No.</th>
                        <th>Box No.</th> 
                        <th>Price</th>
                        <th>Ord.Qty</th>                        
                        <th>Total</th> 
                                      
                      </tr>
                       <?php
                            //print_r($row);
                           $ids = $rows['sample_ids'];
                           $i=1;
                           $prices = explode(",", $rows['prices']);
                           $qtys = explode(",", $rows['qtys']);
                            //print_r($qtys);
                       
                           $sql = "SELECT * FROM `purchase_register` WHERE id IN (".$ids.")";
                           $result = mysql_query($sql) or die(mysql_error());
                           $sum = 0;
                           $sum_qty = 0;
                           while($row = mysql_fetch_array($result))
                           {
                               $balance = $row['balance'];
                                $garden = @explode("|", $row['garden_mark']);
                               $priced = ($prices[$i-1]*$qtys[$i-1]*$row['qty_kg']);
                               
                                echo '<tr style="border-bottom:solid 1px #ccc">
                                        <td style="border-bottom:solid 1px #ccc">'.$i.'</td>
                                        <td style="border-bottom:solid 1px #ccc;color:red"><b>'.$garden[1].'</td>
                                        <td style="border-bottom:solid 1px #ccc">'.$row['grade'].'</td>
                                        <td style="border-bottom:solid 1px #ccc">'.$row['invoice_no'].'</td>
                                        <td style="border-bottom:solid 1px #ccc">'.$row['box_no'].'
                                        <td style="border-bottom:solid 1px #ccc">Rs.'.$prices[$i-1].'</td>
                                        <td style="border-bottom:solid 1px #ccc">'.$qtys[$i-1].' x '.$row['qty_kg'].'KG</td>
                                        <td style="border-bottom:solid 1px #ccc">'.$priced.'                                       
                                        <input type="hidden" name="id[]" value="'.$row['id'].'" /></td>
                                </tr>';
                               
                               $sum_qty = $sum_qty+($qtys[$i-1]);
                               
                               $sum = $sum+($prices[$i-1]*$qtys[$i-1]*$row['qty_kg']);
                               $i++;
                           }
                       ?>
                      <tr>
                          <td colspan="6" style="border-bottom:solid 1px #ccc;text-align:right"><b>Grand Total </b></td>
                          <td style="border-bottom:solid 1px #ccc;background-color:green;color:#fff;"><?php echo $sum_qty; ?> Bags</td>
                          <td  style="border-bottom:solid 1px #ccc;background-color:green;color:#fff;">Rs. <?php echo $sum; ?></td>                       
                       </tr>
                  </table>
                  <hr/>
                     <b style="font-size:12px;">Terms and Conditions</b><br/>
                     <span>Remark : <?php echo $rows['remark']; ?></span> <br/>
                     <span>Note : Above are the details of Tea Samples of No Commercial Value</span>
                     <br/>
                     <div style="clear:both"></div>
                     <br/>
                    <a target="_blank" href="print_order.php?id=<?php echo $_REQUEST['id']; ?>" >
                       <button  style="float:left;margin-right:10px;margin-left:10px;" class="btn btn-success" id="byu" >Print Order Sheet</button></a>
                    
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
<script src="jQuery.print.js" ></script>
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