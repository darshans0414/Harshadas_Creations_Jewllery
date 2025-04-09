<?php
// Razorpay PHP SDK लोड करा (हे स्क्रिप्टच्या सुरुवातीला ठेवा)
require 'vendor/autoload.php'; 
use Razorpay\Api\Api; // हे योग्य आहे

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];

    try {
        // Razorpay API Object तयार करा
        $api = new Api('YOUR_RAZORPAY_KEY', 'YOUR_RAZORPAY_SECRET'); // ✅ Corrected

        // Razorpay Order तयार करा
        $order = $api->order->create([
            'amount' => 150000, // 1500 INR (paise मध्ये)
            'currency' => 'INR',
            'payment_capture' => 1
        ]);

        $order_id = $order['id'];

        // WhatsApp Message पाठवा
        $whatsapp_message = urlencode("New Order: $name, ₹1500");
        $whatsapp_url = "https://api.whatsapp.com/send?phone=YOUR_WHATSAPP_NUMBER&text=$whatsapp_message";

        // cURL वापरून WhatsApp संदेश पाठवा
        $ch = curl_init($whatsapp_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        if ($response === false) {
            throw new Exception("Error sending WhatsApp message");
        }

        echo "Order created successfully. Order ID: $order_id";
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
