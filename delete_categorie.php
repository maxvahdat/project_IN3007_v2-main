<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
?>
<?php
  $categorie = find_by_id('genres',(int)$_GET['id']);
  if(!$categorie){
    $session->msg("d","Missing Categorie id.");
    redirect('genre.php');
  }
?>
<?php
  $delete_id = delete_by_id('genres',(int)$categorie['id']);
  if($delete_id){
      $session->msg("s","Categorie deleted.");
      redirect('genre.php');
  } else {
      $session->msg("d","Categorie deletion failed.");
      redirect('genre.php');
  }
?>
