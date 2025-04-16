<?php
  $page_title = 'Add Book';
  require_once('includes/load.php');
  $all_categories = find_all('genres');
  $all_photo = find_all('media');
?>
<?php
 if(isset($_POST['add_book'])){
   $req_fields = array('book-title','book-photo', 'book-genre','book-quantity', 'book-author', 'book-price');
   validate_fields($req_fields);
   if(empty($errors)){
     $b_name  = remove_junk($db->escape($_POST['book-title']));
     $b_genre   = remove_junk($db->escape($_POST['book-genre']));
     $b_qty   = remove_junk($db->escape($_POST['book-quantity']));
     $b_price  = remove_junk($db->escape($_POST['book-price']));
     $b_author = remove_junk($db->escape($_POST['book-author']));
     $media_id = remove_junk($db->escape($_POST['book-photo']));

     $query  = "INSERT INTO books (";
     $query .=" author_name,name,quantity,price,genre_id,media_id";
     $query .=") VALUES (";
     $query .=" '{$b_author}', '{$b_name}', '{$b_qty}', '{$b_price}', '{$b_genre}', '{$media_id}'";
     $query .=")";
     $query .=" ON DUPLICATE KEY UPDATE name='{$b_name}'";
     if($db->query($query)){
       $session->msg('s',"Book added ");
       redirect('add_book.php', false);
     } else {
       $session->msg('d',' Sorry failed to add!');
       redirect('book.php', false);
     }

   } else{
     $session->msg("d", $errors);
     redirect('add_book.php',false);
   }

 }

?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-12">
    <?php echo display_msg($msg); ?>
  </div>
</div>
  <div class="row">
  <div class="col-md-8">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Add New Book</span>
         </strong>
        </div>
        <div class="panel-body">
         <div class="col-md-12">
          <form method="post" action="add_book.php" class="clearfix">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <input type="text" class="form-control" name="book-title" placeholder="Book Title">
               </div>
               <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-user"></i>
                  </span>
                  <input type="text" class="form-control" name="book-author" placeholder="Author Name">
               </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <select class="form-control" name="book-genre">
                      <option value="">Select Book Genre</option>
                    <?php  foreach ($all_categories as $cat): ?>
                      <option value="<?php echo (int)$cat['id'] ?>">
                        <?php echo $cat['name'] ?></option>
                    <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <select class="form-control" name="book-photo">
                      <option value="">Select Book Photo</option>
                    <?php  foreach ($all_photo as $photo): ?>
                      <option value="<?php echo (int)$photo['id'] ?>">
                        <?php echo $photo['file_name'] ?></option>
                    <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>

              <div class="form-group">
               <div class="row">
                 <div class="col-md-4">
                   <div class="input-group">
                     <span class="input-group-addon">
                      <i class="glyphicon glyphicon-shopping-cart"></i>
                     </span>
                     <input type="number" class="form-control" name="book-quantity" placeholder="Book Quantity">
                  </div>
                 </div>
                 <div class="col-md-4">
                   <div class="input-group">
                     <span class="input-group-addon">
                       <i class="glyphicon glyphicon-euro"></i>
                     </span>
                     <input type="number" class="form-control" min="0" name="book-price" placeholder="Book Price">
                  </div>
                 </div>
               </div>
              </div>
              <button type="submit" name="add_book" class="btn btn-danger">Add Book</button>
          </form>
         </div>
        </div>
      </div>
    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
