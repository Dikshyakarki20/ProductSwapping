<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<nav class="navbar navbar-expand-lg navbar-white">
        <div class="container">
         <a class="navbar-brand logo_h" href="main.php"><img src="img/logo(2).png" alt="" height="50px" color="black">RECYLE HOUSE</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
               <li class="nav-item"><a class="nav-link" href="main.php">Home</a></li>
              <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                  aria-expanded="false">Shop</a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="category.php">Shop All </a></li>
                  <li class="nav-item"><a class="nav-link" href="clothing.php">Clothing</a></li>
                   <li class="nav-item"><a class="nav-link" href="auto.php">Auto Mobiles</a></li>
                  <li class="nav-item"><a class="nav-link" href="electronics.php">Electronics</a></li>
                  <li class="nav-item"><a class="nav-link" href="ha.php">Home Appliances</a></li>
                  <li class="nav-item"><a class="nav-link" href="others.php">Others</a></li>
                </ul>
							</li>
				<li class="nav-item"><a class="nav-link" href="about1.php">About</a></li>

		

				<li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                  aria-expanded="false">welcome <?php 
                 
  if($_SESSION['admin']==true)
    { 
      echo $_SESSION['username'];
    } else if ($_SESSION['admin']==false)
    {
      echo '<a href="index.php">';
    }
  ?>
                </a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="profile.php">Profile </a></li>
                   <li class="nav-item"><a class="nav-link" href="allproduct.php">Your product </a></li>
                  <li class="nav-item"><a class="nav-link" href="product.php">Add Product </a></li>
                  <li class="nav-item"><a class="nav-link" href="chat.php">Chat </a></li>
                  <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
              
                </ul>
              </li>

				
<li class="nav-item"><a class="nav-link" href="fav.php"><i class="material-icons">favorite_border</i></a>
            </ul>

            <ul class="nav-shop">
             
                <form class="form-inline" method="POST" action= "search.php">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit"><i class="ti-search"></i></button>
  </form>
                
        
              
            </ul>
          </div>
        </div>
      </nav>