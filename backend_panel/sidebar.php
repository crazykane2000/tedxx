 <aside class="main-sidebar gh">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $row['name']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> <?php echo $row['position']; ?></a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
       
          <li class=" treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Latest News</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="add_news.php"><i class="fa fa-circle-o"></i> Add News</a></li>
               <li><a href="view_news.php"><i class="fa fa-circle-o"></i> View News</a></li>
          </ul>
        </li>
          
           <li class=" treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Testimonials </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="add_testimonial.php"><i class="fa fa-circle-o"></i> Add Testimonial</a></li>
               <li><a href="view_testimonials.php"><i class="fa fa-circle-o"></i> View Testimonial</a></li>
          </ul>
        </li>
          
        <li class=" treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Category </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="add_category.php"><i class="fa fa-circle-o"></i> Add Category</a></li>
               <li><a href="view_category.php"><i class="fa fa-circle-o"></i> View Category</a></li>
               <hr/>
               <li><a href="add_sub_category.php"><i class="fa fa-circle-o"></i> Add Sub Category</a></li>
               <li><a href="view_sub_category.php"><i class="fa fa-circle-o"></i> View Sub Category</a></li>
          </ul>
        </li>

        <li class=" treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Brand </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="add_brand.php"><i class="fa fa-circle-o"></i> Add Brand</a></li>
               <li><a href="view_brand.php"><i class="fa fa-circle-o"></i> View Brand</a></li>
          </ul>
        </li>
          
          
           <li class=" treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Services </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="add_services.php"><i class="fa fa-circle-o"></i> Add Service</a></li>
               <li><a href="view_services.php"><i class="fa fa-circle-o"></i> View Service</a></li>
          </ul>
        </li>
          
             <li class=" treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Products </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="add_products.php"><i class="fa fa-circle-o"></i> Add Products</a></li>
               <li><a href="view_products.php"><i class="fa fa-circle-o"></i> View Products</a></li>
          </ul>
        </li>
          
             <li class=" treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Projects </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="add_news.php"><i class="fa fa-circle-o"></i> Add Project</a></li>
               <li><a href="view_news.php"><i class="fa fa-circle-o"></i> View Project</a></li>
          </ul>
        </li>

          
      
          
          <li class="treeview">
          <a href="#">
            <i class="fa fa-fw fa-black-tie"></i>
            <span>Career</span>   
              <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">           
            <li><a href="view_career.php"><i class="fa fa-circle-o"></i>Career Posts</a></li>
            <li><a href="view_career_requests.php"><i class="fa fa-circle-o"></i> Career Requests</a></li>           
          </ul>
        </li>
          
          
        <li>
          <a href="view_contact_requests.php">
            <i class="fa fa-phone"></i> <span>Contact Requests </span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
       <li>
          <a href="view_subscribers.php">
            <i class="fa fa-envelope-o"></i> <span>View Subscribers</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green"></small>
            </span>
          </a>
        </li>
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>