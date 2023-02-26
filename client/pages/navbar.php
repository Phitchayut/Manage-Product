<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active fs-4" aria-current="page" href="page_admin.php">Home</a>
                    </li>
                    <li class="nav-item dropdown fs-5 mt-1">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            จัดการ
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="product/show_product.php">จัดการสินค้า</a></li>
                            <li><a class="dropdown-item" href="product/show_typeProduct.php">จัดการหมวดหมู่สินค้า</a></li>
                            <li><a class="dropdown-item" href="member/show_member.php">จัดการสมาชิก</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="navbar-nav text-black fs-4">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Hello, <span class="text-uppercase"><?php echo $row['username'] ?></span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li> <a href="../auth/logout.php" class="dropdown-item">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>