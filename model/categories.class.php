<?php 

    class blogpost_categories extends model {
        function __construct(){
            parent::__construct("blog_post_categories");
        }
        function insertCategories($last_data_id, $category_data){
            foreach ($category_data as $category_id) {
                $data =array(
                    'blog_post_id' => $last_data_id,
                    'category_id' => $category_id
                );
                $this->create($data);
            }
            
        }
    }