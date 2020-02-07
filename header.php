<div style="text-align:center;background-color:#fff" class="mob">
    
        <a href="index.php"><img style="float:left;width:180px;padding:10px;" src="img/divine_logo.jpg"></a>
        <div style="width:30px;height:87px;background-color:#0776c6;float:right;cursor:pointer;" id="men">
            <div style="padding:14px;"></div>
            <div style="padding:2px;margin:5px;background-color:#fff;"></div>
            <div style="padding:2px;margin:5px;background-color:#fff;"></div>
            <div style="padding:2px;margin:5px;background-color:#fff;"></div>
        </div>
        <div class="clear"></div>
    </div>
<div style="padding: 20px; background-color: rgb(34, 34, 34); text-align: center;display:none" id="ten">
	<a href="index.php" class="mob_menus">HOME </a>
        <a href="about_us.php" class="mob_menus">ABOUT US</a>
         <a href="contact.php" class="mob_menus">CONTACT</a>
         <a href="career.php" class="mob_menus">CAREER</a>
         <a href="clientele.php" class="mob_menus">CLIENTELE</a>
         <a href="testimonials.php" class="mob_menus">TESTIMONIALS</a>
         <a href="services.php" class="mob_menus">SERVICES</a>
         <a href="product.php" class="mob_menus">PRODUCTS</a>
        
    </div>


<div class="header desks" style="background-color:#fff">
         <div class="container">
            <div class="row">
               <div class="col-sm-4">
                    <a href="index.php" >
                    <img src="img/divine_logo.jpg" style="width:250px" />
                   </a>
                </div>
                
                <div class="col-sm-8">
                    <a href="divine.pdf" target="_blank"><div class="large_bt" id="fee1">Download Company Profile </div></a>
                    <div style="float:right;padding:10px;margin-right:10px;">
                        <div style="float:left;margin-right:10px;">
                            <img src="img/message.svg" style="width:37px" />
                        </div>
                        <div style="float:left;font-size:11px;">
                           <div style="padding:2px;"></div>
                           <div style="font-weight:bold">Contact Email  :</div>
                           <div>support@divineengineering.net</div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    
                    <div style="float:right;padding:10px;margin-right:10px;">
                        <div style="float:left;margin-right:10px;">
                            <img src="img/smartphone.svg" style="width:37px" />
                        </div>
                        <div style="float:left;font-size:11px;">
                           <div style="padding:2px;"></div>
                           <div style="font-weight:bold">Contact Number  :</div>
                           <div> 0771-4900515</div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    
                    <div class="clear"></div>
                    <div style="border-bottom:solid 1px #ddd;"></div>
                        
                    <div class="menu" style="position:relative">                        
                        <a href="contact.php"><div class="ft">CONTACT US</div></a>
                        <a href="about_us.php"> <div class="ft">ABOUT US</div></a>
                        <div class="ft">
                            SERVICES
                            <div  class="yu">
                                <div class="row" style="margin:0px;">
                                    <div class="col-sm-6">
                                       
                                        <div style="padding:20px;">
                                            <?php
                                                $rf = "SELECT * FROM news ORDER By date DESC LIMIT 1";
                                                $result_rf = mysql_query($rf) or die(mysql_error());
                                                while($row_rf = mysql_fetch_array($result_rf))
                                                {
                                                    echo '<div>
                                                        <img src="img/offer.jpg" style="width:100%" />
                                                        <div style="padding:10px;"></div>
                                                    </div>';
                                                }
                                            ?>  
                                        
                                        <hr/>
                                            
                                         </div>
                                    </div>
                                    
                                    <div class="col-sm-6" style="background-color:#eee;height:100%">
                                       <div style="padding:20px;">
                                          <?php
                                               $ds = "SELECT `id`,`title` FROM `service` ";
                                                $result_ds = mysql_query($ds) or die(mysql_error());
                                                $i=0;
                                                while($row_ds = mysql_fetch_array($result_ds))
                                                {
                                                    echo '<a href="services.php?id='.$row_ds['id'].'" class="genda">'.$row_ds['title'].'</a>';
                                                    $i++;
                                                }
                                            ?>  
                                          <!--<a href="#" class="genda">Total Station and Autolevel Caliberation</a>
                                          <a href="#" class="genda">Repairing Power tools and measuring tools</a>
                                          <a href="#" class="genda">Calibration of all kind of civil engineering Equipment</a>
                                          <a href="#" class="genda">Repair & Service of wacker Neuson</a>
                                          <a href="#" class="genda">Repair & Service of Potain tower Crane</a>
                                          <a href="#" class="genda">Repair & Service of Survey  Accessories</a>
                                          <a href="#" class="genda">Renting of Potain Tower Crane</a>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="ft">
                            PRODUCTS
                            <div  class="yu">
                                <div style="padding:40px;">
                                  <div class="row" style="margin:0px;">
                                    <div class="col-sm-6">
                                         <?php
                                            $ds = "SELECT `id`,`category` FROM `category`";
                                            $result_ds = mysql_query($ds) or die(mysql_error());
                                            $i=0;
                                            $num = mysql_num_rows($result_ds);
                                            $nibmu = intval($num/2);
                                            while($row_ds = mysql_fetch_array($result_ds))
                                            {
                                                echo '<a href="category.php?category_title='.base64_encode($row_ds['category']).'&category_id='.base64_encode($row_ds['id']).'" class="genda" style;margin-left:40px;>'.$row_ds['category'].'</a>';
                                                if($i>8)
                                                {
                                                    echo '</div><div class="col-sm-6" style="background-color:#eee;height:100%">';
                                                }                                                  
                                                $i++;
                                            }
                                           ?>  
                                        
                                          
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        
                       <a href="index.php"> <div class="ft">HOME</div></a>
                        
                    </div>
                </div>
            </div>
         </div>
      </div>