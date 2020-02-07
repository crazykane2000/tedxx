<div style="background-color:#111">
          <br>
         <div class="container">
             <div class="row">
                <div class="col-sm-2">
                    <div style="padding:10px;">
                        <b style="color:#1da0ff;opacity:.8;font-family:'Open Sans';font-size:16px;">IMPORTANT LINKS</b>
                        <br><br> 
                        <div style="font-size:13px;font-family:arial;color:#666">
                                    <a href="index.php" class="footer_link">Homepage</a>
                                    <a href="about_us.php" class="footer_link">About Us</a>
                                    <a href="contact.php" class="footer_link">Contact Us</a>
                                    <a href="career.php" class="footer_link">Career</a>
                                    <a href="clintele.php" class="footer_link">Our Clientele</a>
                                    <a href="testimonials.php" class="footer_link">Testimonials</a>
                                   
                                  
                            <hr>
                           <span style="color:#333"> Website designed and proudly hosted by <a href="http://catpops.in" style="color:#555">Catpops Technobiz</a></span>                            
                        </div>
                       
                    </div>
                 </div>  
                 
                  <div class="col-sm-3">
                    <div style="padding:10px;">
                        <b style="color:#1da0ff;opacity:.8;font-family:'Open Sans';font-size:16px;">Products</b>
                        <br><br> 
                        <div style="font-size:13px;font-family:arial;color:#666">
                            <?php
                                $dz = "SELECT `menu_name`, `id` FROM page1 WHERE category='Services'";
                                $result_dz = mysql_query($dz) or die(mysql_error());
                                while($row_dz = mysql_fetch_array($result_dz))
                                {
                                    echo '<a href="#" class="footer_link">Menu Name Here</a>';
                                }
                            ?>
                            <a href="category.php?category_title=U3VydmV5IEVxdWlwbWVudHM=&category_id=Mg==" class="footer_link">Survey Equipments</a>
                            <a href="category.php?category_title=TGFiIEVxdWlwbWVudHM=&category_id=MzU=" class="footer_link">Lab Equipments</a>
                            <a href="category.php?category_title=R1BT&category_id=NDE=" class="footer_link">HAND GPS Equipments</a>
                            <a href="category.php?category_title=U2FmZXR5IEl0ZW0=&category_id=MzQ=" class="footer_link">Safety Equipments</a>
                            <a href="category.php?category_title=Qm9zY2ggVG9vbHM=&category_id=NDA=" class="footer_link">Power Tools Equipments</a>
                            <a href="category.php?category_title=Qm9zY2ggVG9vbHM=&category_id=NDA=" class="footer_link">Bosch Tools</a>
                            <a href="category.php?category_title=Q29uY3JldGUgVGVjaG5vbG9neQ==&category_id=NDI=" class="footer_link">Concrete Technology</a>
                            <a href="category.php?category_title=VmlicmF0b3J5IFBsYXRlcw==&category_id=NDQ=" class="footer_link">Vibratory Plates</a>
                            <a href="category.php?category_title=UmVpbmZvcmNlbWVudCBlcXVpcG1lbnRz&category_id=NDU=" class="footer_link">Reinforcement equipments</a>
                            <a href="category.php?category_title=VmlicmF0b3J5IFJvbGxlcnM=&category_id=NDY=" class="footer_link">Vibratory Rollers</a>
                        </div>
                       
                    </div>
                 </div>  
                  <div class="col-sm-3">
                    <div style="padding:10px;">
                        <b style="color:#1da0ff;opacity:.8;font-family:'Open Sans',arial;font-size:16px;">Services</b>
                        <br><br> 
                        <div style="font-size:13px;font-family:arial;color:#666">
                             <?php
                                $dz = "SELECT `title`, `id` FROM service";
                                $result_dz = mysql_query($dz) or die(mysql_error());
                                while($row_dz = mysql_fetch_array($result_dz))
                                {
                                    echo '<a href="services.php?id='.$row_dz['id'].'" class="footer_link">'.$row_dz['title'].'</a>';
                                }
                            ?>   
                           <!-- <a href="category.php?category_title=UmFtbWVy&category_id=NDc=" class="footer_link">Rammer</a>
                            <a href="category.php?category_title=QnJlYWtlcnM=&category_id=NDg=" class="footer_link">Breakers</a>
                            <a href="category.php?category_title=Rmxvb3IgU2F3&category_id=NDk=" class="footer_link">Floor Saw</a>
                            <a href="category.php?category_title=UHVtcHM=&category_id=NTA=" class="footer_link">Pumps</a>
                            <a href="category.php?category_title=TGlnaHQgVG93ZXJzIA==&category_id=NTE=" class="footer_link">Light Towers</a>
                            <a href="category.php?category_title=RmlzY2hlciBQcm9kdWN0cw==&category_id=NTM=" class="footer_link">Fischer Products</a>
                            <a href="category.php?category_title=U3VydmV5IEFjY2Vzc29yaWVz&category_id=NTQ=" class="footer_link">Survey Accessories</a>
                            <a href="#" class="footer_link">Tower Cranes</a>
                            <a href="#" class="footer_link">Service &amp; Caliberation</a>
                            <a href="#" class="footer_link">Lab Equipments</a>
                            <a href="#" class="footer_link">Measuring Tools</a>-->
                        </div>
                       
                    </div>
                 </div> 
                 
                     
                
                 
                 <div class="col-sm-4">
                    <div style="padding:10px;font-size:13px;font-family:arial;color:#999">
                        <a target="_blank" href="https://www.facebook.com/Divine-Engineering-230766004101453/?ref=br_rs">
                            <img a src="img/fb.png" style="width:30px;"></a>
                        <a target="_blank" href="https://twitter.com/DivineEngineer1">
                            <img  src="img/Tw.png" style="width:30px;"></a>
                        <a target="_blank" href="http://divineengineerings.in/">
                            <img  src="img/div_log.jpg" style="width:60px;"></a>
                     </div>
                     
                     <hr>
                    <b style="color:#1da0ff;opacity:.8;font-family:'Open Sans';font-size:16px;">Email Us</b>
                        <br>
                         <div style="font-size:13px;font-family:arial;color:#888">For any business or service related query please feel free to contact us via given email address or phone number.</div>
                        <br>
                       <form action="subscribe_handle.php" method="Post" >
                         <input type="email" name="email" placeholder="Enter Email Address" style="color:#fff;  padding:7px;background-color:#1e2c3e;border:0">
                        <input type="submit" style="padding:7px;background-color:#1da0ff;color:#fff;border:0px">
                     </form>
                     <b style="color:#1da0ff;opacity:.8;font-family:'Open Sans';font-size:16px;">Address</b>
                        <br> 
                         <div style="font-size:13px;font-family:arial;color:#888">Divine Engineering 315, 3rd Floor, Lalganga Midas, Faafadih Chowk, Raipur - 492001 India</div>
                        <br>
                     <b style="color:#1da0ff;opacity:.8;font-family:'Open Sans';font-size:16px;">Contact No.</b>
                        <br>
                         <div style="font-size:13px;font-family:arial;color:#888">0771-4900515</div>
                        <br>
                 </div>   
             </div>   
         </div>
          <br>
            <div class="container" style="border-top:dotted 1px #777;padding-top:10px;">
            <a href="inde.php" style="color:#888">Home</a> / 
                <a href="about_us.php" style="color:#888">   Company</a> / 
                <a href="services.php" style="color:#888">Services </a>/ 
                <a href="training.php" style="color:#888">Training</a> / 
                <a href="verification.php" style="color:#888"> Verification</a>
                
                Copyright © Divine Engineering, Privacy Statement Terms and Conditions.
          </div>
          <br>
      </div>
    