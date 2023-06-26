<?php

$transaction_id = $_GET['transaction_id']; // Retrieve transaction ID from the query parameters
$status = $_GET['status']; // Retrieve transaction status from the query parameters

// Process the payment response and update the database accordingly
if ($status === 'successful') {
  // Payment was successful, update the database or perform other necessary actions
  echo 'Payment successful! Transaction ID: ' . $transaction_id;
} else {
  // Payment failed or was not successful
  echo 'Payment failed. Transaction ID: ' . $transaction_id;
}

?>
