<?php     
    $blogpost_obj3 = new blogpost();
    
    if (isset($_GET['getName'])){

        $result = $blogpost_obj3->filtering($_GET['getName']);

    }else{

        $result = $blogpost_obj3->readAll(); 

    }
        foreach ($result as $value) {?>      
        <form action="" method="get">
            <a href="#!"><img class="card-img-top" src="https://dummyimage.com/850x350/dee2e6/6c757d.jpg" alt="..." /></a>
            <div class="card-body">
                <div class="small text-muted"><?=date('M d D, Y  H : i : s',strtotime($value['created']));?></div>
                <h2 class="card-title"><?=$value['title'] ?></h2>
                <p class="card-text"><?=$value['description'] ?></p>
                <a href="article.php?article_id='<?=$value['id']?>'" class="btn btn-primary" name="PassData"> Read more →</a>
                <input type='hidden' name='article_id' value=<?=$value['id']?>>
            </div>
        </form>
<?php } ?> 