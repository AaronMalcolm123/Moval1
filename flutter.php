<?php

$public_key = 'FLWPUBK_TEST-37362fd53c3aa61ec0c97f32a66c18e8-X';
$secret_key = 'FLWSECK_TEST-f952921b91da89870c0b953ec15d49d3-X';

$amount = 5000; // Amount to charge in the smallest currency unit (e.g., kobo)

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.flutterwave.com/v3/payments',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => json_encode([
    'tx_ref' => 'YOUR_TRANSACTION_REFERENCE',
    'amount' => $amount,
    'currency' => 'UGX', // Change to your desired currency code
    'redirect_url' => 'payment_response.php', // URL to redirect after payment
    'payment_options' => 'card', // Payment options: card, banktransfer, ussd, qr, mobilemoney, banktransfer, barter
    'customer' => [
      'email' => 'john.doe@example.com',
      'name' => 'John Doe',
    ],
  ]),
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Authorization: Bearer ' . $secret_key,
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

if ($err) {
  echo 'cURL Error #:' . $err;
} else {
  $payment = json_decode($response);
  // Redirect the user to the payment authorization URL
  header('Location: ' . $payment->data->link);
}

curl_close($curl);
?>
