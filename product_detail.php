<?php

include('header.php');
include('db.php');

$id = $_POST['submit_id_details'];

$query = mysqli_query($bdd, 'SELECT * FROM product  WHERE product_id ='.$id);
if(mysqli_num_rows($query) >= 1){
while($result = mysqli_fetch_array($query)){


?>
<div class="main-detail">

<h2><?=$result['product_title']?></h2>

<img class="img-detail" src="<?=$result['product_img_path']?>" />

</div>




<?php }}; ?>

<script type="text/javascript" src="include/js/img-width.js"></script>

<?php include('footer.php'); ?>
