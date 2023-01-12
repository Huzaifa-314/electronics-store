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
            <div class="col-lg-5">
                <!-- add new category -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add New Category</h5>

                        <!-- No Labels Form -->
                        <form class="row g-3">
                            <div class="col-md-12">
                                <input type="text" class="form-control" placeholder="Category Name">
                            </div>
                            <div class="col-md-12">
                                <label for="">Choose your Parent Category</label>
                                <select id="inputState" class="form-select">
                                    <option selected="">Choose...</option>
                                    <option>Robotics</option>
                                    <option>Sensor</option>
                                    <option>Microcontroller</option>
                                    <option>Accessories</option>
                                    <option>Basic Components</option>
                                    <option>Kits</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="">Choose category image</label>
                                <input type="file" id="choose-file" class="form-control" name="choose-file" accept="image/*" placeholder="Choose File">
                                <div id="img-preview"></div>
                            </div>
                            <div class="">
                                <button type="submit" class="btn btn-primary">Add New Category</button>
                            </div>
                        </form><!-- End No Labels Form -->

                    </div>
                </div>
            </div>
            <div class="col-lg-7">
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
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Brandon Jacob</td>
                                    <td>Designer</td>
                                    <td>28</td>
                                    <td>2016-05-25</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Bridie Kessler</td>
                                    <td>Developer</td>
                                    <td>35</td>
                                    <td>2014-12-05</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Ashleigh Langosh</td>
                                    <td>Finance</td>
                                    <td>45</td>
                                    <td>2011-08-12</td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>Angus Grady</td>
                                    <td>HR</td>
                                    <td>34</td>
                                    <td>2012-06-11</td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>Raheem Lehner</td>
                                    <td>Dynamic Division Officer</td>
                                    <td>47</td>
                                    <td>2011-04-19</td>
                                </tr>
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