
<?php 
$isbn=$_POST['isbn'];
?>

<script type="text/javascript"> 

var isbn="<?php echo $isbn; ?>";
var deleteConfirmation=confirm("Do you want to delete the book?");
if (deleteConfirmation)
{
    window.location.href = "http://localhost/Book_Store_Website/update_book.php?action="+isbn;
}
else
{
    window.location.href = "http://localhost/Book_Store_Website/update_book.php?action=noDelete";
}

</script>
      
