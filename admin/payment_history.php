<?php include 'include/header.php'; ?>

<?php include 'include/sidebar.php'; ?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Payment History</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item active">Payment History</li>
            </ol>
        </nav>
    </div>
    <section class="section">

        <?php
        $data = isset($_GET['data']) ? $_GET['data'] : 'view';
        if ($data == 'view') {
        ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card" style="width: fit-content; margin-right:40px;">
                        <div class="card-body">
                            <h5 class="card-title">All Payments</h5>
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Transaction ID</th>
                                        <th scope="col">Bank transaction ID</th>
                                        <th scope="col">Card Type</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Transaction Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $payment_sql = "SELECT * FROM estore_payment";
                                $payment_res = mysqli_query($db, $payment_sql);
                                $serial = 0;
                                while ($row = mysqli_fetch_assoc($payment_res)) {
                                    extract($row, EXTR_PREFIX_ALL, "payment");
                                    $serial++;
                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $serial ?></th>
                                        <td><?php echo $payment_tran_id ?></td>
                                        <td><?php echo $payment_bank_tran_id ?></td>
                                        <td><?php echo $payment_card_type ?></td>
                                        <td><?php echo $payment_status ?></td>
                                        <td><?php echo $payment_tran_date ?></td>
                                        <td>
                                            <a data-bs-toggle="modal" data-bs-target="#deleteModalid<?php echo $payment_id; ?>" href=""><i class="bi bi-trash text-danger"></i></a>
                                            <!-- Delete Modal -->
                                            <div class="modal fade" id="deleteModalid<?php echo $payment_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <div>Confirm Delete</div>
                                                            <!-- <h5 class="modal-title" id="exampleModalLabel"></h5> -->
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <h4 class="modal-body text-center m-4">
                                                            Do you want to delete this payment history?
                                                        </h4>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                            <a href="payment_history.php?data=delete&deleteid=<?php echo $payment_id; ?>" class="btn btn-danger">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                <?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        
        if ($data == 'delete') {    
            if(isset($_GET['deleteid'])){
                $delete_id = $_GET['deleteid'];
                deleterec('estore_payment','ID',$delete_id,'payment_history.php?data=view');
            }
        }

        ?>
    </section>
    <?php echo $debugging; ?>
</main>
<?php include 'include/footer.php'; ?>