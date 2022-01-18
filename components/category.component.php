
<table class="table table-hover">
  <thead >
    <tr>
      <th scope="col">#</th>
      <th scope="col" > Name </th>
      <th scope="col" >Controls</th>
    </tr>
  </thead>
  <?php 
    $category_obj1 = new blogpost_category();
    $result = $category_obj1->readAll();
    foreach($result as $categories){                    
  ?>
  <form action="" medtod="get">
  <tbody>
    <tr>
      <th scope="row"><?php echo $categories['id'];?></th>
      <td><?php echo $categories['name'];?></td>
      <td><a href="category.php?id='<?php echo $categories['id']?>'"  name="update" class="btn btn-outline-info">Update</button></a>   <a href="" name="delete" class="btn btn-outline-danger">Delete</a></td>
      <input type='hidden' name='id' value=<?php echo $categories['id']?>>
    </tr>
  </tbody>
  </form>
  <?php }?>
  <?php
   
  ?>
</table>

 