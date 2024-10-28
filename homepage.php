
<!DOCTYPE html>
<html>
<head>
  <!-- to run the css  -->
  <link rel="stylesheet" type="text/css" href="../css/homepage.css?v=<?php echo time(); ?>">
</head>
<body>
  <header>
  <ul class="navbar">
  <li><a href="homepage.php">Chutki main shoping.com</a></li>
  <div class="right">
  <li><a href="homepage.php">Home</a></li>
  <li><a href="cart.php">Cart</a></li>
  <li><a href="about.php">About</a></li>
  </div>
 
</ul>
<div >

</div>
  </header>
<main>


<div class="product">
    <img src="../img/nike.jpeg" alt="Item 1">
    <h2>Shoes</h2>
    <p>Imported hand made shoes</p>
    <p class="price">Rs 1500</p>

    <button id="p1">Add to Cart</button><a href="./review.php">&#9733</a>
   
  </div>

  <div  class="product">
    <img src="../img/girl.jpg" alt="Item 2">
    <h2> Girls T-shirt</h2>
    <p> Made in Pakistan </p>
    <p class="price">Rs 1500.00</p>
 
    <button id="p2">Add to Cart</button><a href="./review.php">&#9733</a>
    
  </div>

  <div class="product">
    <img src="../img/iphone.jpeg" alt="Item 3">
    <h2> Iphone 14 pro max  </h2>
    <p> 4 gb ram </p>
    <p class="price">Rs 200k</p>
    
    <button id="p3">Add to Cart</button><a href="./review.php">&#9733</a>
    
  </div>

  <div class="product">
    <img src="../img/glasses.jpg" alt="Item 4">
    <h2> Rayban Glasses </h2>
    <p> Made with metal </p>
    <p class="price">Rs 1950 </p>
    
    <button id="p4">Add to Cart</button><a href="./review.php">&#9733</a>
    
  </div>

  <div class="Faq">
    <a class="fq" href="./client.php">Chat support</a>
  </div>

</main>

</body>
</html>


<script>





  document.getElementById('p1').addEventListener('click', function() {
    addProductToCart(1, 'Imported hand made shoes ', 1500,"../img/nike.jpeg");    
});


document.getElementById('p2').addEventListener('click', function() {
    
    
    addProductToCart(2, 'Girls T-shirt', 1500,"../img/girl.jpg");    
});
document.getElementById('p3').addEventListener('click', function() {
   
    
    addProductToCart(3, 'Iphone 14 pro max', 200000,"../img/iphone.jpeg");    
});
document.getElementById('p4').addEventListener('click', function() {
    // Simulate adding a product to the cart (you can replace this with your product details)
    
    addProductToCart(4, 'Rayban Glasses', 1950,"../img/glasses.jpg");    
});

function addProductToCart(id, name, price,img) {
    const product = {
        id: id,
        name: name,
        img:img,
        price: price
    };
    // Retrieve existing cart or initialize an empty cart
   let cart = JSON.parse(sessionStorage.getItem('cart')) || [];

   // Check if the product is already in the cart
   const isProductInCart = cart.some(item => item.id === id);

   if (isProductInCart) {
        alert("Product is already in the cart");
    } else {
        cart.push(product);
        sessionStorage.setItem('cart', JSON.stringify(cart));
        alert("Added successfully");
    }

// Add the new product to the cart
// cart.push(product);

// // Update the cart in sessionStorage
// sessionStorage.setItem('cart', JSON.stringify(cart));
  }

   

</script>



<!-- // // JavaScript logic
// document.getElementById('addToCartButton').addEventListener('click', function() {
//     // Simulate adding a product to the cart (you can replace this with your product details)
//     const newProduct = {
//         id: 1,
//         name: 'Example Product',
//         price: 19.99
//     };

//     // Retrieve existing cart or initialize an empty cart
//     let cart = JSON.parse(sessionStorage.getItem('cart')) || [];

//     // Add the new product to the cart
//     cart.push(newProduct);

//     // Update the cart in sessionStorage
//     sessionStorage.setItem('cart', JSON.stringify(cart)); -->
</body>
</html>
