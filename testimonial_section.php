 <div class="container">
        <div class="row">
            <h1 class="heading1">
                 Information Security Training &amp; Services Reviews
            </h1>    
            <div style="border-bottom:solid 1px #ccc;"></div>
        </div>
          <br/>
          <div class="row">
           <?php 
                $sql = "SELECT * FROM testimonials ORDER BY date DESC LIMIT 4";
                $result = mysql_query($sql) or die(mysql_error());
                $i=0;
                while($row=mysql_fetch_array($result))
                {
                    if($i%4==0)
                    {
                        echo '</div><div class="row">';
                    }
                    
                    $files = array("343df.jpg","avatar.jpeg", "download.jpg", "dss.jpg", "Gravatar.jpg", "images.jpg", "yvon-gravatar-245x245.jpg" );
                    
                    
                    echo '<div class="col-sm-3">
                              <div style="margin:10px;padding:10px;">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <img src="testimonial/'.$files[rand(0,6)].'" style="width:50px;border-radius:50%">   
                                        </div>
                                        <div class="col-sm-9">
                                            <div style="padding:5px;padding-left:5px;">
                                                <b>'.$row['name'].'</b>
                                                <p style="color:#888;font-size:11px;">CTG Student/Client</p>
                                            </div>                        
                                        </div>
                                    </div> 
                                    <div style="padding:5px;border-bottom:solid 1px #ccc"></div>
                                    <div style="color:#000;font-family:arial;padding-top:10px;">'.$row['testimonial'].'</div>  
                            </div>  
                        </div>';
                    $i++;
                    
                }
              ?>
          </div>
      </div>