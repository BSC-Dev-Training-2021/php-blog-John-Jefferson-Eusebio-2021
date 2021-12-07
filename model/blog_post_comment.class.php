<?php 

    class blog_post_comments extends model {
        function __construct(){
            parent::__construct("blog_post_comment");
        }
        function getInsertData($insert_comment){
            $this->create($insert_comment);
        }
    }