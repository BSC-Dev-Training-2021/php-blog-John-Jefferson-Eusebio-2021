<?php
    include 'model/model.class.php';
    include 'model/category.class.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>My Blog - Home</title>
        <script src="js/jquery-3.6.0.min.js"></script>
        <script src="js/app.js"></script>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/font-awesome.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#!">My Blog</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.html">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
                        <li class="nav-item"><a class="nav-link active" href="category.php">Category</a></li>
                        <li class="nav-item"><a class="nav-link" href="post.php">Post</a></li>
                        <li class="nav-item"><a class="nav-link" href="messages.html"><i class="fa fa-envelope-o"></i></a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <header class="mb-8">
                        <!-- Post title-->
                        <h1 class="fw-bolder mb-1">Create a new Category</h1>
                        <!-- Post meta content-->
                        <div class="text-muted fst-italic mb-3">Express your mind!</div>
                        <?php
                            if (isset($_GET['update'])) {
                                if (isset($_GET['id'])) {
                                    $fields_arr = [
                                        'id' => $_GET['id']
                                    ];
                                    $category_update_obj = new blogpost_category();
                                    $result = $category_update_obj->update($fields_arr);
                                    foreach ($result as $update_value) {?>
                                        <form action="" method="post">
                                        <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="<?php echo $update_value?>" placeholder="Category name" aria-label="Recipient's username" aria-describedby="button-addon2">
                                        
                                        <div class="input-group-append">
                                            <input class="btn btn-outline-secondary" name="insert_name" value="Update Category" type="submit" id="button-addon2">
                                        </div>
                                        </form> <?php
                                    }
                                }
                            }else {
                                ?>
                                <form action="" method="post">
                                <div class="input-group mb-3">
                                <input type="text" class="form-control" name="category_name" placeholder="Category name" aria-label="Recipient's username" aria-describedby="button-addon2">
                                
                                <div class="input-group-append">
                                    <input class="btn btn-outline-secondary" name="insert_name" value="Add new Category" type="submit" id="button-addon2">
                                </div>
                                </form> <?php
                            }
                        ?>
                        </div>
                        <?php
                             if (isset($_POST['insert_name'])) {
                                $category_name = $_POST['category_name'];
                                $category_fields = [
                                    'name' => $category_name
                                ];
                                $insert_category_obj = new blogpost_category();
                                $insert_category_obj->create($category_fields);
                            }
                               
                        ?>
                    </header>
                    <!-- Featured blog post--> 
                        <div class="col-m-8 card ">
                            <?php
                            include "components/category.component.php";
                            ?>
                        </div>  
                        <?php require_once 'components/pagination.php' ?>  
                </div>
               <?php require_once 'components/side_widgets.php'?>
            </div>
        </div>
        <?php require_once 'components/footer.php' ?>
    </body>
</html>
