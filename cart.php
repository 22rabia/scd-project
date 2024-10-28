<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/homepage.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/cart.css?v=<?php echo time(); ?>">
    <title>Cart</title>
    </head>
<body>
    <header class="right">
        <ul class="navbar">
            <li><a href="homepage.php">Home</a></li>
            <li><a href="cart.php">Cart</a></li>
            <li><a href="about.php">About</a></li>
        </ul>
    </header>

    <main id="product">
        <!-- Your existing cart content here -->
    </main>

    <div id="purchasePopup" class="popup">
        <div class="popup-content">
            <div class="pic">
                <img src="" alt="Product Image" class="product-img" id="popupProductImg">
                <div class="internal">
                    <h4>Select Quantity</h4>
                    <select id="quantityDropdown" class="dropdown" onchange="calculateTotal()">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                
                    </select>
                 </div>
           
            </div>
            
            <p class="total-price">Total Price: Rs<span id="popupTotalPrice"></span></p>
            <h5>Payment Method</h5>

            <form id="paymentForm">
    <label for="creditCard">
        <input type="radio" id="creditCard" name="paymentMethod" value="creditCard">
        Credit Card
    </label>

    <label for="debitCard">
        <input type="radio" id="debitCard" name="paymentMethod" value="debitCard">
        Debit Card
    </label>
</form>


        

       

        <!-- Card number input field -->
        <div id="cardNumberInput">
            <label for="cardNumber">Enter Card Number:</label>
            <input type="text" id="cardNumber" name="cardNumber">
        </div>
            <p id="validCard">Enter Valid 11 digit card no</p>

            
           <div class="confirmButton">
           <button class="btn confirm-btn" onclick="confirmPurchase()" >Confirm</button>
            <button class="btn cancel-btn" onclick="togglePopup()">Cancel</button>
           </div>
          
        </div>
    </div>

    <div class="price">Total Price: Rs<span id="cartTotalPrice">0.00</span></div>

    <script>
        // Function to confirm purchase in the popup
       
        function togglePopup() {
                const popup = document.getElementById('purchasePopup');
                popup.style.display = popup.style.display === 'none' ? 'flex' : 'none';
                calculateTotal();
            }

            function confirmPurchase() {

                let cart = JSON.parse(sessionStorage.getItem('cart')) || [];
                    const selectedQuantity = parseInt(document.getElementById('quantityDropdown').value);
                    cart.forEach((product, index) => {
                     pricePerItem =product.price;


                });
                    
                    const totalPrice = selectedQuantity * pricePerItem;
                    console.log(`Quantity selected: ${selectedQuantity}`);
                    console.log(`Total Price: Rs${totalPrice.toFixed(2)}`);
                         togglePopup();
                    }

                    // calculating total price of the selected product
                    var pricePerItem ;
            function calculateTotal() {
                let cart = JSON.parse(sessionStorage.getItem('cart')) || [];
                cart.forEach((product, index) => {
                     pricePerItem =product.price;


                });
 
                const quantity = parseInt(document.getElementById('quantityDropdown').value);
                // Replace this with your actual price per item
                const totalPrice = quantity * pricePerItem;
                document.getElementById('popupTotalPrice').innerText = totalPrice.toFixed(2);
            }

        document.addEventListener('DOMContentLoaded', function() {
            let cart = JSON.parse(sessionStorage.getItem('cart')) || [];
            const cartContentElement = document.getElementById('product');
            updateCartDisplay();
            
            function updateCartDisplay() {
                if (cart && cart.length > 0) {
                    var total = 0;
                    cartContentElement.innerHTML = '<p>Products in your cart:</p>';
                    cart.forEach((product, index) => {
                        total += product.price;
                        cartContentElement.innerHTML += `
                            <img class="img" src=${product.img}>
                            <p class="cartProduct">${product.name} - Rs${product.price}
                                <div>
                                    <button onclick="removeProduct(${index})">Delete</button>
                                    <button onclick="purchasePopUp(${index})">Purchase</button>
                                </div>
                            </p>
                        `;


                      

                    
                    });
                    document.getElementById('cartTotalPrice').innerHTML = total;
                } else {
                    cartContentElement.innerHTML = '<p>Your cart is empty.</p>';
                    document.querySelector('.price').innerHTML = "";
                }
            }

            // Function to remove a product from the cart
            window.removeProduct = function(index) {
                cart.splice(index, 1);
                sessionStorage.setItem('cart', JSON.stringify(cart));
                updateCartDisplay();
            };

            // Function to open purchase popup
            window.purchasePopUp = function(index) {
                const selectedProduct = cart[index];
                document.getElementById('popupProductImg').src = selectedProduct.img;
                togglePopup();
            };

           
        });

        const value = JSON.parse(sessionStorage.getItem('cart'));
        console.log(value);

        // checking validity of the card

       // Get the input field for the card number
const cardNumberInput = document.getElementById('cardNumber');

// Get the paragraph displaying the validation message
const validCardMessage = document.getElementById('validCard');

// Add an event listener for input change
cardNumberInput.addEventListener('input', function() {
    
    // Get the entered card number value
    var cardNumberValue = this.value;
    console.log(cardNumberValue)

    // Check the length of the entered card number
    if(cardNumberValue.length>0){

        if (cardNumberValue.length < 11 ||cardNumberValue.length>11) {
        // Show validation message for invalid card number
        validCardMessage.style.display="block";
    } else  {
        // Clear validation message if the card number is valid
        validCardMessage.style.display="none";
    }
    }else{
        validCardMessage.style.display="none";
    }
   
});

    </script>
</body>
</html>