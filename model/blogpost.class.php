<?php

    class blogpost extends model{

        function __construct(){
            parent::__construct("blog_post");
        }
        function insertDataBlog($data, $category_data){
            var_dump($category_data);
            $lastIdResult = $this->create($data);
            $categories = new blogpost_categories();
            $categories->insertCategories($lastIdResult, $category_data);
            
        }

    }