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
            #game { visibility: visible; width:5.5in ; font: 10px verdana, sans-serif;}  
            .log{width:100%}
            #byu{display: none;}
            th{ background-color: #eeeeee !important;  -webkit-print-color-adjust: exact; }
           
        }
        th{background-color: #888;color:#fff;}
        
</style>
</head>
<body class="hold-transition skin-blue sidebar-mini">

    <!-- Main content -->
    <section class="content" style="font-family:'Open Sans'">
      <div class="row">
        <div class="col-xs-5">
          <div class="box">
            
            <!-- /.box-header -->
            <?php
                $sql = "SELECT * FROM store_order WHERE id=".$_REQUEST['id'];
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
                        <th>Bal.Qty</th>
                        <th>Price</th>
                        <th>Box No.</th>                      
                      </tr>
                       <?php
                            //print_r($row);
                           $ids = $rows['sample_ids'];
                           $i=1;
                            $prices = explode(",", $rows['prices']);
                       
                           $sql = "SELECT * FROM `purchase_register` WHERE id IN (".$ids.")";
                           $result = mysql_query($sql) or die(mysql_error());
                           while($row = mysql_fetch_array($result))
                           {
                               $balance = $row['balance'];
                                $garden = @explode("|", $row['garden_mark']);
                                echo '<tr style="border-bottom:solid 1px #ccc">
                                        <td style="border-bottom:solid 1px #ccc">'.$i.'</td>
                                        <td style="border-bottom:solid 1px #ccc;font-weight:bold;color:red">'.$garden[1].'</td>
                                        <td style="border-bottom:solid 1px #ccc">'.$row['grade'].'</td>
                                        <td style="border-bottom:solid 1px #ccc">'.$row['invoice_no'].'</td>
                                        <td style="border-bottom:solid 1px #ccc">'.$balance.' x '.$row['qty_kg'].'KG</td>
                                         <td style="border-bottom:solid 1px #ccc">Rs.'.$prices[$i-1].'</td>
                                        <td style="border-bottom:solid 1px #ccc">'.$row['box_no'].'
                                        <input type="hidden" name="id[]" value="'.$row['id'].'" /></td>
                                </tr>';
                               $i++;
                           }
                       ?>
                      
                  </table>
                  <hr/>
                     <b style="font-size:12px;">Terms and Conditions</b><br/>
                     <span>Remark : <?php echo $rows['remark']; ?></span> <br/>
                     <span>Note : Above are the details of Tea Samples of No Commercial Value</span>
                     <button  style="float:right" class="btn btn-success" id="byu" onclick="window.print();" >Print Order Sheet</button>
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