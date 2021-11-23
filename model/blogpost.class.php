<?php

    class blogpost extends model{

        function __construct(){
            parent::__construct("blog_post");
        }
        function insertDataBlog($data, $category_data){
            $lastIdResult = $this->create($data);
            $categories = new categories();
            $categories->getdata($lastIdResult, $category_data);
        }

    }