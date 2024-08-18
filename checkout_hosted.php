<?php
session_start();
include("include/connection.php");
include("include/functions.php");
include("OrderTransaction.php");

if (isset($_POST['cash_on_delivery'])) {

    $name = isset($_POST['customer_name']) ? $_POST['customer_name'] : "John Doe";
    $email = isset($_POST['customer_email']) ? $_POST['customer_email'] : "john.doe@email.com";
    $phone = isset($_POST['customer_mobile']) ? $_POST['customer_mobile'] : "01711111111";
    $transaction_amount = $_POST['amount'];
    $address = $_POST['address'];
    $tran_id = "SSLCZ_TEST_" . uniqid();
    $currency = '';
    $user_id = $_POST['user_id'];

    $sql = "INSERT INTO estore_orders (user_id, name, email, phone, amount, address, status, transaction_id,currency)
                                VALUES ('$user_id', '$name', '$email', '$phone','$transaction_amount','$address','Cash On Delivery', '$tran_id','$currency')";
    $db->query($sql);
    //populate order_item database
    $order_id = mysql_qrow("select eo.id from estore_orders as eo join estore_payment as ep where eo.transaction_id = '$tran_id'")['id'];
    $user_id = mysql_qrow("select eo.user_id from estore_orders as eo join estore_payment as ep where eo.transaction_id = '$tran_id'")['user_id'];
    // Fetch data from estore_cart
    $sql = "SELECT p_id, qty FROM estore_cart WHERE user_id = $user_id";
    $result = mysqli_query($db, $sql);

    if ($result) {
        // Prepare SQL statement for insertion
        $stmt = mysqli_prepare($db, "INSERT INTO estore_order_items (order_id, product_id, qty) VALUES (?, ?, ?)");

        if ($stmt) {
            // Bind parameters
            mysqli_stmt_bind_param($stmt, "iii", $order_id, $product_id, $qty);

            // Fetch each row and insert into estore_order_items
            while ($row = mysqli_fetch_assoc($result)) {
                $product_id = $row['p_id'];
                $qty = $row['qty'];

                $sql_qty_update = "update estore_product set p_quantity = p_quantity - $qty WHERE id = $product_id";
                $db->query($sql_qty_update);


                mysqli_stmt_execute($stmt);
            }

            // Close the statement
            mysqli_stmt_close($stmt);
        } else {
            echo "Prepare failed: " . mysqli_error($db);
        }

        // Free result set
        mysqli_free_result($result);
    } else {
        echo "Query failed: " . mysqli_error($db);
    }

    // Delete all records related to the current user's ID
    $sql_delete_cart = "DELETE FROM estore_cart WHERE user_id = $user_id";
    if ($db->query($sql_delete_cart) !== TRUE) {
        echo '<h4 class="text-center text-warning">Warning: Unable to clear your cart. Please contact support.</h4>';
    }




    header("Location: cod_oder_success.php");
}

$user_id = $_POST['user_id'];

error_reporting(E_ALL);
ini_set('display_errors', 1);

# This is a sample page to understand how to connect payment gateway

require_once(__DIR__ . "/lib/SslCommerzNotification.php");

include("include/connection.php");
include("OrderTransaction.php");

use SslCommerz\SslCommerzNotification;

# Organize the submitted/inputted data
$post_data = array();

$post_data['total_amount'] = $_POST['amount'];
$post_data['currency'] = "BDT";
$post_data['tran_id'] = "SSLCZ_TEST_" . uniqid();

# CUSTOMER INFORMATION
$post_data['cus_name'] = isset($_POST['customer_name']) ? $_POST['customer_name'] : "John Doe";
$post_data['cus_email'] = isset($_POST['customer_email']) ? $_POST['customer_email'] : "john.doe@email.com";
$post_data['cus_add1'] = "Dhaka";
$post_data['cus_add2'] = "Dhaka";
$post_data['cus_city'] = "Dhaka";
$post_data['cus_state'] = "Dhaka";
$post_data['cus_postcode'] = "1000";
$post_data['cus_country'] = "Bangladesh";
$post_data['cus_phone'] = isset($_POST['customer_mobile']) ? $_POST['customer_mobile'] : "01711111111";
$post_data['cus_fax'] = "01711111111";

# SHIPMENT INFORMATION
$post_data["shipping_method"] = "YES";
$post_data['ship_name'] = "Store Test";
$post_data['ship_add1'] = "Dhaka";
$post_data['ship_add2'] = "Dhaka";
$post_data['ship_city'] = "Dhaka";
$post_data['ship_state'] = "Dhaka";
$post_data['ship_postcode'] = "1000";
$post_data['ship_phone'] = "";
$post_data['ship_country'] = "Bangladesh";

$post_data['emi_option'] = "1";
$post_data["product_category"] = "Electronic";
$post_data["product_profile"] = "general";
$post_data["product_name"] = "Computer";
$post_data["num_of_item"] = "1";

# OPTIONAL PARAMETERS
$post_data['user_id'] = $user_id;
$query = new OrderTransaction();
$sql = $query->saveTransactionQuery($post_data);

if ($db->query($sql) === TRUE) {

    # Call the Payment Gateway Library
    $sslcz = new SslCommerzNotification();
    $msg = $sslcz->makePayment($post_data, 'hosted');
    if (!is_array($msg)) {
        echo $msg;
    }
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}
