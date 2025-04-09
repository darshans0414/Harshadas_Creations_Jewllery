<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$gmailUsername = "harshadhacreations31@gmail.com";
$gmailPassword = "xndq rbtf dwnv zvkf";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $mobile = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $pincode = $_POST['pincode'];

    // 🆕 Product info (hidden fields from product.php > payment-form.php > here)
    $product = $_POST['product'] ?? 'N/A';
    $price = $_POST['price'] ?? 'N/A';

    // 📩 Final message body
    $messageBody = "📦 New Order Details:\n\n";
    $messageBody .= "👤 Name: $name\n";
    $messageBody .= "📞 Mobile: $mobile\n";
    $messageBody .= "📧 Email: $email\n";
    $messageBody .= "🏠 Address: $address\n";
    $messageBody .= "📍 Pincode: $pincode\n";
    $messageBody .= "💍 Product: $product\n";
    $messageBody .= "💰 Price: ₹$price\n";

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = $gmailUsername;
        $mail->Password = $gmailPassword;
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom($gmailUsername, 'Harshadhas Creations');
        $mail->addAddress($gmailUsername);

        $mail->Subject = 'New Order Received';
        $mail->Body    = $messageBody;

        $mail->send();
        echo "";
    } catch (Exception $e) {
        echo "There was an error. Please try again.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
    <link rel="stylesheet" href="send-details.css">
</head>
<body>
    <div class="form-container">
        <img src="logo.jpg" alt="Logo" class="logo">
        <h1 class="brand-name">Harshadha Creations Handmade Jewelry</h1>
        <h2 class="success-message">✔ Order placed successfully!</h2>
        <p>You will receive Payment details on your WhatsApp shortly.</p>
        <a href="index.php"><button>Back to Home</button></a>
    </div>
</body>
</html>
