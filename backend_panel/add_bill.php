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
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
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
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

 <?php include 'header.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
 <?php include 'sidebar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
          <h1  style="font-family:georgia">
          Add Invoice
            <small></small>
          </h1>

        </section>

    <!-- Main content -->
   <form method="POST" action="incoice_handle.php">
         <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
            <br/>
          <h3 class="box-title">Billing Details</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            
        
        <div class="row">
            <div class="col-md-5" style="background-color:#ddd">
                <div style="padding:10px;">
                  <div class="form-group">
                    <label>Billing Through</label>
                    <select class="form-control select2" name="firm_name" style="width: 100%;">
                        <option >Catpops Technobiz</option>
                       <option >Priyanka Enterprises</option>
                    </select>   
                  </div>
                </div>
              
            </div> 
            
            <div class="col-md-5">
              <div class="form-group">
                <label>Customer Name</label>
                <select class="form-control select2" name="cust_name" style="width: 100%;">
                    <option selected value="">Please Enter Customer</option>
                  <?php
                         $sql = "SELECT * FROM `master_people` WHERE type='Customer' ORDER BY `type` DESC";    
                        $result = mysql_query($sql) or die(mysql_error());
                        while($row = mysql_fetch_array($result))
                        {
                           echo '<option value="'.$row['id'].'|'.$row['name'].'">'.$row['business_name'].'</option>'; 
                        }
                    ?>
                </select>
              </div>
              
            </div>
        </div>
            
            <br/>
            <div class="row">
               
              
              <div class="col-md-3">
                  <div class="form-group">
                    <label>Bill Date</label>
                     <input type="text" name="date" class="form-control" value="<?php echo date("m/d/Y"); ?>"  placeholder="Billing Date" id="datepicker">
                  </div>
              </div>
                
                 <div class="col-md-3">
                  <div class="form-group">
                    <label>Due Date</label>
                    <input type="text" name="due_date"  class="form-control pull-right" id="datepicker1">
                  </div>
                </div>  
                
              
            </div>
            <br/>
            <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                      
                      <?php
                        $data = "CP";
                        $year = date("Y");
                        $month = date("m");
                        $saz = "SELECT max(id) FROM invoice";
                        $result_saz = mysql_query($saz) or die(mysql_error());
                        $row_saz = mysql_fetch_assoc($result_saz);
                        $value = $row_saz['max(id)']+1;
                        $invoice = $data.$year.$month.str_pad($value, 5, '0', STR_PAD_LEFT);                        
                      ?>
                    <label>Invoice No.</label>
                     <input type="text" name="invoice_no" class="form-control" value="<?php echo $invoice; ?>"  placeholder="Invoice Number">
                  </div>
                  <!-- /.form-group -->
                    <input type="hidden" name="id" value="<?php echo $value = $row_saz['max(id)']+1;  ?>" />
                </div>
              
              <div class="col-md-2">
                  <div class="form-group">
                    <label>Order No.</label>
                     <input type="text" name="order_no" class="form-control"  placeholder="Order No. Number">
                  </div>
              </div>
                
                
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Payment Terms</label>
                    <input type="text" name="payment_terms" class="form-control pull-right" placeholder="Payment Terms" >
                  </div>
                </div>
            </div>
            <br/>
            <div class="row">
                 <div class="col-md-3">
                  <div class="form-group">
                    <label>Sales Person</label>
                    <select name="sales_person" class="form-control">
                      <option>Kishan Sharma</option>
                      <option>Priyanka Modi</option>
                      <option>Arpita Birla</option>
                   </select>
                  </div>
                </div>
                
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Items Rate are</label>
                    <select name="item_rates" class="form-control">
                      <option>Tax Inclusive</option>
                      <option>Tax Exclusive</option>                      
                   </select>
                  </div>
                </div>
                              
           </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
       
      </div>
      <!-- /.box -->
     <input type="hidden" id="counters" name="counters" value="1" />
      <div class="row">
        <div class="col-md-12">

          <div class="box box-danger">
            <div class="box-header">
                <br/>
              <h3 class="box-title">Invoice Descriptions</h3>
            </div>
                            
            <div class="box-body">
                <div class="row" style="background-color:#605ca8;color:#fff">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label style="padding-top:5px;">Item Description</label>
                        </div>
                    </div>
                    
                     <div class="col-md-2">
                        <div class="form-group">
                            <label style="padding-top:5px;">Item Qty</label>
                        </div>
                    </div>
                    
                    <div class="col-md-2">
                        <div class="form-group">
                            <label style="padding-top:5px;">Price/Rate</label>
                        </div>
                    </div>
                    
                     <div class="col-md-1">
                        <div class="form-group">
                            <label style="padding-top:5px;">Tax</label>
                        </div>
                    </div>
                    
                     <div class="col-md-3">
                        <div class="form-group" style="text-align:left">
                            <label style="padding-top:5px;">Total Amount</label>
                        </div>
                    </div>
                </div>
                <br/>
                <div id="oi">
                     <div class="row">
                         <div class="col-md-3">
                          <div class="form-group">
                            <textarea class="form-control item0" data-id="0" name="item_desc[]" placeholder="Item Description"></textarea>
                          </div>
                        </div>

                          <div class="col-md-2">
                          <div class="form-group">
                            <input type="text" name="qty[]" onchange="ajax(0)" value="1" data-id="0" class="qtyl form-control qty0 pat" placeholder="Qty" />
                          </div>
                        </div>

                        <div class="col-md-2">
                          <div class="form-group">
                            <input type="text" name="rate[]" onchange="ajax(0)" value="0.00" data-id="0" class="form-control rate0 pat" placeholder="Rate" />
                          </div>
                        </div>

                          <div class="col-md-1">
                          <div class="form-group">
                            <input type="text" name="tax[]" onchange="ajax(0)" value="0" data-id="0" class="form-control tax0 pat" placeholder="Tax" />
                          </div>
                        </div>

                           <div class="col-md-3">
                          <div class="form-group">
                            <input type="text" name="amount[]"  data-id="0" value="0.00" readonly class="form-control amount0 amounts" placeholder="Amount" />
                          </div>
                        </div>     
                         
                           
                   </div>
                </div>
                <div id="poi">
                
                </div>
                <div class="row">
                     <div class="col-md-6">
                      <div class="form-group">
                        <button type="button" class="btn btn-success" id="bgy">+ Add another line </button>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <table style="width:100%">
                            <tr>
                                <td style="padding:10px;border-bottom:solid 1px #ccc">
                                    <b>Sub Total</b>
                                    <br/>Tax Inclusive
                                </td>
                                
                                 <td style="padding:10px;border-bottom:solid 1px #ccc">
                                   
                                </td>
                                
                                 <td style="padding:10px;border-bottom:solid 1px #ccc">
                                    <b>Rs. <span id="totals">0.00</span></b>
                                    
                                </td>
                            </tr>
                            
                            <tr>
                                <td style="padding:10px;border-bottom:solid 1px #ccc">
                                    <b>Discount</b>
                                    <br/>Tax (Flat)
                                </td>
                                
                                 <td style="padding:10px;border-bottom:solid 1px #ccc">
                                   <input type="text" name="discount" value="0" id="disc" class="form-control" placeholder="Discount flat Price" />
                                </td>
                                
                                 <td style="padding:10px;border-bottom:solid 1px #ccc">
                                    <b>Rs. <span id="fdc">0.00</span></b>
                                    
                                </td>
                            </tr>
                            
                            <tr style="background-color:#eee">
                                <td style="padding:10px;border-bottom:solid 1px #ccc">
                                    <b>Total</b>
                                    <br/>Grand Toral in Rs.
                                </td>
                                
                                 <td style="padding:10px;border-bottom:solid 1px #ccc">
                                  
                                </td>
                                
                                 <td style="padding:10px;border-bottom:solid 1px #ccc">
                                    <b>Rs. <span id="troll">0.00</span></b>
                                    
                                </td>
                            </tr>
                          </table>
                      </div>
                    </div>
                </div>
                
                
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

      
          <!-- /.box -->

        </div>
        <!-- /.col (left) -->
  
        <!-- /.col (right) -->
      </div>
      <!-- /.row -->
   <div class="row">
        <div class="col-md-12">

          <div class="box box-success">
            <div class="box-header">
                <br/>
              <h3 class="box-title">Remarks</h3>
            </div>
                          
            <div class="box-body">
                 <div class="row">
                     <div class="col-md-4">
                      <div class="form-group">
                        <b>Account Details</b>
                          <br/>
                            <b>Account No.</b> - 1470050002929<br/>
                            <b>Account Name</b>- Catpops Technobiz<br/>
                            <b>IFSC Code </b>-  UTBI0RSA660<br/>
                           <b> Bank Name</b> - United of Bank of India
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Customer Notes</label>
                          <textarea name="customer_notes"  class="form-control pull-right" id="datepicker"></textarea>
                      </div>
                        <br style="clear:both" /><br style="clear:both" />
                        
                        <div class="form-group">
                            
                        <label>Additional Terms and Conditions</label>
                          <textarea name="terms_and_conditions" class="form-control pull-right" id="datepicker"></textarea>
                      </div>
                    </div>
                </div>
                
                 <div class="row">
                     <div class="box-body">
                         <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-lg" value="Save Invoice" />
                         </div>
                     </div>
                </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

      
          <!-- /.box -->

        </div>
        <!-- /.col (left) -->
  
        <!-- /.col (right) -->
      </div>
    </section>
      </form>
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
            $('*[data-row="'+count+'"]').hide("fast", function(){
                var amount_deleted = $(".amount"+count).val();
                this.remove();                
                var sub_total = $("#totals").html();
                var grand_total = $("#troll").html();                
                $("#totals").html(sub_total-amount_deleted);
                $("#troll").html(grand_total-amount_deleted);
            });
        });      
    });
    
   /* $(document).ready(function(){
        $('body').on('click', '.mat', function (){
           var count = $(this).data("count");
            $('*[data-row="'+count+'"]').hide("fast", function(){
                this.remove();
                var sum = 0;
                $('.qtyl').each(function(){
                    sum += parseFloat(this.value);
                });               
                alert(sum);
            });
        });      
    });*/
    
    
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
          var data = '<div class="row" data-row="'+counter+'"><div class="col-md-3"><div class="form-group"><textarea class="form-control item'+counter+'" data-id="'+counter+'" name="item_desc[]" placeholder="Item Description"></textarea></div></div><div class="col-md-2"><div class="form-group"><input type="text" name="qty[]" class="qtyl form-control qty'+counter+' pat" onchange="ajax('+counter+')" data-id="'+counter+'" value="1" placeholder="Qty" /></div></div><div class="col-md-2"><div class="form-group"><input type="text" name="rate[]" onchange="ajax('+counter+')"  class="form-control rate'+counter+' pat" data-id="'+counter+'" value="0.00" placeholder="Rate" /></div></div><div class="col-md-1"><div class="form-group"><input type="text" name="tax[]" class="form-control tax'+counter+'  pat" onchange="ajax('+counter+')" data-id="'+counter+'" value="0" placeholder="Tax" /> </div></div><div class="col-md-3"><div class="form-group"><input type="text" name="amount[]" data-id="'+counter+'" value="0.00" readonly class="form-control amounts amount'+counter+'" placeholder="Amount" /> </div></div><div class="col-md-1"><div class="form-group"><button type="button" data-count="'+counter+'" class="btn btn-social-icon btn-sm btn-google mat"><i class="fa fa-close "></i></button></div></div></div>';
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
