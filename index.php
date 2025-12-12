<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>BucksBuddy</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
  <header class="navbar">
    <div class="logo">BucksBuddy</div>

    <?php if(isset($_SESSION['username'])): ?>
      <div class="hello">Hello, <?php echo htmlspecialchars($_SESSION['username']); ?> 👋</div>
    <?php endif; ?>

    <nav>
      <ul>
        <li><a href="#">Electronics</a></li>
        <li><a href="#">Fashion</a></li>
        <li><a href="#">Home</a></li>
        <li><a href="#">Beauty</a></li>
        <li><a href="#">Toys</a></li>
        <li><a href="#">Deals</a></li>
      </ul>
    </nav>

    <div class="navbar-right">
      <?php if(isset($_SESSION['username'])): ?>
        <a href="logout.php">Logout</a>
      <?php else: ?>
        <a href="login.php">Login</a>
        <span class="sep">|</span>
        <a href="signup.php">Sign Up</a>
      <?php endif; ?>
      <button id="cartBtn" class="cart-btn">Cart (<span id="cartCount">0</span>)</button>
    </div>
  </header>

  <div class="search-bar">
    <input id="searchInput" type="search" placeholder="Search for products, brands and more...">
    <button id="searchBtn"><i class="fa-solid fa-magnifying-glass"></i></button>
  </div>

  <section class="banner">
    <h2>Big Sale is Live!</h2>
    <p>Up to 60% off on top brands</p>
  </section>

  <main>
    <h1 class="section-title">Featured Products</h1>

    <section class="products product-grid">
      <div class="product-card product">
        <img src="https://www.bhphotovideo.com/images/images2000x2000/sony_wh1000xm2_b_1000x_wireless_noise_canceling_headphones_1361028.jpg" alt="Wireless Headphones">
        <h3>Wireless Headphones</h3>
        <p class="price">₹7,999</p>
        <button class="add-cart">Add to Cart</button>
      </div>

      <div class="product-card product">
        <img src="https://s7d2.scene7.com/is/image/academy/20642872?$pdp-gallery-ng$" alt="Running Shoes">
        <h3>Running Shoes</h3>
        <p class="price">₹1,299</p>
        <button class="add-cart">Add to Cart</button>
      </div>

      <div class="product-card product">
        <img src="https://th.bing.com/th/id/OIP.uMmJvI4I2B1w9Z80ThC-wwHaHa?w=179&h=180&c=7&r=0&o=7&dpr=1.5&pid=1.7&rm=3" alt="Smart Watch">
        <h3>Smart Watch</h3>
        <p class="price">₹1,999</p>
        <button class="add-cart">Add to Cart</button>
      </div>

      <div class="product-card product">
        <img src="https://converse.static.n7.io/media/catalog/product/1/0/10027096-a03_a_107x1.jpg" alt="Men's T-Shirt">
        <h3>Men's T-Shirt</h3>
        <p class="price">₹499</p>
        <button class="add-cart">Add to Cart</button>
      </div>
    </section>
  </main>

  <footer class="footer"><div>© BucksBuddy</div></footer>

<script>
// simple client-side cart counter (no server persistence)
document.addEventListener('DOMContentLoaded', () => {
  const addBtns = document.querySelectorAll('.add-cart');
  const cartCountEl = document.getElementById('cartCount');
  let count = 0;

  addBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      count++;
      cartCountEl.textContent = count;
      btn.textContent = 'Added';
      btn.disabled = true;
    });
  });

  // basic search that highlights matching product titles (client-only)
  const searchBtn = document.getElementById('searchBtn');
  const searchInput = document.getElementById('searchInput');

  searchBtn.addEventListener('click', () => {
    const q = searchInput.value.trim().toLowerCase();
    document.querySelectorAll('.product-card h3').forEach(h3 => {
      const parent = h3.closest('.product-card');
      if (!q) {
        parent.style.display = '';
        return;
      }
      if (h3.textContent.toLowerCase().includes(q)) parent.style.display = '';
      else parent.style.display = 'none';
    });
  });
});
</script>

</body>
</html>