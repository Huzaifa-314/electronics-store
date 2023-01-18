<?php include 'include/header.php'; ?>
<?php include 'include/sidebar.php'; ?>
<?php include 'include/function.php';?>

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
                        <h5 class="card-title">Add New Category</h5>

                        <!-- add category form -->
                        <form class="row g-3" action="core/insert.php" method="post">
                            <div class="col-md-12">
                                <label for="">Category Name</label>
                                <input type="text" class="form-control" placeholder="Category Name" name="cat_name" >
                            </div>
                            <div class="col-md-12">
                                <label for="">Choose your Parent Category</label>
                                <select id="inputState" class="form-select" name="is_parent">
                                    <option selected="">No Parent Category</option>
                                    
                                    <?php
                                        $cateory_sql="SELECT * FROM estore_category WHERE is_parent = '0' ORDER BY c_name ASC";
                                        $category_res = mysqli_query($db,$cateory_sql);
                                        $serial=0;
                                        while($row = mysqli_fetch_assoc($category_res)){
                                            $cat_id = $row['ID'];
                                            $cat_name = $row['c_name'];
                                            ?><option value="<?php echo $cat_id;?>"><?php echo $cat_name;?></option><?php
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
                                <div id="img-preview" style="width: fit-content; height:fit-content;"></div>
                            </div>
                            <div class="">
                                <button type="submit" class="btn btn-primary" name="add_category">Add New Category</button>
                            </div>
                        </form><!-- End No Labels Form -->

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
                                $cateory_sql="SELECT * FROM estore_category WHERE is_parent = '0'";
                                $category_res = mysqli_query($db,$cateory_sql);
                                $serial=0;
                                while($row = mysqli_fetch_assoc($category_res)){
                                    $cat_id = $row['ID'];
                                    $cat_name = $row['c_name'];
                                    $cat_image = $row['c_image'];
                                    $cat_parent = $row['is_parent'];
                                    $cat_status = $row['c_status'];
                                    $serial++;

                                    $subCat_count_sql = "SELECT COUNT(ID) as subCat_count FROM estore_category WHERE is_parent='$cat_id'";
                                    $subCat_count_res = mysqli_query($db,$subCat_count_sql);
                                    $subCat_count=mysqli_fetch_assoc($subCat_count_res);
                                ?>
                                
                                <tr data-bs-toggle="collapse" data-bs-target="#cat<?php echo $cat_id;?>">
                                    <th scope="row"><?php echo $serial; ?></th>
                                    <td>
                                        <img src="../assets/images/products/category/<?php echo $cat_image;?>" width="40" alt="">
                                    </td>
                                    <td><?php echo $cat_name.' <span class="badge bg-secondary">'.$subCat_count['subCat_count'].' <i class="bi bi-caret-down-fill"></i></sapn>';?></td>
                                    <td>
                                        <?php 
                                        if($cat_status == 0){
                                            echo '<span class="badge bg-danger">Inactive</sapn>';
                                        }
                                        if($cat_status == 1){
                                            echo '<span class="badge bg-success">Active</sapn>'; 
                                        }    
                                        ?>
                                    </td>
                                    <td>
                                        <a href=""><i class="bi bi-pencil-square text-dark"></i></a>
                                        <a href=""><i class="bi bi-trash text-danger"></i></a>
                                        
                                    </td>
                                </tr>
                                <?php
                                    $sub_cat_sql = "SELECT * FROM estore_category WHERE is_parent='$cat_id'";
                                    $sub_cat_res = mysqli_query($db,$sub_cat_sql);
                                    while($row = mysqli_fetch_assoc($sub_cat_res)){
                                        $sub_cat_id = $row['ID'];
                                        $sub_cat_name = $row['c_name'];
                                        $sub_cat_image = $row['c_image'];
                                        $sub_cat_status = $row['c_status'];
                                        $is_parent = $row['is_parent'];
                                        ?>
                                            <tr id="cat<?php echo $is_parent;?>" class="table-primary collapse">
                                            <th scope="row"><?php echo '-'; ?></th>
                                            <td>
                                                <img src="../assets/images/products/category/<?php echo $sub_cat_image;?>" width="55" alt="">
                                            </td>
                                            <td><?php echo '<i class="bi bi-arrow-return-right"> </i>'.$sub_cat_name;?></td>
                                            <td>
                                                <?php 
                                                if($sub_cat_status == 0){
                                                    echo '<span class="badge bg-danger">Inactive</sapn>';
                                                }
                                                if($sub_cat_status == 1){
                                                    echo '<span class="badge bg-success">Active</sapn>'; 
                                                }    
                                                ?>
                                            </td>
                                            <td>
                                                <a href=""><i class="bi bi-pencil-square text-dark"></i></a>
                                                <a href=""><i class="bi bi-trash text-danger"></i></a>
                                                
                                            </td>
                                        </tr>
                                        <?php   
                                    }
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

</main><!-- End #main -->

<?php include 'include/footer.php'; ?>