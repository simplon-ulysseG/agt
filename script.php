<?php include('db.php');
$array = ['Planispheres','Continent','Europe','France','Plan de Paris','Ile de France','Pays étrangers','Format sous-main','Enfants','Animaux sauvages'];

foreach ($array as $i => $value){
  echo $array[$i];

  mysqli_query($bdd, 'INSERT INTO category (nom_cat) VALUES ("'.$array[$i].'")');
}

?>
