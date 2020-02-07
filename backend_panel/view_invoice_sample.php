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
    <script>
        history.pushState(null, null, document.URL);
        window.addEventListener('popstate', function () {
            history.pushState(null, null, document.URL);
        });
    </script>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Catpops Technobiz</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
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
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
     <link rel="stylesheet" href="style.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    <style>
        .mata{ background-color: red;}
            @media print {
                .gh{ display: none; }
                .mata{ background-color: red;}              
            }
    </style>
    
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    
   

 <?php include 'header.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
 <?php include 'sidebar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <?php
        $sql = "SELECT * FROM invoice WHERE id=".clean($_REQUEST['id']);
        $result = mysql_query($sql) or die(mysql_error());
        $row = mysql_fetch_assoc($result);
        $datas = $row;
        //print_r($datas);
        $logo = "img/Invoicelogo_Capture.JPG";

        if($row['firm_name']=="Priyanka Enterprises")
        {
           $logo="img/priyanka_logo.jpg"; 
        }
        else
          {
              $logo = "img/Invoicelogo_Capture.JPG";
          }
    ?>
        
    <section class="content-header gh">
          <h1  style="font-family:georgia">
          View all Invoices of <?php echo $row['customer_company']; ?>
            <small></small>
          </h1>

        </section>

    <!-- Main content -->
   <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default" style="background-color:#eee">
        
        <div class="box-body">  
            <div class="row" style="">
                 <div class="col-md-4 gh" >
                     <div style="padding:10px;">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                              <li class="active"><a href="#tab_1" data-toggle="tab"><i class="fa fa-fw fa-clock-o"></i>Timeline</a></li>
                              <li><a href="#tab_2" data-toggle="tab"><i class="fa fa-fw fa-list"></i>Add New</a></li>
                              <li><a href="#tab_3" data-toggle="tab"><i class="fa fa-fw fa-money"></i>Transactions</a></li>
                              
                              
                            </ul>
                            <div class="tab-content">
                              <div class="tab-pane active" id="tab_1">
                                <ul class="timeline">
                                    <?php 
                                        $sx = "SELECT * FROM tx_timeline_clients WHERE `client_id`='".$datas['customer_id']."'";
                                        //echo $sx;
                                       
                                    
                                        $result_sx = mysql_query($sx) or die(mysql_error());
                                        $color = "";
                                        while($row_sx=mysql_fetch_array($result_sx))
                                        {
                                            
                                            
                                            if($row_sx['tx_type']=="credit")
                                            {
                                                $color="red";
                                            }
                                            else if($row_sx['tx_type']=="debit")
                                            {
                                                $color="green";
                                            }
                                            else
                                            {
                                                $color="yellow";
                                            }
                                            
                                            
                                            $rty = "";
                                            if($row_sx['tx_type']=="others")
                                            {
                                                $rty = "General Message";
                                            }
                                            else
                                            {
                                                $rty = $row_sx['tx_type'].' <b style="color:'.$color.'">₹ '.number_format($row_sx['amount'], 2)."</b>";
                                            }
                                            
                                            $gend = "";
                                            //print_r($row_sx);
                                            if($row_sx['remark']=="New Invoice Generated")
                                            {
                                                $newstring = (int)substr($row_sx['invoice_no'], -4);
                                                
                                                $gend = '<li class="time-label">
                                                        <span class="bg-'.$color.'">
                                                           <a style="color:#fff" href="view_invoice_sample.php?id='.$newstring.'">'.$row_sx['invoice_no'].'</a>
                                                        </span>
                                                    </li>';
                                            }
                                            
                                            echo ' <!-- timeline time label -->
                                                    
                                                    <!-- /.timeline-label -->
                                                    '.$gend.'
                                                    <!-- timeline item -->
                                                    <li>
                                                        <!-- timeline icon -->
                                                        <i class="fa fa-envelope bg-'.$color.'"></i>
                                                        <div class="timeline-item">
                                                            <span class="time"><i class="fa fa-clock-o"></i> '.$row_sx['date_of_trans'].'</span>

                                                            <h3 class="timeline-header">'.$rty.'</h3>

                                                            <div class="timeline-body">
                                                               '.$row_sx['remark'].'
                                                            </div>

                                                        </div>
                                                    </li>
                                                    <!-- END timeline item -->';
                                        }
                                    ?>
                                   
                                </ul>
                              </div>
                                
                              <!-- /.tab-pane -->
                              <div class="tab-pane" id="tab_2">
                               <div class="box-header with-border">
                                  <h3 class="box-title">Add Credit / Debit</h3>
                                </div>
                                  <form role="form" method="POST" action="add_credit.php" >
                                      <div class="box-body">
                                        <div class="form-group">
                                          <label for="exampleInputEmail1">Type of Transaction</label>
                                          <select  class="form-control"  name="type">
                                              <option>credit</option>
                                              <option>debit</option>
                                              <option>others</option>
                                          </select>
                                        </div>
                                           
                                        <div class="form-group">
                                         <label for="exampleInputEmail1">Amount</label>
                                            <div class="input-group">
                                            <input type="text" name="amount" class="form-control">
                                            <span class="input-group-addon">.00</span>
                                          </div>
                                        </div>
                                       <input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>" />
                                          <input type="hidden" name="customer_id" value="<?php echo $row['customer_id']; ?>" />
                                           <input type="hidden" name="invoice_no" value="<?php echo $row['invoice_no']; ?>" />
                                       
                                          <div class="form-group">
                                            <label>Date:</label>

                                            <div class="input-group date">
                                              <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                              </div>
                                              <input type="text" class="form-control pull-right" name="date" id="datepicker">
                                            </div>
                                            <!-- /.input group -->
                                          </div>
                                          
                                        <div class="form-group">
                                          <label for="exampleInputFile">Remark</label>
                                          <input type="text" class="form-control" name="remark" >
                                        </div>                                       
                                      </div>
                                      <!-- /.box-body -->

                                      <div class="box-footer">
                                        <button type="submit" class="btn btn-success">Add Payment Status</button>
                                      </div>
                                    </form>
                              </div>
                              <!-- /.tab-pane -->
                              <div class="tab-pane" id="tab_3">
                                <div class="scroll-y noscroll-x fill body scrollbox list-body">    
                                      <div class="table-responsive customviews-table ">
                                          <table id="ember1391" class="header-fixed ember-view table zi-table table-hover  table-striped"><!---->
                                            <tbody>
                                                <tr style="color:#fff;background-color:#605ca8">
                                                    <th>Date</th>
                                                    <th>Credit</th>
                                                    <th>Debit</th>
                                                    <?php
                                                     $sx = "SELECT * FROM tx_timeline_clients WHERE `client_id`='".$datas['customer_id']."'";
                                                     $result_sx = mysql_query($sx) or die(mysql_error());
                                                     $credit = 0;
                                                     $debit = 0;
                                                     $credit_sum=0;
                                                     $debit_sum=0;
                                                                                                         
                                                     while($row_sx=mysql_fetch_array($result_sx))
                                                     {
                                                         if($row_sx['tx_type']=="credit")
                                                         {
                                                             $credit=$row_sx['amount'];
                                                             $debit= 0;
                                                         }
                                                         else
                                                         {
                                                             $debit=$row_sx['amount'];
                                                             $credit = 0;
                                                         }
                                                         
                                                         echo '<tr><td>'.$row_sx['date'].'</td>
                                                            <td>₹'.number_format((float)$credit,2).'</td>
                                                            <td>₹'.number_format((float)$debit,2).'</td></tr>';
                                                         
                                                         $credit_sum+=$credit;
                                                         $debit_sum+=$debit;
                                                     }
                                                    ?>
                                                    
                                                </tr>
                                                <tr>
                                                    <td><b>Total Amount</b></td>
                                                    <td><b>₹<?php echo number_format((float)$credit_sum,2); ?></b></td>
                                                    <td><b>₹<?php echo number_format((float)$debit_sum,2); ?></b></td>
                                                    <?php $balance = $credit_sum-$debit_sum; ?>
                                                </tr>
                                                <tr style="background-color:#ccc">
                                                    <td colspan="2"><b>Total Balance</b></td>
                                                    <td><b>₹<?php echo number_format((float)$balance,2);  ?></b></td>
                                                </tr>
                                        <!----></tbody>
                                        </table>    
                                        </div>
                                     </div>
                              </div>
                              <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                          </div>
                         
                     </div>
                </div>
                <div class="col-md-7 " style="background-color:#">
                    
                    <div style="padding:40px;box-shadow:0px 0px 10px #ccc;position:relative;background-color:#fff" id="makli">
                        <div style="padding:30px;" class="gh"></div>
                       <div id="ember1794" disabled="false" class="gh ribbon ember-view popovercontainer" data-original-title="" title="">  
                           <div class="ribbon-inner ribbon-success">
                           Sample
                          </div>
                        </div>
                        
                      
                        
                        <table style="width:100%;table-layout: fixed;">
                          <tbody>
                            <tr>
                              <td style="vertical-align: top; width:50%;">
                                  <div>
                                         <img id="logo_content" style="width:240.00px;height:99.94px;" src="<?php echo $logo; ?>">
                                 </div>
                                 <span class="pcs-orgname"><b><?php echo $row['firm_name']; ?></b></span><br>
                                 <span class="pcs-label">
                                 <span id="tmp_org_address" style="white-space: pre-wrap;word-wrap: break-word;">India</span>
                                 </span>
                              </td>
                                <td style="vertical-align: top; text-align:right;width:50%;">
                                 <span class="pcs-entity-title">INVOICE</span><br>
                                 <span class="pcs-label" style="font-size: 10pt;color:#777" id="tmp_entity_number"><b># <?php echo $row['invoice_no']; ?></b></span>
                                 <div style="clear:both;margin-top:20px;">
                                     <span style="font-size:8pt;"><b>Previous Balance Due</b></span><br>
                                     <span style="font-size:15pt;"><b>Rs.<?php echo number_format((float)$balance,2); ?></b></span>
                                 </div>
                                </td>
                            </tr>
                          </tbody>
                         </table>
                        <table style="clear:both;width:100%;margin-top:30px;table-layout:fixed;">
                             <tbody><tr>
                             <td style="width:60%;vertical-align:bottom;word-wrap: break-word;">
                    <div><label id="tmp_billing_address_label" class="pcs-label" style="font-size: 10pt;">Bill To</label>
                                <br>
                                <span id="zb-pdf-customer-detail" class="pcs-customer-name"><a href="view_person.php"><?php echo $row['customer_company']; ?> </a></span><br>

                                </div> 
                             </td>
                             <td style="vertical-align:bottom;width: 40%;" align="right">
                                 <table cellpadding="0" cellspacing="0" border="0" style="float:right;width: 100%;table-layout: fixed;word-wrap: break-word;">
                                     <tbody>
                                         <tr>
                                             <td style="text-align:right;padding:5px 10px 5px 0px;font-size:10pt;">
                                                <span class="pcs-label">Invoice Date :</span>
                                            </td>
                                            <td style="text-align:right;">
                                                <span id="tmp_entity_date"><?php echo $row['date']; ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                             <td style="text-align:right;padding:5px 10px 5px 0px;font-size: 10pt;">
                                                <span class="pcs-label">Terms :</span>
                                            </td>
                                            <td style="text-align:right;">
                                                <span id="tmp_payment_terms"><?php echo $row['payment_terms']; ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                             <td style="text-align:right;padding:5px 10px 5px 0px;font-size: 10pt;">
                                                <span class="pcs-label">Due Date :</span>
                                            </td>
                                            <td style="text-align:right;">
                                                <span id="tmp_due_date"><?php echo $row['due_date']; ?></span>
                                            </td>
                                        </tr>

                                     </tbody>
                                  </table>
                             </td>
                             </tr>
                         </tbody></table>
                        
                       
                        
                        <table cellpadding="0" cellspacing="0" border="0" class="pcs-itemtable" style="width:100%;margin-top:20px;table-layout:fixed;">
                            <thead>
                                <tr style="height:32px;border-bottom:solid 2px #3c3d3a"  >
                                    <td class="pcs-itemtable-header " style="padding:5px 0 5px 5px;text-align: center;word-wrap: break-word;width: 5%;">
                                      #
                                    </td>
                                          <td class="pcs-itemtable-header pcs-itemtable-description" style="padding:5px 10px 5px 20px;word-wrap: break-word;">
                                         Item &amp; Description
                                    </td>
                                    <td class="pcs-itemtable-header" style="padding:5px 10px 5px 5px;word-wrap: break-word;width: 11%;" align="right">
                                      Qty
                                    </td>
                                    <td class="pcs-itemtable-header" style="padding:5px 10px 5px 5px;word-wrap: break-word;width: 11%;" align="right">
                                         Rate
                                    </td>
                                    <td class="pcs-itemtable-header" style="padding:5px 10px 5px 5px;word-wrap: break-word;width: 11%;" align="right">
                                         Tax
                                    </td>
                                    
                                    <td class="pcs-itemtable-header" style="padding:5px 10px 5px 5px;word-wrap: break-word;width:120px;" align="right">
                                          Amount
                                    </td>
                                </tr>
                             </thead>
                             <tbody class="itemBody">
                                   <?php 
                                        
                                    $sq = "SELECT * FROM particulars WHERE `invoice_id`='".clean($row['invoice_no'])."'";
                                    $result_sq = mysql_query($sq) or die(mysql_error());
                                    $i = 1;
                                    $price = 0;
                                    $sum = 0;
                                    while($row_sq = mysql_fetch_assoc($result_sq))
                                    {
                                        if($row_sq['qty']==0)
                                        {
                                            continue;
                                        }
                                        $price = $row_sq['price']+($row_sq['price']*($row_sq['tax']/100));
                                        echo ' <tr>
                                        <td class="pcs-item-row" style="padding: 10px 0 10px 5px;text-align: center;word-wrap: break-word;" valign="top">'.$i.'</td>
                                        <td class="pcs-item-row" style="padding: 10px 0px 10px 20px;" valign="top"><div><div><span id="tmp_item_description" class="pcs-item-desc" style="white-space: pre-wrap;word-wrap: break-word;">'.$row_sq['product'].'</span></div></div></td>
                                            <td class="pcs-item-row" style="padding: 10px 10px 5px 10px;text-align:right;word-wrap: break-word;" valign="top"><span id="tmp_item_qty">'.$row_sq['qty'].'</span> </td>
                                        <td class="pcs-item-row" style="padding: 10px 10px 5px 10px;text-align:right;word-wrap: break-word;" valign="top">
                                              <span id="tmp_item_rate">'.$row_sq['price'].'</span>
                                        </td>
                                        <td class="pcs-item-row" style="padding: 10px 10px 5px 10px;text-align:right;word-wrap: break-word;" valign="top">
                                              <span id="tmp_item_rate">'.$row_sq['tax'].'</span>
                                        </td>
                                        <td class="pcs-item-row" style="text-align:right;padding: 10px 10px 10px 5px;word-wrap: break-word;" valign="top">
                                          <span id="tmp_item_amount">'.$price.'</span>
                                        </td>
                                      </tr>';
                                        $i++;
                                        $sum+=$price;
                                    }
                                    ?>
                                    
                            </tbody>
                            </table>
                        
                        <div style="width: 100%;margin-top: 1px;">
                            <div style="width: 45%;padding: 10px 10px 3px 3px;font-size: 9pt;float: left;">
                            <div style="white-space: pre-wrap;"></div>
                            </div>
                            <div style="width: 50%;float:right;">
                              <table width="100%" border="0" cellspacing="0" class="pcs-totals">
                                <tbody>
                                  <tr>
                                        <td style="padding: 5px 10px 5px 0;" align="right" valign="middle">Sub Total <br><span style="color:#666;font-size:10px;">(Tax Inclusive)</span></td>
                                        <td style="width:120px;padding: 0px 10px 16px 5px;" align="right" valign="middle" id="tmp_subtotal"><?php echo number_format($sum, 2); ?></td>
                                  </tr>

                                  <tr style="height:10px;">
                                    <td style="padding: 5px 10px 5px 0;" align="right" valign="middle">Discount Offred </td>
                                    <td style="width:120px;padding: 10px 10px 10px 5px;" align="right" valign="middle"><?php echo number_format($row['discount'], 2); ?></td>
                                  </tr>





                                  <tr>
                                    <td style="padding: 5px 10px 5px 0;" align="right" valign="middle"><b>Total</b></td>
                                    <td style="width:120px;padding: 10px 10px 10px 5px;" align="right" valign="middle" id="tmp_total"><b>Rs.<?php echo number_format($sum-$row['discount'], 2); ?></b></td>               </tr>


                                 <!-- <tr style="height:10px;">
                                    <td style="padding: 5px 10px 5px 0;" align="right" valign="middle">Payment Made</td>
                                    <td style="color: red;width:120px;padding: 10px 10px 10px 5px;" align="right" valign="middle">(-) 1,000.00</td>
                                  </tr>-->

                                  <tr class="pcs-balance" style="height:40px;">
                                    <td style="padding:5px 10px 5px 0;" valign="middle" align="right"><b>Balance Due</b></td>
                                    <td style="width:120px;padding: 10px 10px 10px 5px;" valign="middle" align="right" id="tmp_balance_due"><b>Rs.<?php echo number_format($sum-$row['discount'], 2); ?></b></td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                            <div style="clear: both;"></div>
                          </div>
                        
                        <div style="clear:both;margin-top:50px;width:100%;">
                          <label class="pcs-label" id="tmp_notes_label" style="font-size: 10pt;">Remarks</label>
                          <p class="pcs-notes" style="margin-top:7px;white-space: pre-wrap;word-wrap: break-word;"><?php echo $row['customer_notes']; ?></p>
                        </div>
                        
                        <div style="clear:both;margin-top:30px;width:100%;">
                            <label class="pcs-label" id="tmp_terms_label" style="font-size: 10pt;">Terms &amp; Conditions</label><br>
                            <ol>
                                <li>50% advance payment</li>
                                <li>50% before delivery of project</li>
                            </ol>
                          </div>
                        
                    </div>
                    <br/>
                   
                    <a target="_blank" href="print_invoice.php?id=<?php echo $row['id']; ?>&cust_id=<?php echo $datas['customer_id']; ?>"><button type="button" onclick class="btn  btn-success pull-right"><i class="fa fa-credit-card"></i> Print Invoice
          </button></a>&nbsp;<br/><br/>
                    <br/>
                </div> 

                <div class="col-md-5">
                  <!-- Some Data Here-->
                </div>
            </div>
        </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

      
          <!-- /.box -->

      <!-- /.row -->

    </section>
      
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include 'footer.php'; ?>
    <?php include 'control_sidebar.php';  ?> <!-- /.control-sidebar -->
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
    
 
   
    function ajax(id)
    {
        var sum = 0;
       var rate = $(".rate"+id).val();
       var qty = $(".qty"+id).val(); 
       var tax = $(".tax"+id).val(); 
        
        var price = rate*qty;
        var tax_var = price*.01*tax;
        var total = price+tax_var;
        $(".amount"+id).val(total);
        
        var totalsss = 0;
        $('.amounts').each(function(){
            totalsss += parseFloat(this.value);
        });
        
        $("#totals").html(totalsss);
        
        var fd =  $("#disc").val();
         var sum = $("#totals").html();
          var kane = (fd);
          $("#fdc").html(kane);
        var total = parseFloat(sum)-parseFloat(kane);
          $("#troll").html(total);
    }
    
    
    $(document).ready(function(){
        $('body').on('click', '.mat', function (){
           var count = $(this).data("count");
            $('*[data-row="'+count+'"]').hide("fast");
        });      
    });
    
  $(function(){
      $("#disc").change(function(){
         var fd =  $(this).val();
         var sum = $("#totals").html();
          var kane = (fd);
          $("#fdc").html(kane);
        var total = parseFloat(sum)-parseFloat(kane);
          $("#troll").html(total);
      });
      
      $("#bgy").click(function(){
          var counter = $("#counters").val();
          var data = '<div class="row" data-row="'+counter+'"><div class="col-md-3"><div class="form-group"><textarea class="form-control item'+counter+'" data-id="'+counter+'" name="item_desc[]" placeholder="Item Description"></textarea></div></div><div class="col-md-2"><div class="form-group"><input type="text" name="qty[]" class="form-control qty'+counter+' pat" onchange="ajax('+counter+')" data-id="'+counter+'" value="1" placeholder="Qty" /></div></div><div class="col-md-2"><div class="form-group"><input type="text" name="rate[]" onchange="ajax('+counter+')"  class="form-control rate'+counter+' pat" data-id="'+counter+'" value="0.00" placeholder="Rate" /></div></div><div class="col-md-1"><div class="form-group"><input type="text" name="tax[]" class="form-control tax'+counter+'  pat" onchange="ajax('+counter+')" data-id="'+counter+'" value="0" placeholder="Tax" /> </div></div><div class="col-md-3"><div class="form-group"><input type="text" name="amount[]" data-id="'+counter+'" value="0.00" readonly class="form-control amounts amount'+counter+'" placeholder="Amount" /> </div></div><div class="col-md-1"><div class="form-group"><button type="button" data-count="'+counter+'" class="btn btn-social-icon btn-sm btn-google mat"><i class="fa fa-close "></i></button></div></div></div>';
          $("#poi").append(data);
          counter++;      
          $("#counters").val(counter);
         
      });
      
      
        
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
