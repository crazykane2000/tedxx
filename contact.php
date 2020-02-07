<html lang="en">
    <?php include 'includes.php'; ?>
  <head>
    <title>Contact : <?php include 'title.php'; ?></title>
    <?php include 'head.php'; ?>
  </head>
  <body style="background-color:#eee">
    
    <?php include 'header.php'; ?>   
    
  <div style="background-image:url('img/slide_strip_Divine.jpg');padding:10px">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <h1 class="headsl" style="color:#fff;font-size:30px;">Lets Talk  </h1>
                <p style="color:#fff">Contact Us for any information about any of our Services
                </p>
            </div>
        </div>
    </div>
  </div>
      <div style="padding:20px;"></div>
      
      <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div style="padding:10px;">
                    <h2 class="headsl2" style="font-size:20px;font-weight:bold">CONTACT US</h2>
                    <div style="margin:5px 0px;border-bottom:solid 1px #ccc"></div>
                    <br>
                    
                  <div class="contact-detail">
                                <ul style="list-style:none" class="bolder">
                                    <li>
                                        <strong class="bold">Director:</strong>
                                        <p>Shashank Shekhar Agarwal</br>E-mail Address:</br> shashank@divineengineering.net</p>
                                        <span class="bl"><a style="color:#005a9c" href="tel:+91-7770-855-500">+91-7770-855-500 </a></span>
                                    </li>
                                    <li>
                                        <strong class="bold">General Enquiry:</strong>
                                        <p>Khushbu Dawani</br>E-mail Address:</br> support@divineengineering.net</p>
                                        <span class="bl"><a style="color:#005a9c" href="tel:+91-7024-225-227">+91-7024-225-227 </a></span>
                                    </li>
                                    <li>
                                        <strong class="bold">Sales</strong>
                                        <p>Ajit Ray</br>E-mail Address:</br> support@divineengineering.net</p>
                                        <span class="bl"><a style="color:#005a9c" href="tel:+91-7024-225-225">+91-7024-225-225 </a></span>
                                    </li>
                                    <li>
                                        <strong class="bold">Service:</strong>
                                        <p>Shoiab Khan</br>E-mail Address:</br> service@divineengineering.net</p>
                                        <span class="bl"><a style="color:#005a9c" href="tel:+91-7024-225-223">+91-7024-225-223 </a></span>
                                    </li>
                                    <li>
                                        <strong class="bold">Survey:</strong>
                                        <p>Amitava Chakraborty</br>E-mail Address:</br> support@divineengineering.net</p>
                                        <span class="bl"><a style="color:#005a9c" href="tel:+91-7024-225-226">+91-7024-225-226</a></span>
                                    </li>
                                    <li>
                                        <strong class="bold">Admin:</strong>
                                        <p>Kishan Patel</br>E-mail Address:</br> admin@divineengineering.net</p>
                                        <span class="bl"><a style="color:#005a9c" href="tel:+91-7400-748-000">+91-7400-748-000 </a></span>
                                    </li>
                                    <li>
                                        <strong class="bold">Accounts:</strong>
                                        <p>Badal Saket</br>E-mail Address:</br> accounts@divineengineering.net</p>
                                        <span class="bl"><a style="color:#005a9c" href="tel:+91-9685-808-383">+91-9685-808-383 </a></span>
                                    </li>
                                    
                                    <li>
                                        <strong class="bold"> Support Mail  :</strong>
                                        <span class="bl"><a style="color:#005a9c" href="mailto:support@divineengineering.net">support@divineengineering.net </a></span>
                                    </li>
                                    <li class="meetus">
                                        <strong class="bold">Meet Us:</strong>
                                        <span>Divine Engineering 315, 3rd Floor, Lalganga Midas, Faafadih Chowk, Raipur - 492001</span>
                                        <span> India</span>
                                    </li>
                                </ul>
                               
                                <div class="content-box">
                                    <p>Need technical assistance? Speak with a support representative by calling <a href="tel:+91 7400723999" style="color:#005a9c">+91-7024225227</a></p>
                                    <p>For employment details &amp; current openings, contact us at: <a href="mailto:support@divineengineering.net" style="color:#005a9c">support@divineengineering.net</a></p>
                                    
                                    <p>For Physical Address Visit <a style="color:#005a9c" href="https://www.google.co.in/maps/place/DIVINE+ENGINEERING+SERVICES/@21.2634501,81.6356107,17z/data=!4m12!1m6!3m5!1s0x3a28dd86475aaaab:0x28cb5bbf68b5fc1!2sDIVINE+ENGINEERING+SERVICES!8m2!3d21.2634451!4d81.6377994!3m4!1s0x3a28dd86475aaaab:0x28cb5bbf68b5fc1!8m2!3d21.2634451!4d81.6377994" target="_blank">Google Map</a></p>
                                </div>
                            </div>
                </div>
            </div>  
            
            <div class="col-sm-8" style="background-color:#fff;box-shadow:0px 0px 10px #ccc ">
               <div style="padding:20px;">
                   <br>
                    <?php 
                        if(isset($_REQUEST['choice']))
                        {
                            echo '<div style="background-color:#699500;color:#fff;padding:10px">'.$_REQUEST['value'].'</div>
                   <hr/>';
                        }
                   ?>
                   
                <strong style="font-size:20px;">If you are interested in finding out more about how we can help your organization, please fill out the form below.</strong>
                <br><span>A sales representative will reach you shortly.</span>    
                <hr>
                
                <form method="POST" enctype="multipart/form-data" action="contact_us_handle.php">
                      <div class="form-group">
                        <label for="email">Your Name</label>
                        <input type="text" class="form-control input-box" name="name" placeholder="Enter Your Name Here" id="name">
                      </div>
                    
                      <div class="form-group">
                        <label for="pwd">Your Email</label>
                         <input type="email" class="form-control input-box" name="email" placeholder="Enter Your Email Here" id="email">
                      </div>
                    
                    <div class="form-group">
                        <label for="pwd">Your Contact Number</label>
                         <input type="text" class="form-control input-box" name="contact" placeholder="Enter Your Contact No. Here" id="contact">
                      </div>
                    
                    <div class="form-group">
                        <label>Your Query</label>
                        <textarea placeholder="Enter Your Query Here" name="query" class="form-control input-box" id="query"></textarea>
                      </div>
                        <input type="hidden" name="reason" value="">
                    
                      <div class="checkbox">
                        <label><input type="checkbox" name="subscribe"> Subscribe me for the newsletter</label>
                      </div>
                      <button type="submit" class="btn btn-success">Send Query Now!</button>
                </form> 
               </div>               
            </div>
        </div>
      </div>
        <div style="padding:50px;"></div>
    <?php include 'donation.php'; ?>
      <div style="padding:20px;"></div>
    <?php include 'client_panel.php'; ?>
     <div style="padding:20px;"></div>
    <?php include 'footer_strip.php'; ?>
    <?php include 'footer.php'; ?>
    <?php include 'script.php'; ?>
  </body>
</html>