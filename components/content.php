<?php
                            
    $blogpost_obj1 = new blogpost();
     $result = $blogpost_obj1->readAll();
    foreach ($result as $value) {
    }   

?>
     <div class="card mb-4">
        <form action="" method="get">
            <a href="#!"><img class="card-img-top" src="https://dummyimage.com/850x350/dee2e6/6c757d.jpg" alt="..." /></a>
            <div class="card-body">
            <div class="small text-muted"><?php echo date('M d D, Y  H : i : s',strtotime($value['created']));?></div>
                <h2 class="card-title"><?php echo $value['title'] ?></h2>
                <p class="card-text"><?php echo $value['description'] ?></p>
                <a href="article.php?article_id='<?php echo $value['id']?>'" class="btn btn-primary" name="PassData"> Read more →</a>
                <input type='hidden' name='article_id' value=<?php echo $value['id']?>>
            </div>
        </form>
    </div>   