// Get the radio buttons for shipping
const pickupRadio = document.getElementById("pickup");
const deliveryRadio = document.getElementById("delivery");

// Get the element for displaying the shipping fee
const shippingFeeElement = document.querySelector(".shipping-fee");

// Function to update shipping fee based on user selection
function updateShippingFee() {
  if (pickupRadio.checked) {
    shippingFeeElement.textContent = "RM 0.00";
  } else if (deliveryRadio.checked) {
    shippingFeeElement.textContent = "RM 10.00";
  }
}

// Event listeners to track changes in radio button selection
pickupRadio.addEventListener("change", updateShippingFee);
deliveryRadio.addEventListener("change", updateShippingFee);

// Initialize shipping fee on page load
updateShippingFee();

//Function to calculate cart total
//Function to check the cart item is empty anot
//This code assumes that the cart items stored in localStorage are in the format of objects with productName and productPrice properties.
//Ensure that the productName and productPrice are correctly set when storing items in localStorage from the products.php page, and the localStorage keys match the ones used for retrieval in the cart.php file.
//Double-check the data stored in localStorage using the browser's developer tools to ensure it matches the expected format.
$(document).ready(function () {
  // Function to display cart items
  function displayCartItems() {
    var cartItems = JSON.parse(localStorage.getItem("cart"));

    // Check if cart is empty or null
    if (cartItems === null || cartItems.length === 0) {
      // Display a message or handle an empty cart
      $(".table tbody").html(
        '<tr><td colspan="4">Your cart is empty</td></tr>'
      );
    } else {
      // Display cart items in the table
      var cartContent = "";
      cartItems.forEach(function (item, index) {
        cartContent += `
                    <tr>
                        <td>${item.productName}</td>
                        <td>${item.productPrice}</td>
                        <td>1</td>
                        <td>${item.productPrice}</td>
                        <td><button class="btn btn-danger btn-sm delete-item smaller-btn" data-index="${index}">Delete</button></td>
                    </tr>
                `;
      });
      $(".table tbody").html(cartContent);

      // Attach event listeners to delete buttons
      $(".delete-item").on("click", function () {
        var index = $(this).data("index");
        removeFromCart(index);
        displayCartItems();
      });
    }

    // Update cart total
    updateCartTotal();
  }

  // Function to remove item from cart
  function removeFromCart(index) {
    var cartItems = JSON.parse(localStorage.getItem("cart"));

    if (cartItems !== null) {
      cartItems.splice(index, 1); // Remove item at the specified index
      localStorage.setItem("cart", JSON.stringify(cartItems)); // Update cart in localStorage
    }
  }

  // Function to update cart total
  function updateCartTotal() {
    var total = 0;
    var cartItems = JSON.parse(localStorage.getItem("cart"));

    if (cartItems !== null) {
      cartItems.forEach(function (item) {
        var price = parseFloat(item.productPrice.replace("RM ", ""));
        total += price;
      });
    }

    // Update subtotal and total in the cart
    $(".col-5.text-end")
      .eq(0)
      .text("RM " + total.toFixed(2));
    $(".col-5.text-end strong").text("RM " + total.toFixed(2));
  }

  // Call the displayCartItems function when the page loads
  displayCartItems();
});

// Function to update cart total with shipping method (delivery)
function updateCartTotal() {
  var total = 0;
  var cartItems = JSON.parse(localStorage.getItem("cart"));
  var shippingFee = 0;

  if (cartItems !== null) {
    cartItems.forEach(function (item) {
      var price = parseFloat(item.productPrice.replace("RM ", ""));
      total += price;
    });
  }

  // Check if delivery is selected and add shipping fee
  if (deliveryRadio.checked) {
    shippingFee = 10; // Delivery fee is RM 10.00
  }

  // Update subtotal, shipping fee, and total in the cart
  var grandTotal = total + shippingFee;
  $(".col-5.text-end")
    .eq(0)
    .text("RM " + total.toFixed(2));
  $(".col-5.text-end")
    .eq(1)
    .text("RM " + shippingFee.toFixed(2));
  $(".col-5.text-end strong").text("RM " + grandTotal.toFixed(2));
}

// Event listeners to track changes in radio button selection
pickupRadio.addEventListener("change", function () {
  updateShippingFee();
  updateCartTotal();
});

deliveryRadio.addEventListener("change", function () {
  updateShippingFee();
  updateCartTotal();
});

// Initialize shipping fee and cart total on page load
updateShippingFee();
updateCartTotal();
