<?php

    function featuredComponent($title, $description, $datetime, $article_id){
        $element="
            <div class=\"card mb-4\">
            <form action=\"\" method=\"get\">
            <a href=\"#!\"><img class=\"card-img-top\" src=\"https://dummyimage.com/850x350/dee2e6/6c757d.jpg\" alt=\"...\" /></a>
            <div class=\"card-body\">
                <div class=\"small text-muted\">$datetime</div>
                <h2 class=\"card-title\">$title</h2>
                <p class=\"card-text\">$description</p>
                <a href=\"article.php?article_id=$article_id\" class=\"btn btn-primary\" name=\"PassData\">Read more →</a>
                <input type='hidden' name='article_id' value='$article_id'>
            </div>
            </form>
        </div>
         
        ";
        echo $element;
    }

    function articelComponent($title, $content, $datetime, $article_id){
        $element="
                    <article>
                    <!-- Post header-->
                    <header class=\"mb-4\">
                        <!-- Post title-->
                        <h1 class=\"fw-bolder mb-1\">$title</h1>
                        <!-- Post meta content-->
                        <div class=\"text-muted fst-italic mb-2\">Posted on $datetime by Start Bootstrap</div>
                        <!-- Post categories-->
                        <a class=\"badge bg-secondary text-decoration-none link-light\" href=\"#!\">HTML</a>
                        <a class=\"badge bg-secondary text-decoration-none link-light\" href=\"#!\">Javascript</a>
                    </header>
                    <!-- Preview image figure-->
                    <figure class=\"mb-4\"><img class=\"img-fluid rounded\" src=\"https://dummyimage.com/900x400/ced4da/6c757d.jpg\" alt=\"...\" /></figure>
                    <!-- Post content-->
                    <section class=\"mb-5\">
                        <p class=\"fs-5 mb-4\">$content</p>
                        
                        
                    </section>
                </article>
                
         
        ";
        echo $element;
    }



   