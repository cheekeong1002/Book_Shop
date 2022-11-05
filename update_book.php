<?php include "header_admin.php";
include "retrieveBookData.php" ?>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" contents="IE=edge">
	<title>Update Book</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/styleUpdateBook.css">
</head>

<?php

if (isset($_POST['submitted'])) {
	include "updateBookTable.php";
	include "retrieveBookData.php";
}
?>

<body>
	<div class="background">
		<div class="title">
			<h1>Update Book</h1>
		</div>
		<?php
		if (isset($_SESSION['isbn'])) {
		?>
			<form action="" method="post" enctype="multipart/form-data">
				<div class="left_column">
					<div class="left_content">
						<label>Book name:</label></br>
						<input type="text" name="bookName" pattern="[^0-9]*" title="Digit is not accepted" value="<?php if (isset($_GET['bookName'])) {
																														echo $_GET['bookName'];
																													} else {
																														echo $bookName;
																													} ?>" required></br>

						<label> Author:</label></br>
						<input type="text" name="author" pattern="[^0-9]*" title="Digit is not accepted" value="<?php if (isset($_GET['author'])) {
																													echo $_GET['author'];
																												} else {
																													echo $author;
																												} ?>" required></br>

						<label>Publication date:</label></br>
						<input type="date" name="publicationDate" value="<?php echo $p_date; ?>" required></br>

						<label>ISBN-13 number:</label></br>
						<input type="text" name="isbn" pattern="[0-9\-]+[0-9]$" title="Alphabet and special character are not accepted" value="<?php echo $isbn; ?>" readonly></br>

						<label>Book Description:</label></br>
						<textarea name="description" rows="5" cols="50" required><?php if (isset($_GET['description'])) {
																						echo $_GET['description'];
																					} else {
																						echo $description;
																					} ?></textarea></br>
					</div>
				</div>

				<div class="right_column">
					<div class="right_content">
						<div class="preview">
							<label>Front cover:</label></br>
							<img src="data:image/jpg;charset=utf8;base64,<?php echo $frontCover ?>" id="output" width="210px" height="300px" /></br>

							<label class="uploadbtn" style="margin: 10px 0px 10px 0px;">
								<input type="file" accept="image/*" name="cover" onchange="loadFile(event)">
								<div style="text-align:center">
									Select an image
								</div>
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
								<input type="range" name="tradePrice" value="<?php if (isset($_GET['tradePrice'])) {
																					echo $_GET['tradePrice'];
																				} else {
																					echo $tradePrice;
																				} ?>" min="1" max="100" oninput="this.nextElementSibling.value = this.value">
								$<output><?php if (isset($_GET['tradePrice'])) {
												echo $_GET['tradePrice'];
											} else {
												echo $tradePrice;
											} ?></output></br>

								<label>Retail price:</label></br>
								<input type="range" name="retailPrice" value="<?php if (isset($_GET['retailPrice'])) {
																					echo $_GET['retailPrice'];
																				} else {
																					echo $retailPrice;
																				} ?>" min="1" max="100" oninput="this.nextElementSibling.value = this.value">
								$<output><?php if (isset($_GET['retailPrice'])) {
												echo $_GET['retailPrice'];
											} else {
												echo $retailPrice;
											} ?></output></br>

								<label>Book Quantity:</label></br>
								<input type="range" name="quantity" value="<?php if (isset($_GET['quantity'])) {
																				echo $_GET['quantity'];
																			} else {
																				echo $quantity;
																			} ?>" min="1" max="20" oninput="this.nextElementSibling.value = this.value">
								<output><?php if (isset($_GET['quantity'])) {
											echo $_GET['quantity'];
										} else {
											echo $quantity;
										} ?></output></br>
							</div>
						</div>

						<div style="width:50%; float:left;">
							<label><input type="submit" value="Delete Book" style="margin-left: 5px; background-color: #FF0000"></label>
							<input type="hidden" name="submitted" value="true">
						</div>

						<div style="width:50%; float:right;">
							<label><input type="submit" value="Update Book" style="margin-left: 5px"></label>
							<input type="hidden" name="submitted" value="true">
						</div>
					</div>
				</div>

			</form>
		<?php
		} else {
		?>
			<div class="error">
				<?php echo '<h1>';
				echo $error;
				echo '</h1>'; ?>
			</div>
		<?php
		}
		?>
	</div>
</body>

</html>