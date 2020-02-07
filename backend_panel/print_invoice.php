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
<body class="hold-transition skin-blue sidebar-mini" onload="window.print();" >
                    <?php
                        $sql = "SELECT * FROM invoice WHERE id=".clean($_REQUEST['id']);
                        $result = mysql_query($sql) or die(mysql_error());
                        $row = mysql_fetch_assoc($result);
                        $logo = "img/Invoicelogo_Capture.JPG";
                        
                        if($row['firm_name']=="Priyanka Enterprises")
                        {
                           $logo="img/priyanka_logo.jpg"; 
                        }
                    ?>
    
                        <?php
                         $sx = "SELECT * FROM tx_timeline_clients WHERE `client_id`='".$row['customer_id']."'";
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
                             $credit_sum+=$credit;
                             $debit_sum+=$debit;
                         }
                        $balance = $credit_sum-$debit_sum;
                        ?>
                                                    
                                              
   <div style="padding:40px;box-shadow:0px 0px 10px #ccc;position:relative" id="makli">
                        <div style="padding:30px;" class="gh"></div>
                       <div id="ember1794" disabled="false" class="gh ribbon ember-view popovercontainer" data-original-title="" title="">  
                           <div class="ribbon-inner ribbon-success">
                            Paid
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
                                     <span style="font-size:8pt;"><b>Balance Due</b></span><br>
                                     <span style="font-size:15pt;"><b>₹<?php echo number_format((float)$balance,2);  ?></b></span>
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
<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>

</body>
</html>
