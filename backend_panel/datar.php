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
    <title>View Orders : Status</title>
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
        View Samples Given (<span id="kant" onclick='printDiv();'>Print</span>)
        <small></small>
      </h1>
    
    </section>

    <!-- Main content -->
    <section class="content" style="font-family:'Open Sans'">
      <div class="row">
        <div class="col-xs-5">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title" style="color:red">Given Samples</h3>
            </div>
            <!-- /.box-header -->
        
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
                            <th>Garden.</th>
                             <th>Qty</th>
                            <th>Grade</th>
                            <th>Invoice</th>
                             <th>Box No.</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php
                            $sql = "SELECT sample_ids,party_name FROM store_order WHERE (SELECT SUBSTRING_INDEX(party_name, ' | ', 1))=".$_REQUEST['id'];
                            $ds =array();
                            $arr = array();
                            $result = mysql_query($sql) or die(mysql_error());
                             while($row = mysql_fetch_array($result))
                             {
                                 $arr[]=$row['sample_ids'];
                                 $data = implode(",",$arr);
                                 $fg = explode(",", $data);
                                 $ds = array_unique($fg);
                                 $data = implode(",",$ds);
                             }
                        //print_r($ds);
                       ?>
                        
                        <?php
                        $sd = "SELECT * FROM purchase_register WHERE id IN(".$data.")";
                        //echo $sd;
                        $result_sd = mysql_query($sd) or die(mysql_error());
                        $i=1;
                        while($dx = mysql_fetch_array($result_sd))
                        {
                            if($dx['balance']==0)
                            {
                                continue;
                            }
                           $garden = @explode("|", $dx['garden_mark']);
                           // print_r($dx);
                           echo '<tr style="border-bottom:solid 1px #ccc">
                                        <td style="border-bottom:solid 1px #ccc">'.$i.'</td>
                                        <td style="border-bottom:solid 1px #ccc;color:red"><b> '.$garden[1].'</b></td>
                                        <td style="border-bottom:solid 1px #ccc;color:#333;backgrund-color:#ccc"><b> '.$dx['balance'].'x'.$dx['qty_kg'].'KG</b></td>
                                        <td style="border-bottom:solid 1px #ccc">'.$dx['grade'].'</td>
                                        <td style="border-bottom:solid 1px #ccc">'.$dx['invoice_no'].'</td>
                                        <td style="border-bottom:solid 1px #ccc"><b style="background-color:orangered;color:#fff;padding:4px;border-radius:4px">'.$dx['box_no'].'</b></td>
                                </tr> ';
                            $i++;
                        }
                     ?>
                         </tbody>
                  </table>
                     
                    
                  <hr/>
                 
                </div>  
            </form>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        
        <div class="col-xs-5">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title" style="color:red">Samples Not Given</h3>
            </div>
              <div class="box-body" >
                   <table id="example2" class="table table-bordered table-striped" style="font-family:calibri;font-size:14px;">
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>Garden.</th>
                             <th>Qty</th>
                            <th>Grade</th>
                            <th>Invoice</th>
                             <th>Box No.</th>
                        </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $sd = "SELECT id FROM purchase_register WHERE balance>0";
                    $result_sd = mysql_query($sd) or die(mysql_error());
                    $dc = array();
                    while($row_dc = mysql_fetch_array($result_sd))
                    {
                        $dc[] = $row_dc['id'];
                    }
                    
                    $dx = array_diff($dc, $ds);
                    $cx = implode(",", $dx);
                  
                    $sd = "SELECT * FROM purchase_register WHERE id IN(".$cx.")";
                        //echo $sd;
                        $result_sd = mysql_query($sd) or die(mysql_error());
                        $i=1;
                        while($dx = mysql_fetch_array($result_sd))
                        {
                            if($dx['balance']==0)
                            {
                                continue;
                            }
                           $garden = @explode("|", $dx['garden_mark']);
                           // print_r($dx);
                           echo '<tr style="border-bottom:solid 1px #ccc">
                                        <td style="border-bottom:solid 1px #ccc">'.$i.'</td>
                                        <td style="border-bottom:solid 1px #ccc;color:red"><b> '.$garden[1].'</b></td>
                                        <td style="border-bottom:solid 1px #ccc;color:#333;backgrund-color:#ccc"><b> '.$dx['balance'].'x'.$dx['qty_kg'].'KG</b></td>
                                        <td style="border-bottom:solid 1px #ccc">'.$dx['grade'].'</td>
                                        <td style="border-bottom:solid 1px #ccc">'.$dx['invoice_no'].'</td>
                                        <td style="border-bottom:solid 1px #ccc"><b style="background-color:orangered;color:#fff;padding:4px;border-radius:4px">'.$dx['box_no'].'</b></td>
                                </tr> ';
                            $i++;
                        }
                        
                  ?>
                       </tbody>
                  </table>
              </div>
            </div>
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
     $('#example1').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
      
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