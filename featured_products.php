 <div style="padding:20px;"></div>
      <div class="container">
        <div class="row">
            <div style="padding:10px;">
                <h2 style="color:#0776c6;font-family:'Righteous';font-weight:normal">Our Featured Products</h2>
                <div style="padding:3px;border-bottom:solid 1px #ccc;"></div>
                <br class="clearfix">

                <?php 
                    $sql_data = "SELECT * FROM product ORDER BY date DESC LIMIT 8";
                    $result_data = mysql_query($sql_data) or die(mysql_error());
                    $i=0;
                    while($row_data = mysql_fetch_array($result_data)){
                        if($i%4==0){
                            echo '<div class="clearfix"></div>';
                        }
                        echo '<div class="col-md-3">            
                                <div class="thumbnail">
                                    <div class="caption" style="display: none;">
                                        <br><br>
                                        <h4>'.$row_data['product_name'].'</h4>
                                        <p>'.substr(strip_tags($row_data['small_discription']), 0,50).'</p>
                                        <p><a href="product_inner.php?id='.$row_data['id'].'" class="label label-success" rel="tooltip" title="" data-original-title="Zoom">View Product</a>
                                        </p>
                                    </div>
                                    <img src="page/thumb/'.$row_data['file'].'" alt="...">
                                </div>
                          </div>';
                          $i++;
                    }
                 ?>
            </div>
          </div>
      </div>
      
   <div style="padding:20px;"></div>
     