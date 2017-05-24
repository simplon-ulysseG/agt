<?php
include('db.php');
session_start();

if(($_SESSION['log'] != true)&&($_COOKIE['admin']!= 3105)){
  $query = mysqli_query($bdd,'SELECT * FROM users WHERE users_login ="'.$_SESSION['login'].'" AND users_pass = PASSWORD("'.$_SESSION['pwd'].'")');
    $result = mysqli_fetch_assoc($query);

if(mysqli_num_rows($query) > 1){
        session_destroy();
        header('Location: index.php');
      }

    }

include('header.php');

$title_product = $_POST['product_title'];
$content_product = $_POST['product_content'];
$category_product = $_POST['product_category'];

$dossier = 'include/upload/';
$fichier = basename($_FILES['product_upload']['name']);
$taille_maxi = 10000000000;
$taille = filesize($_FILES['product_upload']['tmp_name']);
$extensions = array('.png', '.gif', '.jpg', '.jpeg','.svg');
$extension = strrchr($_FILES['product_upload']['name'], '.');
//Début des vérifications de sécurité...
if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
{
     $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
}
if($taille>$taille_maxi)
{
     $erreur = 'Le fichier est trop gros...';
}
if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
{
     //On formate le nom du fichier ici...
     $fichier = strtr($fichier,
          'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
          'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
      //$fichier = strstr($fichier,'_', '-');
     $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);

     if(move_uploaded_file($_FILES['product_upload']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
     {

          $img_name = $fichier;
          $img_path = $dossier.$fichier;
          list($width, $height, $type, $attr) = getimagesize($img_path);



          if (($width >= 400) && ($title_product && $content_product && $category_product != null)){
            $product_query = "INSERT INTO product (product_title, product_upload, product_content, product_category, product_img_name, product_img_path)
               VALUES ('$title_product','$upload_product','$content_product','$category_product','$img_name','$img_path')";
              mysqli_query($bdd, $product_query);
              echo 'Upload effectué avec succès ! ';
          }else{
            echo 'Désolé mais la taille de l\'image doit etre de 400px de largeur minimum';
          }
          /*
             */
     }
     else //Sinon (la fonction renvoie FALSE).
     {
          echo 'Echec de l\'upload !';
     }
}
else
{
     echo $erreur;
}
 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="../asset/css/style.css">
     <title>Administration</title>
   </head>
   <body>
<div class="add-content">
  <h1>Ajout de nouveau produits</h1>
  <br>
  <form class="content" action="admin.php" method="post" enctype="multipart/form-data">
      <input type="text" name="product_title" value="" placeholder="Nom du produits"><br><br>
      <input type="text" name="product_content" value="" placeholder="Descriptif du produit"><br><br>
      <select class="product_category" name="product_category">
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
      <input type="file" name="product_upload" value="" placeholder="upload"><br><br>
      <input type="hidden" name="MAX_FILE_SIZE" value="100000000000000">

      <button type="submit" name="button">Envoyer</button>
  </form>
</div>


   </body>
 </html>

<?php include('footer.php'); ?>
