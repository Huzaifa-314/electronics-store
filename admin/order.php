<?php include 'include/header.php'; ?>

<?php include 'include/sidebar.php'; ?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Orders</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item active">Orders</li>
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
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">All Products</h5>
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Products</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Transaction ID</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $order_sql = "SELECT * FROM estore_orders";
                                $order_res = mysqli_query($db, $order_sql);
                                $serial = 0;
                                while ($row = mysqli_fetch_assoc($order_res)) {
                                    extract($row, EXTR_PREFIX_ALL, "order");
                                    $serial++;
                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $serial ?></th>
                                        <td><?php echo $order_name ?></td>
                                        <td><?php echo $order_email ?></td>
                                        <td><?php echo $order_phone ?></td>
                                        <td>
                                            <ol>
                                            <?php
                                                $order_product_res = mysql_qres("select * from estore_order_items as oi join estore_product as p on oi.product_id=p.id where order_id = $order_id");
                                                while ($order_product_row = mysqli_fetch_assoc($order_product_res)) {
                                                    extract($order_product_row, EXTR_PREFIX_ALL, "order_product");
                                                ?>
                                                    <li class="cart-product-name-info">
                                                        <p class='cart-product-description'><a href="../product_single.php?id=<?php echo $order_product_product_id; ?>"><?php echo $order_product_p_name; ?></a></p>
                                                    </li>
                                                <?php
                                                }
                                            ?>
                                            </ol>
                                        </td>
                                        <td><?php echo $order_amount ?></td>
                                        <td><?php echo $order_address ?></td>
                                        <td><?php echo $order_status ?></td>
                                        <td><?php echo $order_transaction_id ?></td>
                                        <td>
                                            <a data-bs-toggle="modal" data-bs-target="#deleteModalid<?php echo $order_id; ?>" href=""><i class="bi bi-trash text-danger"></i></a>
                                            <!-- Delete Modal -->
                                            <div class="modal fade" id="deleteModalid<?php echo $order_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <div>Confirm Delete</div>
                                                            <!-- <h5 class="modal-title" id="exampleModalLabel"></h5> -->
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <h4 class="modal-body text-center m-4">
                                                            Do you want to delete this order?
                                                        </h4>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                            <a href="order.php?data=delete&deleteid=<?php echo $order_id; ?>" class="btn btn-danger">Delete</a>
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
                deleterec('estore_orders','ID',$delete_id,'order.php?data=view');
            }
        }

        ?>
    </section>
    <?php echo $debugging; ?>
</main>
<?php include 'include/footer.php'; ?>