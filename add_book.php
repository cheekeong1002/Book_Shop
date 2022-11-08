<html>
<?php include "header_admin.php"?>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" contents="IE=edge">
	<title>Add Book</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/styleAddBook.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	
</head>

<?php

	if(isset($_GET['action']))
	{
		if($_GET['action']=="1")
		{
			?>
			<div class="alert alert-success alert-dismissible fade show" role="alert" style="margin:10px;">
				<strong>Success!</strong> Book details added successfully!
			</div>
			<?php
		}

		if($_GET['action']=="2")
		{
			?>
			<div class="alert alert-warning alert-dismissible fade show" role="alert" style="margin:10px;">
				<strong>Warning!</strong> Book details failed to be added!
			</div>
			<?php
		}

		// if($_GET['action']=="3")
		// {
			
		// 	<div class="alert alert-success alert-dismissible fade show" role="alert" style="margin:10px;">
		// 	<strong>Success!</strong> Book details updated successfully except book cover! Please update book cover at update page!
		// 	</div>
			
		// }

		if($_GET['action']=="4")
		{
			?>
			<div class="alert alert-warning alert-dismissible fade show" role="alert" style="margin:10px;">
			<strong>Warning!</strong> Book details failed to be updated!
			</div>
			<?php
		}

	}
	

	if(isset($_POST['submitted']))
	{
		include "addNewBook.php";
	}

	
?>

<body>
	<?php include "createBookTable.php"
	?>
	
	<div class="background">
		<div class="title">
			<h1> Add Book </h1>
		</div>
		<form action ="" method="post" enctype="multipart/form-data">
			<div class="left_column">
				<div class="left_content">
					<label>Book name:</label></br>
					<input type="text" name="bookName" pattern="[^0-9]*" title="Digit is not accepted" value="<?php if(isset($bookName)){echo $bookName;}?>" required></br>

					<label> Author:</label></br>
					<input type="text" name="author" pattern="[^0-9]*" title="Digit is not accepted" value="<?php if(isset($author)){echo $author;}?>" required></br>
					
					<label>Publication date:</label></br>
					<input type="date" name="publicationDate" value="<?php if(isset($publicationDate)){echo $publicationDate;}?>" max="<?php echo date("Y-m-d"); ?>" required></br>

					<label>ISBN-13 number:</label></br>
					<input type="text" name="isbn" maxlength="17" pattern="[0-9\-]+[0-9]$" title="Alphabet and special character are not accepted" value="<?php if(isset($isbn)){echo $isbn;}?>" required></br>
					
					<label>Book Description:</label></br>
					<textarea name="description" rows="5" cols="50" minlength="6" required><?php if(isset($description)){echo $description;}?></textarea></br>
					
				</div>
			</div>

			<div class="right_column">
				<div class="right_content">
					<div class="preview">
						<label>Front cover:</label></br>
						<img id="output" width="210px" height="300px"/></br>
					
						<label class="uploadbtn">
						<input type="file" accept="image/*" name="image" onchange="loadFile(event)">
							Select an image 
						</label>
					
						<script>
						var loadFile = function(event) {
							var image = document.getElementById('output');
							image.src = URL.createObjectURL(event.target.files[0]);
						};
						</script>
					</div>
					
						<div class="slide_bar">
							<div class="container">
								<label>Trade price:</label></br>
								<input type="range" name="tradePrice" value="<?php if(isset($tradePrice)){echo $tradePrice;}else{echo 50;}?>" min="1" max="100" oninput="this.nextElementSibling.value = this.value">
								$<output><?php if(isset($tradePrice)){echo $tradePrice;}else{echo 50;}?></output></br>
								
								<label>Retail price:</label></br>
								<input type="range" name="retailPrice" value="<?php if(isset($retailPrice)){echo $retailPrice;}else{echo 50;}?>" min="1" max="100" oninput="this.nextElementSibling.value = this.value">
								$<output><?php if(isset($retailPrice)){echo $retailPrice;}else{echo 50;}?></output></br>
								
								<label>Book Quantity:</label></br>
								<input type="range" name="quantity" value="<?php if(isset($quantity)){echo $quantity;}else{echo 1;}?>" min="1" max="20" oninput="this.nextElementSibling.value = this.value">
								<output><?php if(isset($quantity)){echo $quantity;}else{echo 1;}?></output></br>
							</div>
						</div>

						
							
					
					
					<label><input type="submit" value="Add Book"></label>
					<input type = "hidden" name = "submitted" value = "true">
				</div>
			</div>

		</form>
	</div>
</body>
</html>