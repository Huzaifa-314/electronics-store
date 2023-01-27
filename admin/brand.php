<?php include 'include/header.php'; ?>

<?php include 'include/sidebar.php'; ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item active">Brand</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
      <div class="col-lg-4">
        <!-- add new Brand -->
        <div class="card">
          <div class="card-body">


            <?php
            if (isset($_GET['editid'])) {
              $editid = $_GET['editid'];

              $brand_sql = "SELECT * FROM estore_brand WHERE ID = '$editid'";
              $brand_res = mysqli_query($db, $brand_sql);
              while ($row = mysqli_fetch_assoc($brand_res)) {
                $eb_id = $row['ID'];
                $eb_name = $row['b_name'];
                $eb_image = $row['b_image'];
                $eb_status = $row['b_status'];
              }
            ?>
              <h5 class="card-title">Update Brand</h5>
              <!-- update brand form -->
              <form class="row g-3" method="post" action="core/update.php" enctype="multipart/form-data">
                <div class="col-md-12">
                  <label for="">Brand Name</label>
                  <input type="text" value="<?php echo $eb_name; ?>" class="form-control" placeholder="Brand Name" name="b_name" required>
                  <?php echo $nameErr; ?>
                </div>
                <div class="col-lg-12">
                  <label for="">Change Brand Status</label>
                  <select name="b_status" id="" class="form-select">
                    <option value="1" <?php if ($eb_status == 1) echo 'selected'; ?>>Active</option>
                    <option value="0" <?php if ($eb_status == 0) echo 'selected'; ?>>Inactive</option>
                  </select>
                </div>
                <div class="col-md-12">
                  <?php
                  if (empty($eb_image)) {
                    echo '<div class="alert alert-danger">No image found</div>';
                  } else {
                  ?>
                    <img src="assets/img/products/brand/<?php echo $eb_image; ?>" width="50" alt=""><br>
                  <?php
                  }
                  ?>
                  <label for="">Choose Brand image</label>
                  <input type="file" id="choose-file" class="form-control" name="choose-file" accept="image/*" placeholder="Choose File">
                  <div id="img-preview" style="width: fit-content; height:fit-content;"></div>
                </div>
                <div class="">
                  <input name="editid" value="<?php echo $eb_id; ?>" type="hidden">
                  <button type="submit" class="btn btn-primary" name="update_brand">Update Brand</button>
                </div>
              </form><!-- End No Labels Form -->
            <?php

            } else {
            ?>
              <h5 class="card-title">Add New Brand</h5>
              <!-- add brand form -->
              <form class="row g-3" method="post" enctype="multipart/form-data">
                <div class="col-md-12">
                  <label for="">Brand Name</label>
                  <input type="text" class="form-control" placeholder="Brand Name" name="brand_name" required>
                  <?php echo $nameErr; ?>
                </div>
                <div class="col-md-12">
                  <label for="">Choose Brand image</label>
                  <input type="file" id="choose-file" class="form-control" name="choose-file" accept="image/*" placeholder="Choose File">
                  <?php echo $imgErr; ?>
                  <div id="img-preview" style="width: fit-content; height:fit-content;"></div>
                </div>
                <div class="">
                  <button type="submit" class="btn btn-primary" name="add_brand">Add New Brand</button>
                </div>
              </form><!-- End No Labels Form -->
            <?php
            }

            ?>


          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <!-- all brand table -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">All Brands</h5>

            <!-- Table with hoverable rows -->
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Image</th>
                  <th scope="col">Brand name</th>
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $brand_sql = "SELECT * FROM estore_brand";
                $brand_res = mysqli_query($db, $brand_sql);
                $serial = 0;
                while ($row = mysqli_fetch_assoc($brand_res)) {
                  $b_id = $row['ID'];
                  $b_name = $row['b_name'];
                  $b_image = $row['b_image'];
                  $b_status = $row['b_status'];
                  $serial++;
                ?>

                  <tr>
                    <!--  -->
                    <th scope="row"><?php echo $serial; ?></th>
                    <td>
                      <img src="assets/img/products/brand/<?php echo $b_image; ?>" width="40" alt="">
                    </td>
                    <td><?php echo $b_name ;?></td>
                    <!--  data-bs-toggle="collapse" data-bs-target="#b<?php //echo $b_id; ?>" -->
                    <td>
                      <?php
                      if ($b_status == 0) {
                        echo '<span class="badge bg-danger">Inactive</sapn>';
                      }
                      if ($b_status == 1) {
                        echo '<span class="badge bg-success">Active</sapn>';
                      }
                      ?>
                    </td>
                    <td>
                      <a href="brand.php?editid=<?php echo $b_id; ?>"><i class="bi bi-pencil-square text-dark"></i></a>
                      <a data-bs-toggle="modal" data-bs-target="#deleteModalid<?php echo $b_id; ?>" href=""><i class="bi bi-trash text-danger"></i></a>
                      <!-- Delete Modal -->
                      <div class="modal fade" id="deleteModalid<?php echo $b_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <div>Confirm Delete</div>
                              <!-- <h5 class="modal-title" id="exampleModalLabel"></h5> -->
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <h4 class="modal-body text-center m-4">
                              Do you want to delete "<?php echo $b_name; ?>" brand?
                            </h4>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                              <a href="brand.php?deleteid=<?php echo $b_id; ?>" class="btn btn-danger">Delete</a>
                            </div>
                          </div>
                        </div>
                      </div>

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

                delete_file('b_image','estore_brand','ID',$delete_id,'assets/img/products/brand/');

                deleterec('estore_brand','ID',$delete_id,'brand.php');

              }

              ?>

          </div>
        </div>
      </div>
    </div>


  </section>

</main><!-- End #main -->

<?php include 'include/footer.php'; ?>