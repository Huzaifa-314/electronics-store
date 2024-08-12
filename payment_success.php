<!-- ============================================== HEADER : START ============================================== -->
<?php include 'include/header.php'; ?>
<!-- ============================================== HEADER : END ============================================== -->

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 offset-md-2">

                <?php
                // print_r($_POST);

                require_once(__DIR__ . "/lib/SslCommerzNotification.php");
                include_once(__DIR__ . "/OrderTransaction.php");

                use SslCommerz\SslCommerzNotification;

                $sslc = new SslCommerzNotification();
                $tran_id = $_POST['tran_id'];
                $amount = $_POST['amount'];
                $currency = $_POST['currency'];

                $ot = new OrderTransaction();
                $sql = $ot->getRecordQuery($tran_id);
                $result = $db->query($sql);
                $row = $result->fetch_array(MYSQLI_ASSOC);

                if ($row['status'] == 'Pending' || $row['status'] == 'Processing') {
                    $validated = $sslc->orderValidate($_POST, $tran_id, $amount, $currency);

                    if ($validated) {
                        // Update the transaction status
                        $sql = $ot->updateTransactionQuery($tran_id, 'confirmed');
                        if ($db->query($sql) === TRUE) {

                            // Insert payment details into estore_payment table
                            $sql_payment = "INSERT INTO estore_payment (tran_id, bank_tran_id, card_type, status, tran_date) VALUES (
                                '" . $_POST['tran_id'] . "',
                                '" . $_POST['bank_tran_id'] . "',
                                '" . $_POST['card_type'] . "',
                                'Confirmed',
                                '" . $_POST['tran_date'] . "'
                            )";

                            if ($db->query($sql_payment) === TRUE) {
                                echo '<h2 class="text-center text-success">Congratulations! Your Transaction is Successful.</h2>';

                                // Delete all records related to the current user's ID
                                $user_id = mysql_qrow("select user_id from estore_orders as eo join estore_payment as ep where eo.transaction_id = ep.tran_id")['user_id'];
                                $sql_delete_cart = "DELETE FROM estore_cart WHERE user_id = $user_id";
                                if ($db->query($sql_delete_cart) !== TRUE) {
                                    echo '<h4 class="text-center text-warning">Warning: Unable to clear your cart. Please contact support.</h4>';
                                }
                            } else {
                                echo '<h2 class="text-center text-danger">Error saving payment information: ' . $db->error . '</h2>';
                            }
                ?>
                            <br>
                            <table border="1" class="table table-striped">
                                <thead class="thead-dark">
                                    <tr class="text-center">
                                        <th colspan="2">Payment Details</th>
                                    </tr>
                                </thead>
                                <tr>
                                    <td class="text-right">Transaction ID</td>
                                    <td><?= $_POST['tran_id'] ?></td>
                                </tr>
                                <tr>
                                    <td class="text-right">Transaction Time</td>
                                    <td><?= $_POST['tran_date'] ?></td>
                                </tr>
                                <tr>
                                    <td class="text-right">Payment Method</td>
                                    <td><?= $_POST['card_issuer'] ?></td>
                                </tr>
                                <tr>
                                    <td class="text-right">Bank Transaction ID</td>
                                    <td><?= $_POST['bank_tran_id'] ?></td>
                                </tr>
                                <tr>
                                    <td class="text-right">Amount</td>
                                    <td><?= $_POST['amount'] . ' ' . $_POST['currency'] ?></td>
                                </tr>
                            </table>

                <?php

                        } else {
                            echo '<h2 class="text-center text-danger">Error updating record: ' . $db->error . '</h2>';
                        }
                    } else {
                        echo '<h2 class="text-center text-danger">Payment was not valid. Please contact the merchant.</h2>';
                    }
                } else {
                    echo '<h2 class="text-center text-danger">Invalid Information.</h2>';
                }
                ?>

            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row justify-center"><a href="shop.php"><button class="btn btn-primary">Continue shopping</button></a></div>
    </div>
</body>
<br><br>

<!-- ============================================================= FOOTER ============================================================= -->
<?php include 'include/footer.php' ?>
<!-- ============================================================= FOOTER : END============================================================= -->