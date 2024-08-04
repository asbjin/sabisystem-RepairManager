
<!-- BEGIN Header -->
<header id="header-wrapper">
    <div id="top-bar" class="clearfix">
        <div id="top-bar-inner">
			<button id="menu-toggle" class="menu-toggle">
			<i class="fas fa-bars"></i>
		    </button>
            <div class="search_form">
                <form action="customer-search.php" method="post">
                    <input type="text" name="search_box" id="search_box" placeholder="Search for a customer...">
                </form>
            </div>
            <div class="topbar-right clearfix">
                <ul class="clearfix">
                    <li class="login-user">
                        <a title="<?php echo $login_session; ?>" href="account.php">
                            <span class="icon"><i aria-hidden="true" class="icon-user"></i></span>
                            <?php echo $login_session; ?>
                        </a>
                    </li>
                </ul>
                <div class="log-out">
                    <p>
                        <a href="logout.php" title="Sign out">
                            <span>Sign-out</span>
                            <span class="icon">
                                <i aria-hidden="true" class="icon-exit"></i>
                            </span>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="full-shadow"></div>
</header>
<!-- END Header -->

<div class="">
    
    <nav id="menu" class="">
        <ul class="row">
            <li class="col-md-2">
                <a href="dashboard.php">
                    <span class="icon">
                        <i aria-hidden="true" class="fa-solid fa-house"></i>
                    </span>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a href="customer.php">
                    <span class="icon">
                        <i aria-hidden="true" class="fa-solid fa-users"></i>
                    </span>
                    <span>Customers</span>
                </a>
            </li>
            <li>
                <a href="repairs.php">
                    <span class="icon">
                        <i aria-hidden="true" class="fa-solid fa-screwdriver-wrench"></i>
                    </span>
                    <span>Repairs</span>
                </a>
            </li>
            <li>
                <a href="machines.php">
                    <span class="icon">
                        <i aria-hidden="true" class="fa-solid fa-print"></i>
                    </span>
                    <span>Machines</span>
                </a>
            </li>
            <li>
                <a href="inventory.php">
                    <span class="icon">
                        <i aria-hidden="true" class="fa-solid fa-gears"></i>
                    </span>
                    <span>Inventory</span>
                </a>
            </li>
            <li class="active">
                <a href="account.php">
                    <span class="icon">
                        <i aria-hidden="true" class="fa-solid fa-user"></i>
                    </span>
                    <span>Account</span>
                </a>
            </li>
        </ul>
    </nav>
    <!-- END OF NAVIGATION -->
</div>