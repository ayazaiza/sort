<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">Dashboard</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" ui-sref-active="active" data-placement="right" title="Dashboard">
          <a class="nav-link" ui-sref="dashboard">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
    
        <li class="nav-item" data-toggle="tooltip" ui-sref-active="active" data-placement="right" title="Tables">
          <a class="nav-link" ui-sref="addnewprovider">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Add New Link</span>
          </a>
        </li>
        <!-- <li class="nav-item" data-toggle="tooltip" ui-sref-active="active" data-placement="right" title="Tables">
          <a class="nav-link" ui-sref="addnewuser">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">Add New User</span>
          </a>
        </li> -->


        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="categories">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Categories</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li ui-sref-active="active">
              <a ui-sref="addnewMainCategory">Main Categories</a>
            </li>
            <li ui-sref-active="active">
              <a ui-sref="addnewSubCategory">Sub Categories</a>
            </li>
          </ul>
        </li>

        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="users">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents1" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">Users</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents1">
            <li ui-sref-active="active">
              <a ui-sref="addnewuser">Add New User</a>
            </li>
            <li ui-sref-active="active">
              <a ui-sref="allUsers">All Users</a>
            </li>
          </ul>
        </li>


       
       
        
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
       
       
        
        <li class="nav-item">
          <a class="nav-link" href="logout.php">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>