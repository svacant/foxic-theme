<?php
// Simple site header
?>
<header>
    <div class="logo">
        <a href="/">
            <img src="<?php echo isset($data->logo) ? $data->logo : '/images/logo.png'; ?>" alt="<?php echo isset($data->title) ? $data->title : 'Store'; ?>">
        </a>
    </div>
    <nav>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/page/cart.html">Cart</a></li>
            <li><a href="/page/contact.html">Contact</a></li>
        </ul>
    </nav>
</header>
