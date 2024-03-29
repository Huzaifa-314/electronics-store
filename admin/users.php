<?php include 'include/header.php'; ?>
<?php include 'include/sidebar.php'; ?>
<?php

  if(!is_admin($_SESSION['userrole'])){
    header('location: dashboard.php');
  }

?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
        <li class="breadcrumb-item active">Users</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section dashboard">
    <!-- your main code here -->
    <?php
    $data = isset($_GET['data']) ? $_GET['data'] : 'view';
    if ($data == 'view') {
      ?>
      <div class="row">
          <div class="col-lg-12">
              <div class="card">
                  <div class="card-body">
                      <h5 class="card-title">All Users</h5>
                      <table class="table datatable">
                          <thead>
                              <tr>
                                  <th scope="col">No</th>
                                  <th scope="col">Image</th>
                                  <th scope="col">Name</th>
                                  <th scope="col">Email</th>
                                  <th scope="col">Phone</th>
                                  <th scope="col">Address</th>
                                  <th scope="col">Status</th>
                                  <th scope="col">Action</th>
                              </tr>
                          </thead>
                          <tbody>
                          <?php 

                        $serial = 0;
                        $users = mysqli_query($db,"SELECT * FROM estore_user");
                        while($row = mysqli_fetch_assoc($users)){
                            $id             = $row['ID'];
                            $firstname      = $row['firstname'];
                            $lastname       = $row['lastname'];
                            $username       = $row['username'];
                            $email          = $row['email'];
                            $pass           = $row['pass'];
                            $address        = $row['address'];
                            $photo          = $row['photo'];
                            $phone          = $row['phone'];
                            $status          = $row['status'];

                            $serial++;
                            ?>
                            <tr>
                              <td><?php echo $serial;?></td>
                              <td>
                                <?php 
                            if(empty($photo)){
                                ?>
                                <img src="assets/img/users/defaultuser.png" width="50"/>
                                <?php
                            }else{
                                ?>
                                <img src="assets/img/users/<?php echo $photo;?>" width="50">
                                <?php
                            }
                            ?>
                              </td>
                              <td><?php echo $username;?></td>
                              <td><?php echo $email;?></td>
                              <td><?php echo $phone;?></td>
                              <td><?php echo $address;?></td>
                              <td>
                                <?php 
                            if($status == 1){
                                echo '<span class="badge bg-success">Active</span>';
                            }else{
                                echo '<span class="badge bg-danger">Inactive</span>'; 
                            }
                            ?>
                              </td>
                              <td>
                                <a href="users.php?data=edit&editid=<?php echo $id;?>"><i class="bi bi-pencil-square text-dark"></i></a>
                              <a href="" data-bs-toggle="modal" data-bs-target="#deleteid<?php echo $id;?>"><i class="bi bi-trash text-danger"></i></a>
                                    <!-- Modal -->
                              <div class="modal fade" id="deleteid<?php echo $id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-center py-5">
                                        <h2 class="mb-2">Are you sure?</h2>
                                        <a class="btn btn-md btn-danger" href="users.php?data=delete&deleteid=<?php echo $id;?>">Confirm</a>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
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
                  </div>
              </div>
          </div>
      </div>
  <?php
    }
    if ($data == 'add') {
    ?>

      <div class="row">
        <div class="col-lg-9">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add New User</h5>
              <form class="row g-3" method="POST" enctype="multipart/form-data">
                <div class="col-md-12 form-group">
                  <label>User Name</label>
                  <input type="text" placeholder="User Name" class="form-control" name="user-name" required>
                </div>
                <div class="col-md-12 form-group">
                  <label>User Email</label>
                  <input type="email" placeholder="User Email" class="form-control" name="user-email" required>
                </div>

                <div class="col-md-12">

                  <div class="row">
                    <div class="col-md-7">
                      <div class="row">
                        <label for="inputEmail5" class="form-label">Set Password</label>
                      </div>
                      <div class="row">
                        <div class="col-md-7">

                          <input type="text" class="form-control" id="showrand" name="password" required>
                        </div>
                        <div class="col-md-5">
                          <input type="button" class="btn btn-md btn-success" value="Generate Password" onClick="javascript:rand()">
                        </div>
                      </div>
                    </div>

                    <div class="col-md-5">
                      <label for="inputEmail5" class="form-label">Phone</label>
                      <input type="number" class="form-control" id="inputEmail5" name="phone">
                    </div>
                  </div>
                </div>


                <div class="form-group">
                  <label>Address</label>
                  <textarea rows="4" class="form-control" placeholder="Short Address" name="address"></textarea>
                </div>
                <div class="form-group mb-3">
                  <label for="">Upload Images</label>
                  <input type="file" id="choose-file" class="form-control" name="choose-file" accept="image/*" placeholder="Choose File">
                  <div id="img-preview" style="width: fit-content; height:fit-content;"></div>
                </div>
                <div class="my-3">
                  <input type="submit" class="btn btn-md btn-md btn-success rounded-1 text-light" value="Add New User" name="add_user">
                </div>
              </form>
            </div>
          </div>
        </div>

      </div>

      <script type="text/javascript">
        // Declare all required characters
        const all_characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

        let randomNumber = document.querySelector('#random_number');
        let generateStringBtn = document.querySelector('#generate_string');

        const generateRandomString = (length) => {
          let result_string = '';
          const characters_length = all_characters.length;
          for (let i = 0; i < length; i++) {
            result_string += all_characters.charAt(Math.floor(Math.random() * characters_length));
          }

          return result_string;
        }
        document.getElementById('generatePass').value = generateRandomString(8);
        randomNumber.innerHTML = generateRandomString(8);

        // Generate String on button click
        generateStringBtn.addEventListener('click', () => randomNumber.innerHTML = generateRandomString(8));
      </script>
    <?php
    }
    if ($data == 'edit') {
      $editid = $_GET['editid'];
      $users = mysqli_query($db, "SELECT * FROM estore_user WHERE ID='$editid'");
      while ($row = mysqli_fetch_assoc($users)) {
        $id             = $row['ID'];
        $firstname      = $row['firstname'];
        $lastname       = $row['lastname'];
        $username       = $row['username'];
        $email          = $row['email'];
        $pass           = $row['pass'];
        $address        = $row['address'];
        $photo          = $row['photo'];
        $phone          = $row['phone'];
        $status          = $row['status'];
      }
    ?>
      <form method="POST" enctype="multipart/form-data" action="users.php?data=update">
        <div class="row" style="overflow-x: hidden;">
          <div class="col-lg-9">
            <div class="card p-3">
              <div class="card-header">
                <h4 class="text-dark"><strong>Update user information</strong></h4>
              </div>
              <div class="card-body">
                <div class="form-group mb-3">
                  <label>User Name</label>
                  <input type="text" placeholder="User Name" class="form-control" name="user-name" value="<?php echo $username; ?>">
                </div>
                <div class="form-group mb-3">
                  <label>User Email</label>
                  <input type="email" placeholder="User Email" class="form-control" name="user-email" value="<?php echo $email; ?>">
                </div>

                <div class="row mb-3">
                  <div class="col-md-6">
                    <label for="inputEmail5" class="form-label">Set Password</label>
                    <input type="text" class="form-control" id="generatePass" placeholder="Enter a new password" name="password">
                    <button class="btn btn-md btn-success mt-3" id="generate_string">Generate Password</button>

                  </div>
                  <div class="col-md-6">
                    <label for="inputEmail5" class="form-label">Phone</label>
                    <input type="number" class="form-control" id="inputEmail5" value="<?php echo $phone; ?>" name="phone">
                  </div>
                  <div class="col-lg-12 mt-3">
                    <label>Change user activity</label>
                    <select class="form-control" name="status">
                      <option class="" value="1" <?php if ($status == 1) echo 'selected'; ?>>Active</option>
                      <option class="" value="0" <?php if ($status == 0) echo 'selected'; ?>>Inactive</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label>Address</label>
                  <textarea rows="4" class="form-control" placeholder="Short Address" name="address">
                      <?php echo $address; ?>
                    </textarea>
                </div>
                <div class="form-group my-3">
                  <div class="image-input c-img">
                    <?php
                    if (empty($photo)) {
                      echo '<p class="alert alert-danger">No Image Found</p>';
                    } else {
                    ?>
                      <img src="assets/img/users/<?php echo $photo; ?>" alt="" width="100" />
                    <?php
                    }
                    ?>
                    <p class="mb-2 d-inline-block">Upload Images</p><br>
                    <input type="file" id="choose-file" name="choose-file" accept="image/*" />
                    <label for="choose-file">Select File</label>
                    <div id="img-preview"></div>
                  </div>
                </div>
                <div class="my-3">
                  <input type="hidden" name="userid" value="<?php echo $editid; ?>">
                  <input type="submit" class="btn btn-md btn-md btn-success rounded-1 text-light" value="Update Information" name="update_user">
                </div>
              </div>
            </div>
          </div>

        </div>
      </form>

    <?php
    }
    if ($data == 'update') {
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id            =  $_POST['userid'];
        $name          =  $_POST['user-name'];
        $email         =  $_POST['user-email'];
        $pass          =  $_POST['password'];
        $phone         =  $_POST['phone'];
        $address       =  $_POST['address'];
        $status       =  $_POST['status'];
        $file_name     =  $_FILES['choose-file']['name'];
        $tmp_name      =  $_FILES['choose-file']['tmp_name'];

        if (!empty($pass) && !empty($file_name)) {

          $hasspass = sha1($pass);
          $file = is_img($file_name);
          if ($file) {
            $updatedname = rand() . $file_name;
            move_uploaded_file($tmp_name, 'assets/img/users/' . $updatedname);

            $userUpdateSql = "UPDATE estore_user SET username = '$name', email = '$email', pass = '$hasspass', address = '$address', photo = '$updatedname', phone = '$phone', status = '$status' WHERE ID = '$id'";
            $update_res = mysqli_query($db, $userUpdateSql);
            if ($update_res) {
              header('location: users.php');
            } else {
              die('User update error!' . mysqli_error($db));
            }
          } else {
            echo 'not an image';
          }
        }
        if (!empty($pass) && empty($file_name)) {
          $hasspass = sha1($pass);

          $userUpdateSql = "UPDATE estore_user SET username = '$name', email = '$email', pass = '$hasspass', address = '$address', phone = '$phone', status = '$status' WHERE ID = '$id'";
          $update_res = mysqli_query($db, $userUpdateSql);
          if ($update_res) {
            header('location: users.php');
          } else {
            die('User update error!' . mysqli_error($db));
          }
        }
        if (empty($pass) && !empty($file_name)) {

          $file = is_img($file_name);
          if ($file) {
            $updatedname = rand() . $file_name;
            move_uploaded_file($tmp_name, 'assets/img/users/' . $updatedname);

            $userUpdateSql = "UPDATE estore_users SET username = '$name', email = '$email',  address = '$address', photo = '$updatedname', phone = '$phone', status = '$status' WHERE ID = '$id'";
            $update_res = mysqli_query($db, $userUpdateSql);
            if ($update_res) {
              header('location: users.php');
            } else {
              die('User update error!' . mysqli_error($db));
            }
          } else {
            echo 'not an image';
          }
        }
        if (empty($pass) && empty($file_name)) {
          $userUpdateSql = "UPDATE estore_user SET username = '$name', email = '$email',  address = '$address', phone = '$phone', status = '$status' WHERE ID = '$id'";
          $update_res = mysqli_query($db, $userUpdateSql);
          if ($update_res) {
            header('location: users.php');
          } else {
            die('User update error!' . mysqli_error($db));
          }
        }
      }
    }
    if ($data == 'delete') {
      if (isset($_GET['deleteid'])) {
        $deleteid = $_GET['deleteid'];
        // delete category image
        delete_file('photo', 'estore_user', 'ID', $deleteid, 'assets/img/users/');

        deleterec('estore_user', 'ID', $deleteid, 'users.php');
      }
    }

    ?>
  </section>
</main><!-- End #main -->
<?php include 'include/footer.php'; ?>