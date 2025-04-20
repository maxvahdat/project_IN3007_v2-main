<?php
  $page_title = 'Edit genre';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
?>
<?php
  //Display all catgories.
  $genre = find_by_id('genres',(int)$_GET['id']);
  if(!$genre){
    $session->msg("d","Missing genre id.");
    redirect('genre.php');
  }
?>

<?php
if(isset($_POST['edit_gen'])){
  $req_field = array('genre-name');
  validate_fields($req_field);
  $gen_name = remove_junk($db->escape($_POST['genre-name']));
  if(empty($errors)){
        $sql = "UPDATE genres SET name='{$gen_name}'";
       $sql .= " WHERE id='{$genre['id']}'";
     $result = $db->query($sql);
     if($result && $db->affected_rows() === 1) {
       $session->msg("s", "Successfully updated genre");
       redirect('genre.php',false);
     } else {
       $session->msg("d", "Sorry! Failed to Update");
       redirect('genre.php',false);
     }
  } else {
    $session->msg("d", $errors);
    redirect('genre.php',false);
  }
}
?>
<?php include_once('layouts/header.php'); ?>

<div class="row">
   <div class="col-md-12">
     <?php echo display_msg($msg); ?>
   </div>
   <div class="col-md-5">
     <div class="panel panel-default">
       <div class="panel-heading">
         <strong>
           <span class="glyphicon glyphicon-th"></span>
           <span>Editing <?php echo remove_junk(ucfirst($genre['name']));?></span>
        </strong>
       </div>
       <div class="panel-body">
         <form method="post" action="edit_genre.php?id=<?php echo (int)$genre['id'];?>">
           <div class="form-group">
               <input type="text" class="form-control" name="genre-name" value="<?php echo remove_junk(ucfirst($genre['name']));?>">
           </div>
           <button type="submit" name="edit_gen" class="btn btn-primary">Update genre</button>
       </form>
       </div>
     </div>
   </div>
</div>



<?php include_once('layouts/footer.php'); ?>
