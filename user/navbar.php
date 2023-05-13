<nav>
    <span class="title">Food Delivery</span>
        <ul>
            <li><a href="Home.php">
                <i class="fa-solid fa-home"></i>
                Home</a>
            </li>
            <li><a href="Browse.php">
                <i class="fa-solid fa-shop"></i>
                Browse</a>
            </li>
            <!-- cart -->
            <li><a href="Cart.php">
                <i class="fa-solid fa-cart-arrow-down"></i>
                <?php echo $_SESSION['cart_count'] ?>   
                Cart</a>
            </li>
            <li><a href="Account.php">
            <i class="fa-solid fa-user-large"></i>
                Account</a>
            </li>
        </ul>
</nav>