
    <?php

    include('header.php');
    include('db.php');

    $cat = $_GET['cat'];

  if($cat != null) {
    $query = 'SELECT * FROM product WHERE product_category='.$cat;

    $query_product = mysqli_query($bdd,$query);
  }else{
    $query_product = mysqli_query($bdd, 'SELECT * FROM product');
  }


     //if ($query_product = mysqli_query($bdd, 'SELECT * FROM product')){?>

<div class="main">

    <?php

     while($result = mysqli_fetch_assoc($query_product)){ ?>
       <form class="form-product" action="product_detail.php" method="post">
         <button class="product-teaser" type="submit" name="submit_id_details" value="<?=$result['product_id']?>">
           <input type="hidden" class="category_product" value="<?=$result['product_category']?>" />
           <img class="img-product" src="<?=$result['product_img_path']?>" />
           <p class="title"><?=$result['product_title']?></p>

       </button>
       </form>



  <?php

//}
};?>
  </div>
  <?php include('footer.php')

   ?>
