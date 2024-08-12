

<?php


class OrderTransaction {

    public function getRecordQuery($tran_id)
    {
        $sql = "select * from estore_orders WHERE transaction_id='" . $tran_id . "'";
        return $sql;
    }

    public function saveTransactionQuery($post_data)
    {
        $name = $post_data['cus_name'];
        $email = $post_data['cus_email'];
        $phone = $post_data['cus_phone'];
        $transaction_amount = $post_data['total_amount'];
        $address = $post_data['cus_add1'];
        $transaction_id = $post_data['tran_id'];
        $currency = $post_data['currency'];
        $user_id = $post_data['user_id'];

        $sql = "INSERT INTO estore_orders (user_id, name, email, phone, amount, address, status, transaction_id,currency)
                                    VALUES ('$user_id', '$name', '$email', '$phone','$transaction_amount','$address','Pending', '$transaction_id','$currency')";

        return $sql;
    }

    public function updateTransactionQuery($tran_id, $type = 'Success')
    {
        $sql = "UPDATE estore_orders SET status='$type' WHERE transaction_id='$tran_id'";

        return $sql;
    }
}

