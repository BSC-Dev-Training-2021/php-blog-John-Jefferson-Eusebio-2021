<?php

    //post.php Controller
    if(isset($_POST['Createblog'])){
        $content = $_POST['content'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $date = $_POST['datetime'];
        $image = $_FILES['fileToUpload'];
        
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES['fileToUpload']['name']);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $check = getimagesize($_FILES['fileToUpload']['tmp_name']);
        if($check !== false) {
            echo "File is an image - " . $check['mime'] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        if ($_FILES['fileToUpload']['size'] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)) {
                echo "The file ". htmlspecialchars( basename( $_FILES['fileToUpload']['name'])). " has been uploaded.";
            }else {
                echo "Sorry, there was an error uploading your file.";
              }
        }
        $fields = [
            'title' => "$title", 
            'content' => "$content",
            'description' => "$description",
            'created' => "$date",
            'img_link' => $_FILES['fileToUpload']['name'],
            'created_by' => 1
        ];
        $blogpost_obj = new blogpost();
        $lastIdResult = $blogpost_obj->insertDataBlog($fields, $_POST['categories']); 
    }
    

    //content.php controller

    $blogpost_obj3 = new blogpost();
    
    if (isset($_GET['getName'])){

        $result = $blogpost_obj3->filtering($_GET['getName']);

    }else{

        $result = $blogpost_obj3->readAll(); 

    }

    
  
    
    