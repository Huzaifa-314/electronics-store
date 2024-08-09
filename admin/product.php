<?php include 'include/header.php'; ?>

<?php include 'include/sidebar.php'; ?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Product</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item active">Products</li>
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
                                        <th scope="col">Image</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Brand</th>
                                        <th scope="col">Qualtity</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $p_sql = "SELECT * FROM estore_product";
                                $p_res = mysqli_query($db, $p_sql);
                                $serial = 0;
                                while ($row = mysqli_fetch_assoc($p_res)) {
                                    $p_id = $row['ID'];
                                    $p_name=$row['p_name'];
                                    $p_small_desc = $row['p_short_desc'];
                                    $regular_price=$row['p_reg_price'];
                                    $offer_price=$row['p_sale_price'];
                                    $stock=$row['p_quantity'];
                                    $p_big_desc = $row['p_big_desc'];
                                    $p_category = $row['p_category'];
                                    $p_brand = $row['p_brand'];
                                    $p_featured_img = $row['p_featured_img'];
                                    $p_status=$row['p_status'];
                                    $serial++;
                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $serial ?></th>
                                        <td>
                                            <img src="assets/img/products/<?php echo $p_featured_img; ?>" width="40" alt="">
                                        </td>
                                        <td><?php echo $p_name ?></td>
                                        <td><?php if(empty($offer_price)){
                                            echo $regular_price;
                                        }else{
                                            echo '<s>'.$regular_price.'</s>'.'<br>&emsp;<span style="color:green; font-weight:bold;">'.$offer_price.'</span>';
                                        } ?></td>
                                        <td><?php 
                                            $row = mysqli_fetch_assoc(mysqli_query($db,"SELECT c_name,is_parent FROM estore_category where ID='$p_category'"));
                                            $p_sub_category_name = findval('c_name','estore_category','ID',$p_category);
                                            $p_category_id = findval('is_parent','estore_category','ID',$p_category);
                                            $p_category_name = findval('c_name','estore_category','ID',$p_category_id);
                                            echo $p_category_name.'<br>&emsp;<i class="bi bi-arrow-return-right"></i>'.$p_sub_category_name;

                                        ?></td>
                                        <td><?php 
                                            $brand_name = findval('b_name','estore_brand','ID',$p_brand);
                                            echo $brand_name;
                                        ?></td>
                                        <td><?php echo $stock;?></td>
                                        <td><?php
                                            if ($p_status == 0) {
                                                echo '<span class="badge bg-danger">Inactive</sapn>';
                                            }
                                            if ($p_status == 1) {
                                                echo '<span class="badge bg-success">Active</sapn>';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <a href="product.php?data=edit&editid=<?php echo $p_id ;?>"><i class="bi bi-pencil-square text-dark"></i></a>
                                            <a data-bs-toggle="modal" data-bs-target="#deleteModalid<?php echo $p_id; ?>" href=""><i class="bi bi-trash text-danger"></i></a>
                                            <!-- Delete Modal -->
                                            <div class="modal fade" id="deleteModalid<?php echo $p_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <div>Confirm Delete</div>
                                                            <!-- <h5 class="modal-title" id="exampleModalLabel"></h5> -->
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <h4 class="modal-body text-center m-4">
                                                            Do you want to delete "<?php echo $p_name; ?>" Product?
                                                        </h4>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                            <a href="product.php?data=delete&deleteid=<?php echo $p_id; ?>" class="btn btn-danger">Delete</a>
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
        if ($data == 'add') {
        ?>
            <form method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="mt-3 form-group mb-3">
                                    <label for="">Product Name</label>
                                    <input type="text" name="p_name" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Product Short Description</label>
                                    <input type="hidden" name="p_small_desc" id="p_small_desc">
                                    <div class="custom-quill-editor-default">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Regular Price</label>
                                        <input type="text" class="form-control" name="regular_price">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Offer Price</label>
                                        <input type="text" class="form-control" name="offer_price">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Stock</label>
                                        <input type="text" class="form-control" name="stock">
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Product Big Description</label>
                                    <input type="hidden" name="p_big_desc" id="p_big_desc">
                                    <div class="custom-quill-editor-full" style="overflow-y: scroll; min-height: 200px;">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="mt-3 form-group mb-3">
                                    <label for="">Choose Category</label>
                                    <select id="p_catagory_ajax" class="form-select" name="p_category" onclick="fetch_sub_cat();">
                                        <?php
                                        $cateory_sql = "SELECT * FROM estore_category WHERE is_parent = '0' AND c_status='1' ORDER BY c_name ASC";
                                        $category_res = mysqli_query($db, $cateory_sql);
                                        $serial = 0;
                                        while ($row = mysqli_fetch_assoc($category_res)) {
                                            $cat_id = $row['ID'];
                                            $cat_name = $row['c_name'];
                                        ?><option value="<?php echo $cat_id; ?>"><?php echo $cat_name; ?></option><?php
                                                                                                                        }
                                                                                                                            ?>

                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Choose Sub-Category</label>
                                    <select class="form-select" name="p_sub_category" id="fetched_sub">
                                        <option value="">Choose Sub category</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Choose Brand</label>
                                    <select class="form-select" name="p_brand">
                                        <?php
                                        $brand_sql = "SELECT * FROM estore_brand WHERE b_status='1' ORDER BY b_name ASC";
                                        $brand_res = mysqli_query($db, $brand_sql);
                                        $serial = 0;
                                        while ($row = mysqli_fetch_assoc($brand_res)) {
                                            $b_id = $row['ID'];
                                            $b_name = $row['b_name'];
                                        ?><option value="<?php echo $b_id; ?>"><?php echo $b_name; ?></option><?php
                                                                                                                    }
                                                                                                                        ?>

                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Choose Featured image</label>
                                    <input type="file" id="choose-file" class="form-control" name="choose-file" accept="image/*" placeholder="Choose File">
                                    <?php echo $p_featured_img_err; ?>
                                    <div id="img-preview" style="width: fit-content; height:fit-content;"></div>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Choose Gallery image</label>
                                    <input type="file" id="choose-multi-file" class="form-control" name="gallery[]" accept="image/*" placeholder="Choose File" multiple>
                                    <?php echo $p_gallery_image_err; ?>
                                    <div id="multi-img-preview" style="width: fit-content; height:fit-content;"></div>
                                </div>
                                <div class="">
                                    <button type="submit" class="quillAncor btn btn-md btn-lg btn-primary mt-3" name="add_product">Publish</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        <?php
        }
        if ($data == 'edit') {
            if(isset($_GET['editid'])){
                $editid= $_GET['editid'];
                $p_edit_sql = "SELECT * FROM estore_product where ID='$editid'";
                $p_edit_res = mysqli_query($db, $p_edit_sql);
                $row = mysqli_fetch_assoc($p_edit_res);
                $p_edit_name=$row['p_name'];
                $p_edit_small_desc = $row['p_short_desc'];
                $edit_regular_price=$row['p_reg_price'];
                $edit_offer_price=$row['p_sale_price'];
                $edit_stock=$row['p_quantity'];
                $p_edit_big_desc = $row['p_big_desc'];
                $p_edit_category = $row['p_category'];
                $p_edit_brand = $row['p_brand'];
                $p_edit_featured_img = $row['p_featured_img'];
                $p_edit_status=$row['p_status'];
                ?>
                    <form method="POST" enctype="multipart/form-data" action="product.php?data=update">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mt-3 form-group mb-3">
                                            <label for="">Product Name</label>
                                            <input type="text" name="p_name" class="form-control" value="<?php echo $p_edit_name;?>">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="form-label">Product Short Description</label>
                                            <input type="hidden" id="p_ajax_p_category" value="<?php echo $p_edit_category?>">
                                            <input type="hidden" name="p_small_desc" id="p_small_desc">
                                            <div class="custom-quill-editor-default">
                                                <?php echo $p_edit_small_desc ?>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label class="form-label">Regular Price</label>
                                                <input type="text" class="form-control" name="regular_price" value="<?php echo $edit_regular_price; ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Offer Price</label>
                                                <input type="text" class="form-control" name="offer_price" value="<?php echo $edit_offer_price; ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Stock</label>
                                                <input type="text" class="form-control" name="stock" value="<?php echo $edit_stock; ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Status</label>
                                                <select name="product_status" id="" class="form-select">
                                                    <option value="1" <?php if($p_edit_status==1)echo 'selected'; ?>>Active</option>
                                                    <option value="0" <?php if($p_edit_status==0)echo 'selected'; ?>>Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="form-label">Product Big Description</label>
                                            <input type="hidden" name="p_big_desc" id="p_big_desc">
                                            <div class="custom-quill-editor-full" style="overflow-y: scroll; min-height: 200px;">
                                                <?php echo $p_edit_big_desc;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mt-3 form-group mb-3">
                                            <label for="">Choose Category</label>
                                            <select id="p_catagory_ajax" class="form-select" onclick="fetch_sub_cat();">
                                                <?php
                                                
                                                $cateory_sql = "SELECT * FROM estore_category WHERE is_parent = '0' AND c_status='1' ORDER BY c_name ASC";
                                                $category_res = mysqli_query($db, $cateory_sql);

                                                $p_edit_parent_category_id = findval('is_parent','estore_category','ID',$p_edit_category);
                                                $p_parent_category_name = findval('C_name','estore_category','ID',$p_edit_parent_category_id);
                                                $serial = 0;
                                                while ($row = mysqli_fetch_assoc($category_res)) {
                                                    $cat_id = $row['ID'];
                                                    $cat_name = $row['c_name'];
                                                ?><option value="<?php echo $cat_id; ?>" <?php if($cat_id==$p_edit_parent_category_id){
                                                    echo 'selected';
                                                }?>><?php echo $cat_name; ?></option><?php
                                                }?>

                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="">Choose Sub-Category</label>
                                            <select class="form-select" name="p_category" id="fetched_sub">
                                                <option value="">Choose Sub category</option>
                                                
                                                
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="">Choose Brand</label>
                                            <select class="form-select" name="p_brand">
                                                <?php
                                                $brand_sql = "SELECT * FROM estore_brand WHERE b_status='1' ORDER BY b_name ASC";
                                                $brand_res = mysqli_query($db, $brand_sql);
                                                $serial = 0;
                                                while ($row = mysqli_fetch_assoc($brand_res)) {
                                                    $b_id = $row['ID'];
                                                    $b_name = $row['b_name'];
                                                ?><option value="<?php echo $b_id; ?>" <?php if($b_id==$p_edit_brand){
                                                    echo 'selected';
                                                }?>><?php echo $b_name; ?></option><?php
                                                                                                                            }
                                                                                                                                ?>

                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                        <?php 
                                            if(empty($p_edit_featured_img)){
                                                echo '<div class="alert alert-danger">No image found</div>';
                                            }
                                            else{
                                                ?>
                                                    <img src="assets/img/products/<?php echo $p_edit_featured_img;?>" width="50%" alt=""><br>
                                                <?php
                                            }
                                        ?>
                                            <label for="">Choose Featured image</label>
                                            <input type="file" id="choose-file" class="form-control" name="choose-file" accept="image/*" placeholder="Choose File">
                                            <?php echo $p_featured_img_err; ?>
                                            <div id="img-preview" style="width: fit-content; height:fit-content;"></div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="">Choose Gallery image</label>
                                            <input type="file" id="choose-multi-file" class="form-control" name="files" accept="image/*" placeholder="Choose File" multiple>
                                            <?php echo $imgErr; ?>
                                            <div id="multi-img-preview" style="width: fit-content; height:fit-content;"></div>
                                        </div>
                                        <div class="">
                                            <input type="hidden" class="form-control" value="<?php echo $editid;?>" name="editid">
                                            <button type="submit" class="quillAncor btn btn-md btn-lg btn-primary mt-3" name="update_product">Update Product Information</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                <?php
            }
        }
        if ($data == 'update') {
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $update_editid = $_POST['editid'];
                $update_p_name=$_POST['p_name'];
                $update_p_small_desc = mysqli_real_escape_string($db, $_POST['p_small_desc']);
                $update_regular_price=$_POST['regular_price'];
                $update_offer_price=$_POST['offer_price'];
                $update_stock=$_POST['stock'];
                $update_p_big_desc = mysqli_real_escape_string($db, $_POST['p_big_desc']);
                $update_p_category = $_POST['p_category'];
                $update_p_brand = $_POST['p_brand'];
                $update_p_status = $_POST['product_status'];
                $update_file_name= $_FILES['choose-file']['name'];
                $update_tmp_path = $_FILES['choose-file']['tmp_name'];

                if(!empty($update_file_name)){
                    $file = is_img($update_file_name);
            
                    if($file){
            
                        delete_file('p_featured_img','estore_product','ID',$update_editid,'assets/img/products/');
            
                        $updatedname = rand().$update_file_name;
                        move_uploaded_file($update_tmp_path, 'assets/img/products/'.$updatedname);
                        $update_sql = "UPDATE estore_product SET p_name='$update_p_name',p_category = '$update_p_category', p_brand ='$update_p_brand',p_reg_price='$update_regular_price',p_sale_price='$update_offer_price',p_featured_img='$updatedname',p_short_desc='$update_p_small_desc',p_big_desc='$update_p_big_desc',p_quantity='$update_stock',p_status='$update_p_status' WHERE ID='$update_editid'";
                    }else{
                        echo 'not an image';
                    }
                }else{
                    $update_sql = "UPDATE estore_product SET p_name='$update_p_name',p_category = '$update_p_category', p_brand ='$update_p_brand',p_reg_price='$update_regular_price',p_sale_price='$update_offer_price',p_short_desc='$update_p_small_desc',p_big_desc='$update_p_big_desc',p_quantity='$update_stock',p_status='$update_p_status' WHERE ID='$update_editid'";
                }
                $update_sql_res = mysqli_query($db, $update_sql);
                if($update_sql_res){
                    header('location: product.php');
                }else{
                    die('product update error!'.mysqli_error($db));
                }
            }
        }
        if ($data == 'delete') {    
            if(isset($_GET['deleteid'])){
                $delete_id = $_GET['deleteid'];
                delete_file('p_featured_img','estore_product','ID',$delete_id,'assets/img/products/');
                deleterec('estore_product','ID',$delete_id,'product.php?data=view');
            }
        }

        ?>
    </section>
    <?php echo $debugging; ?>
</main>
<?php include 'include/footer.php'; ?>