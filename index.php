<?php
    session_start();
    include 'model/model.class.php';
    include 'model/blogpost.class.php';
    include 'model/category.class.php';
    include 'model/categories.class.php';
    include 'controller/controller.php';
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
        <?php require_once 'components/header.php' ?>
        <!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <!-- Featured blog post--> 
                        <div class="card mb-4">
                        <?php require_once 'components/content.php' ?>
                        </div>  
                    <?php 
                        require_once 'components/future_use_html.php' 
                    ?> 
                    <?php require_once 'components/pagination.php' ?>
                </div>
               <?php require_once 'components/side_widgets.php'?>
            </div>
        </div>
        <?php require_once 'components/footer.php' ?>
    </body>
</html>
