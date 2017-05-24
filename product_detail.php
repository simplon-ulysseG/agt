<?php

include('header.php');
include('db.php');

$id = $_POST['submit_id_details'];

if(($_COOKIE['admin']== 3105)){
  $admin = true ;
} else {
  $admin = false;
}

$query = mysqli_query($bdd, 'SELECT * FROM product  WHERE product_id ='.$id);
if(mysqli_num_rows($query) >= 1){
while($result = mysqli_fetch_array($query)){

?>



<div class="main-detail">

  <h2><?=$result['product_title']?></h2>

  <?php if($admin == true){ ?>

  <div class="admin_actions">
    <img id="edit" src="asset/img/edit.png">
    <img id="delete" src="asset/img/del.png">
  </div>

  <div id="content_actions">
    <?php include('formEdit.php'); ?>
  </div>

   <?php } ?>





<img class="img-detail" src="<?=$result['product_img_path']?>" />

</div>




<?php }}; ?>

<script type="text/javascript" src="include/js/img-width.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#edit').click(function(){
       $('.edit_content').show();
    })

  });
</script>

<?php include('footer.php'); ?>
