<?php
  require_once('includes/load.php');
  page_require_level(1);
?>
<?php
  $genre = find_by_id('genres',(int)$_GET['id']);
  if(!$genre){
    $session->msg("d","Missing genre id.");
    redirect('genre.php');
  }
?>
<?php
  $delete_id = delete_by_id('genres',(int)$genre['id']);
  if($delete_id){
      $session->msg("s","Genre deleted.");
      redirect('genre.php');
  } else {
      $session->msg("d","Genre deletion failed.");
      redirect('genre.php');
  }
?>
