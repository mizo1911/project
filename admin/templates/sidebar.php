<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">

          <li class="nav-item">
            <a class="nav-link <?php echo ($page == '' || $page == 'index.php') ? 'active' : ''; ?>" href="index.php" style="font-family: Lobster;  font-size: 1.3rem; ">
              <span data-feather="home"></span>
              <i class="fa-solid fa-house"></i> Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo ($page == 'products.php') ? 'active' : ''; ?>" href="products.php" style="font-family: Lobster;  font-size: 1.3rem; ">
            <i class="fa-solid fa-layer-group"></i> Products
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link <?php echo ($page == 'create_product.php') ? 'active' : ''; ?>" href="create_product.php" style="font-family: Lobster;  font-size: 1.3rem; ">
            <i class="fa-solid fa-cart-plus"></i> Create Product
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link <?php echo ($page == 'admin_account.php') ? 'active' : ''; ?>" href="admin_account.php" style="font-family: Lobster;  font-size: 1.3rem; ">
            <i class="fa-solid fa-user-tie"></i> Account
            </a>
          </li>




        </ul>

       
      </div>
    </nav>


    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
     <!---   <h1 class="h2 ">Hello, <?php echo $_SESSION["admin_name"]; ?></h1>--->
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
      </div>