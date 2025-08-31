<?php
session_start();

// Add to cart logic
if (isset($_POST['add_to_cart'])) {
    $product = $_POST['product'];
    $price = floatval($_POST['price']);

    $_SESSION['cart'][] = [
        "product" => $product,
        "price" => $price
    ];
}

// Remove from cart
if (isset($_GET['remove'])) {
    unset($_SESSION['cart'][$_GET['remove']]);
    $_SESSION['cart'] = array_values($_SESSION['cart']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cart - MyStore</title>
  <link rel="stylesheet" href="style.css">
  <script src="cart.js" defer></script>
</head>
<body>
  <header>
    <nav class="navbar">
      <h1 class="logo">🛍 MyStore</h1>
      <ul class="nav-links">
        <li><a href="index.html">Home</a></li>
        <li><a href="products.html">Products</a></li>
        <li><a href="cart.php" class="active">Cart <span id="cart-count"><?= isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0 ?></span></a></li>
      </ul>
    </nav>
  </header>

  <section class="page-header">
    <h2>Your Shopping Cart</h2>
  </section>

  <section class="cart-section">
    <?php if (!empty($_SESSION['cart'])): ?>
      <table class="cart-table">
        <tr>
          <th>Product</th>
          <th>Price</th>
          <th>Action</th>
        </tr>
        <?php 
        $total = 0;
        foreach ($_SESSION['cart'] as $index => $item): 
            $total += $item['price'];
        ?>
        <tr>
          <td><?= htmlspecialchars($item['product']) ?></td>
          <td>$<?= number_format($item['price'], 2) ?></td>
          <td><a class="remove-btn" href="cart.php?remove=<?= $index ?>">Remove</a></td>
        </tr>
        <?php endforeach; ?>
      </table>
      <h3>Total: $<?= number_format($total, 2) ?></h3>
      <button class="checkout-btn" id="checkoutBtn">Proceed to Checkout</button>
    <?php else: ?>
      <p>Your cart is empty.</p>
    <?php endif; ?>
  </section>

  <!-- Newsletter subscription -->
  <section class="newsletter">
    <h3>Subscribe to our Newsletter</h3>
    <form id="newsletterForm">
      <input type="email" id="newsletterEmail" placeholder="Enter your email" required>
      <button type="submit">Subscribe</button>
    </form>
    <p id="newsletterMessage"></p>
  </section>

  <footer>
    <p>© 2025 MyStore | All Rights Reserved.</p>
  </footer>
</body>
</html>
