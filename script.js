function payNow() {
    let formData = new FormData(document.getElementById('orderForm'));
    fetch('order.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.order_id) {
            let options = {
                key: 'YOUR_RAZORPAY_KEY',
                amount: 150000, // Amount in paisa
                currency: 'INR',
                name: 'Handmade Jewelry',
                description: 'Payment for Beautiful Necklace',
                order_id: data.order_id,
                handler: function(response) {
                    alert('Payment Successful!');
                },
                prefill: {
                    name: formData.get('name'),
                    email: formData.get('email'),
                    contact: formData.get('mobile')
                }
            };
            let rzp = new Razorpay(options);
            rzp.open();
        }
    });
}
document.addEventListener("DOMContentLoaded", function () {
    const productContainer = document.getElementById("productContainer");

    // 75 products dynamic add करायचे
    for (let i = 1; i <= 75; i++) {
        let productHTML = `
            <div class="Product">
                <h2>Beautiful Necklace ${i}</h2>
                <img src="necklace.jpg" alt="Necklace ${i}">
                <p>Price: ₹1500</p>
                <button type="button" onclick="openModal()">Buy Now</button>
            </div>
        `;
        productContainer.innerHTML += productHTML;
    }
});

// Modal Functions
function openModal() {
    document.getElementById("orderModal").style.display = "block";
}

function closeModal() {
    document.getElementById("orderModal").style.display = "none";
}

function sendOrderDetails() {
    let formData = new FormData(document.getElementById("orderForm"));

    // Email वर पाठवण्यासाठी
    fetch("email_send.php", { method: "POST", body: formData })
        .then(response => response.text())
        .then(data => {
            if (data === "success") {
                alert("Your order details have been sent successfully!");
            } else {
                alert("Error sending order details!");
            }
        });

    // WhatsApp वर पाठवण्यासाठी
    fetch("whatsapp_send.php", { method: "POST", body: formData })
        .then(response => response.text())
        .then(data => {
            if (data === "success") {
                alert("Order details sent to WhatsApp!");
            } else {
                alert("Error sending WhatsApp message!");
            }
        });
}


