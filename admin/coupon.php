<?php include 'include/header.php'; ?>

<?php include 'include/sidebar.php'; ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item active">Coupon</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
      <div class="col-lg-4">
        <!-- add new coupon -->
        <div class="card">
          <div class="card-body">
              <h5 class="card-title">Set Coupon</h5>
              <!-- add coupon form -->
              <form class="row g-3" method="post" enctype="multipart/form-data">
              <label for="" class="mb-0">Coupon Name</label>
                <div class="col-md-8 mt-0">
                  <input class="form-control" name="coupon_code" id="showrand" type="text">
                  <!-- <input id="randomcouponcode" type="text" class="form-control" placeholder="coupon Name" > -->
                  <?php echo $nameErr; ?>
                </div>
                <div class="col-md-4 mt-0">
                  <!-- <button class="btn btn-success" onclick='genrand(this)'>Generate</button> -->
                  <input type="button" class="btn btn-success" value="Generate" onClick="javascript:rand()">
                </div>
                <div class="col-md-12 form-group">
                  <label for="">Enter Discount Amount</label>
                  <input type="text" class="form-control" name="amount" placeholder="Enter Amount">
                </div>
                <div class=" col-md-12 form-group">
                  <label for="">Select Discount Type</label>
                  <select name="discount_type" id="" class="form-control">
                    <option value="0">Flat Discount</option>
                    <option value="1">Persentage Discount(%)</option>
                  </select>
                </div>
                <div class="col-md-6 form-group">
                  <label for="">Starting Date</label>
                  <input name="starting_date"  type="date" class="form-control" >
                </div>
                <div class="col-md-6 form-group">
                  <label for="">Ending Date</label>
                  <input type="date" class="form-control" name="expired_date">
                </div>
                <div class="col-md-12 form-group">
                  <label for="">Discount On</label>
                  <select name="dis_on_type" id="" class="form-control" onchange="showList(this.value)">
                    <option>Select From Here...</option>
                    <option value="0">Specific Product</option>
                    <option value="1">Specific Category</option>
                    <option value="2">Specific Brand</option>
                    <option value="3">All products</option>
                  </select>
                </div>
                <div class="col-md-12 form-group" id="showDiscountOnList">
            
                </div>
                
                <div class="">
                  <button type="submit" class="btn btn-primary" name="add_coupon">Add New coupon</button>
                </div>
              </form><!-- End No Labels Form -->


          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <!-- all coupon table -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">All coupons</h5>

            <!-- Table with hoverable rows -->
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">coupon Code</th>
                  <th scope="col">Starting</th>
                  <th scope="col">Ending</th>
                  <th scope="col">Discount On</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
              <?php 

                $serial = 0;

                $all_coupons = "SELECT * FROM estore_coupon";
                $all_coupons_res = mysqli_query($db,$all_coupons);

                while($row = mysqli_fetch_assoc($all_coupons_res)){
                  $ID             = $row['ID'];
                  $coupon         = $row['coupon'];
                  $amount         = $row['amount'];
                  $dis_type       = $row['dis_type'];
                  $starting_date  = $row['starting_date'];
                  $expire_date    = $row['expire_date'];
                  $dis_on_type    = $row['dis_on_type'];
                  $discount_on    = $row['discount_on'];
                  $serial++;
                  ?>
                  <tr>
                    <td><?php echo $serial;?></td>
                    <td>
                      <?php 
                      if($dis_type == 1){
                        $type = '%';
                      }
                      if($dis_type == 0){
                        $type = 'flat';
                      }
                        echo $coupon.'('.$type.')';
                        ?>
                    </td>
                    <td><?php echo $starting_date;?></td>
                    <td><?php echo $expire_date;?></td>
                    <td>
                      <?php 
                      if($dis_on_type == 0){
                        echo '<span class="badge bg-success">Specific Product</span>';
                      }
                      if($dis_on_type == 1){
                        echo '<span class="badge bg-success">Category</span>';
                      }
                      if($dis_on_type == 2){
                        echo '<span class="badge bg-success">Brand</span>';
                      }
                      if($dis_on_type == 3){
                        echo '<span class="badge bg-success">All Products</span>';
                      }
                      ?>
                    </td>
                    <td>
                      <a href="coupon.php?delete_id=<?php echo $ID;?>"><i class="bi bi-trash text-danger"></i></a>
                    </td>
                  </tr>
                  <?php
                }

                ?>

              </tbody>
            </table>
            <!-- End Table with hoverable rows -->

            <?php 

              if(isset($_GET['deleteid'])){
                $delete_id = $_GET['deleteid'];

                delete_file('b_image','estore_coupon','ID',$delete_id,'assets/img/products/coupon/');

                deleterec('estore_coupon','ID',$delete_id,'coupon.php');

              }

              ?>

          </div>
        </div>
      </div>
    </div>
  </section>
  <?php echo $debugging; ?>
  <?php 

        if(isset($_GET['delete_id'])){
            $delid = $_GET['delete_id'];
            deleterec('estore_coupon','ID',$delid,'coupon.php');
        }
    
    ?>

</main><!-- End #main -->


<?php include 'include/footer.php'; ?>