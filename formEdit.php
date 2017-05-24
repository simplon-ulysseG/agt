

<div class="edit_content" style="display:none;">
 <h1>Editer un produits</h1>
 <br>
 <form class="content" action="formEdit.php" method="post" enctype="multipart/form-data">
     <input type="text" name="product_title" value="<?=$result['product_title'];?>" placeholder="Titre du produit"><br><br>
     <input type="text" name="product_content" value="<?=$result['product_content'];?>" placeholder="Descriptif du produit"><br><br>
     <select class="product_category" name="product_category">
       <option selected value="<?= $result['product_category'];?>"><?= $result['product_category'];?></option>
       <option value="1">Planispheres</option>
       <option value="2">Continents</option>
       <option value="3">Europe</option>
       <option value="4">France</option>
       <option value="5">Plan de Paris</option>
       <option value="6">Ile de France</option>
       <option value="7">Pays étrangers</option>
       <option value="8">Format sous-main</option>
       <option value="9">Enfants</option>
       <option value="10">Animaux sauvages</option>
     </select><br><br>

     <button type="submit" name="button">Envoyer</button>

 </form>
</div>
