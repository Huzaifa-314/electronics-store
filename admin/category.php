<?php include 'include/header.php'; ?>
<?php include 'include/sidebar.php'; ?>


<main id="main" class="main">

    <div class="pagetitle">
        <h1>Product Category</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Category</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-4">
                <!-- add new category -->
                <div class="card">
                    <div class="card-body">


                        <?php 
                            if(isset($_GET['editid'])){
                                $editid=$_GET['editid'];

                                $cateory_sql = "SELECT * FROM estore_category WHERE ID = '$editid'";
                                $category_res = mysqli_query($db, $cateory_sql);
                                while ($row = mysqli_fetch_assoc($category_res)) {
                                    $ecat_id = $row['ID'];
                                    $ecat_name = $row['c_name'];
                                    $ecat_image = $row['c_image'];
                                    $ecat_parent = $row['is_parent'];
                                    $ecat_status = $row['c_status'];
                                }
                                ?>
                                    <h5 class="card-title">Update Category</h5>
                                    <!-- update category form -->
                                    <form class="row g-3" method="post" action="core/update.php" enctype="multipart/form-data">
                                        <div class="col-md-12">
                                            <label for="">Category Name</label>
                                            <input type="text" value="<?php echo $ecat_name;?>" class="form-control" placeholder="Category Name" name="cat_name" required>
                                            <?php echo $nameErr;?>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="">Choose your Parent Category</label>
                                            <select id="inputState" class="form-select" name="is_parent">
                                                <option selected="">No Parent Category</option>

                                                <?php
                                                $cateory_sql = "SELECT * FROM estore_category WHERE is_parent = '0' ORDER BY c_name ASC";
                                                $category_res = mysqli_query($db, $cateory_sql);
                                                $serial = 0;
                                                while ($row = mysqli_fetch_assoc($category_res)) {
                                                    $cat_id = $row['ID'];
                                                    $cat_name = $row['c_name'];
                                                    $cat_parent = $row['is_parent'];
                                                ?><option value="<?php echo $cat_id; ?>" <?php if($ecat_parent==$cat_id)echo "selected";?>><?php echo $cat_name; ?></option><?php
                                                }
                                            ?>
                                                <!-- <option>Robotics</option>
                                                <option>Sensor</option>
                                                <option>Microcontroller</option>
                                                <option>Accessories</option>
                                                <option>Basic Components</option>
                                                <option>Kits</option> -->
                                            </select>
                                        </div>
                                        <div class="col-lg-12">
                                            <label for="">Change Category Status</label>
                                            <select name="cat_status" id="" class="form-select">
                                                <option value="1" <?php if($ecat_status==1)echo 'selected'; ?>>Active</option>
                                                <option value="0" <?php if($ecat_status==0)echo 'selected'; ?>>Inactive</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <?php 
                                                if(empty($ecat_image)){
                                                    echo '<div class="alert alert-danger">No image found</div>';
                                                }
                                                else{
                                                    ?>
                                                        <img src="assets/img/products/category/<?php echo $ecat_image;?>" width="50" alt=""><br>
                                                    <?php
                                                }
                                            ?>
                                            <label for="">Choose category image</label>
                                            <input type="file" id="choose-file" class="form-control" name="choose-file" accept="image/*" placeholder="Choose File">
                                            <div id="img-preview" style="width: fit-content; height:fit-content;"></div>
                                        </div>
                                        <div class="">
                                            <input name="editid" value="<?php echo $ecat_id; ?>" type="hidden">
                                            <button type="submit" class="btn btn-primary" name="update_category">Update Category</button>
                                        </div>
                                    </form><!-- End No Labels Form -->
                                <?php

                            }
                            else{
                                ?>
                                    <h5 class="card-title">Add New Category</h5>
                                    <!-- add category form -->
                                    <form class="row g-3" method="post" enctype="multipart/form-data">
                                        <div class="col-md-12">
                                            <label for="">Category Name</label>
                                            <input type="text" class="form-control" placeholder="Category Name" name="cat_name" required>
                                            <?php echo $nameErr;?>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="">Choose your Parent Category</label>
                                            <select id="inputState" class="form-select" name="is_parent">
                                                <option selected="">No Parent Category</option>

                                                <?php
                                                $cateory_sql = "SELECT * FROM estore_category WHERE is_parent = '0' ORDER BY c_name ASC";
                                                $category_res = mysqli_query($db, $cateory_sql);
                                                $serial = 0;
                                                while ($row = mysqli_fetch_assoc($category_res)) {
                                                    $cat_id = $row['ID'];
                                                    $cat_name = $row['c_name'];
                                                ?><option value="<?php echo $cat_id; ?>"><?php echo $cat_name; ?></option><?php
                                                }
                                            ?>
                                                <!-- <option>Robotics</option>
                                                <option>Sensor</option>
                                                <option>Microcontroller</option>
                                                <option>Accessories</option>
                                                <option>Basic Components</option>
                                                <option>Kits</option> -->
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="">Choose category image</label>
                                            <input type="file" id="choose-file" class="form-control" name="choose-file" accept="image/*" placeholder="Choose File">
                                            <?php echo $imgErr;?>
                                            <div id="img-preview" style="width: fit-content; height:fit-content;"></div>
                                        </div>
                                        <div class="">
                                            <button type="submit" class="btn btn-primary" name="add_category">Add New Category</button>
                                        </div>
                                    </form><!-- End No Labels Form -->
                                <?php
                            }
                        
                        ?>
                        

                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <!-- all category table -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">All Categories</h5>

                        <!-- Table with hoverable rows -->
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Category name</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $cateory_sql = "SELECT * FROM estore_category WHERE is_parent = '0'";
                                $category_res = mysqli_query($db, $cateory_sql);
                                $serial = 0;
                                while ($row = mysqli_fetch_assoc($category_res)) {
                                    $cat_id = $row['ID'];
                                    $cat_name = $row['c_name'];
                                    $cat_image = $row['c_image'];
                                    $cat_parent = $row['is_parent'];
                                    $cat_status = $row['c_status'];
                                    $serial++;

                                    $subCat_count_sql = "SELECT COUNT(ID) as subCat_count FROM estore_category WHERE is_parent='$cat_id'";
                                    $subCat_count_res = mysqli_query($db, $subCat_count_sql);
                                    $subCat_count = mysqli_fetch_assoc($subCat_count_res);
                                ?>

                                    <tr>
                                        <!--  -->
                                        <th scope="row"><?php echo $serial; ?></th>
                                        <td>
                                            <img src="assets/img/products/category/<?php echo $cat_image; ?>" width="40" alt="">
                                        </td>
                                        <td><?php echo $cat_name . ' <span class="badge bg-secondary">' . $subCat_count['subCat_count'] . ' <i class="bi bi-caret-down-fill"></i></sapn>'; ?></td>
                                        <!--  data-bs-toggle="collapse" data-bs-target="#cat<?php //echo $cat_id; ?>" -->
                                        <td>
                                            <?php
                                            if ($cat_status == 0) {
                                                echo '<span class="badge bg-danger">Inactive</sapn>';
                                            }
                                            if ($cat_status == 1) {
                                                echo '<span class="badge bg-success">Active</sapn>';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <a href="category.php?editid=<?php echo $cat_id ;?>"><i class="bi bi-pencil-square text-dark"></i></a>
                                            <a data-bs-toggle="modal" data-bs-target="#deleteModalid<?php echo $cat_id; ?>" href=""><i class="bi bi-trash text-danger"></i></a>
                                            <!-- Delete Modal -->
                                            <div class="modal fade" id="deleteModalid<?php echo $cat_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <div>Confirm Delete</div>
                                                            <!-- <h5 class="modal-title" id="exampleModalLabel"></h5> -->
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <h4 class="modal-body text-center m-4">
                                                            Do you want to delete "<?php echo $cat_name; ?>" category?
                                                        </h4>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                            <a href="category.php?deleteid=<?php echo $cat_id; ?>" class="btn btn-danger">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                    <?php

                                    //find sub category
                                    show_sub_category($cat_id);
                                }
                                ?>

                            </tbody>
                        </table>
                        <!-- End Table with hoverable rows -->

                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    if (isset($_GET['deleteid'])) {
        $deleteid = $_GET['deleteid'];
        deleterec('estore_category', 'ID', $deleteid,"category.php");
    }
    ?>
    <?php echo $debugging; ?>
</main><!-- End #main -->


<?php include 'include/footer.php'; ?>