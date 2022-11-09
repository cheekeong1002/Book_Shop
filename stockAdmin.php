<?php

include "header_admin.php";

// if(!isset($_SESSION['search']))
// {
//   include "displayStockAdmin.php";
// }
// else
// {
//   include "searchBook.php";
// }

include "displayStockAdmin.php";
unset($_SESSION['isbn']);


?>

<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="css/styleStockAdmin.css">
  <link rel="stylesheet" href="css/styleUpdateBook.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <?php
  if (isset($_GET['submitted'])) {
    $_SESSION['search'] = $_GET['search'];
    //include "searchBook.php";
    include "displayStockAdmin.php";
  }?>
  <?php
  if (isset($_GET['action'])){
    if ($_GET['action'] == "delete"){?>
      
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin:10px;">
          <strong>Success!</strong> Book is deleted successfully!
        </div><?php
    }elseif($_GET['action'] == "added"){?>
      
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin:10px;">
          <strong>Success!</strong> Book is added successfully!
        </div><?php
    }
  }
  ?>
</head>

<body>
  <div class="row">

    <div class="button-container">
      <div class="left">
        <form action="" class="searchbar" method="get" style="margin-top:auto; margin-bottom:auto;">
          <input type="text" name="search" style="margin-top:auto; margin-bottom:auto;" placeholder="Search something..." value="<?php if (isset($_SESSION['search'])) {
                                                                                      echo $_SESSION['search'];
                                                                                    } ?>">
          <button type="submit"><i class="fa fa-search" aria-hidden="true"></i>
            <input type="hidden" name="submitted" value="true">
        </form>
      </div>
    </div>
    <div class="button-container">
      <div class="right">
        <a href="lowStockAdmin.php" disabled><button class="button <?php if ($lowStock > 0) { ?> warning-button normal<?php } ?>" <?php if ($lowStock == 0) { ?> disabled <?php } ?>>Low stock: <?php echo $lowStock; ?></button></a>
        <a href="add_Book.php"><button class="button">Add Book</button></a>
      </div>
    </div>
  </div>

  <?php
  if (isset($error)) {
  ?>
    <div class="error">
      <?php echo '<h1>';
      echo $error;
      echo '</h1>'; ?>
    </div>
  <?php
  } else { ?>
    <div class="row">
      <div class="center">
        <button id="left_btn" class="left-btn" name="left_btn"><i class="arrow-left"></i></button>
        <div class="column">
          <a href="#" id="book1">
            <div class="polaroid">
              <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($frontCov1); ?>" alt="Front Cover" height=300 width=210>
            </div>
            <div class="container">
              <p class="book-information">Book Title:</br><b><?php echo $title1; ?></b></br></br>
                ISBN-13 number:</br><b><?php echo $isbn1; ?></b></br></br>
                <?php if ($qty1 < 5) { ?>
              <div class="warning">Quantity: <b><?php echo $qty1; ?></b></div>
              </p>
            <?php } else { ?>
              <div class="normal">Quantity: <b><?php echo $qty1; ?></b></div>
              </p>
            <?php } ?>
            </div>
          </a>
        </div>

        <div class="column">
          <a href="#" id="book2">
            <div class="polaroid">
              <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($frontCov2); ?>" alt="Front Cover" height=300 width=210>
            </div>
            <div class="container">
              <p class="book-information">Book Title:</br><b><?php echo $title2; ?></b></br></br>
                ISBN-13 number:</br><b><?php echo $isbn2; ?></b></br></br>
                <?php if ($qty2 < 5) { ?>
              <div class="warning">Quantity: <b><?php echo $qty2; ?></b></div>
              </p>
            <?php } else { ?>
              <div class="normal">Quantity: <b><?php echo $qty2; ?></b></div>
              </p>
            <?php } ?>
            </div>
          </a>
        </div>

        <div class="column">
          <a href="#" id="book3">
            <div class="polaroid">
              <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($frontCov3); ?>" alt="Front Cover" height=300 width=210>
            </div>
            <div class="container">
              <p class="book-information">Book Title:</br><b><?php echo $title3; ?></b></br></br>
                ISBN-13 number:</br><b><?php echo $isbn3; ?></b></br></br>
                <?php if ($qty3 < 5) { ?>
              <div class="warning">Quantity: <b><?php echo $qty3; ?></b></div>
              </p>
            <?php } else { ?>
              <div class="normal">Quantity: <b><?php echo $qty3; ?></b></div>
              </p>
            <?php } ?>
            </div>
          </a>
        </div>

        <div class="column">
          <a href="#" id="book4">
            <div class="polaroid">
              <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($frontCov4); ?>" alt="Front Cover" height=300 width=210>
            </div>
            <div class="container">
              <p class="book-information">Book Title:</br><b><?php echo $title4; ?></b></br></br>
                ISBN-13 number:</br><b><?php echo $isbn4; ?></b></br></br>
                <?php if ($qty4 < 5) { ?>
              <div class="warning">Quantity: <b><?php echo $qty4; ?></b></div>
              </p>
            <?php } else { ?>
              <div class="normal">Quantity: <b><?php echo $qty4; ?></b></div>
              </p>
            <?php } ?>
            </div>
          </a>
        </div>

        <div class="column">
          <a href="#" id="book5">
            <div class="polaroid">
              <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($frontCov5); ?>" alt="Front Cover" height=300 width=210>
            </div>
            <div class="container">
              <p class="book-information">Book Title:</br><b><?php echo $title5; ?></b></br></br>
                ISBN-13 number:</br><b><?php echo $isbn5; ?></b></br></br>
                <?php if ($qty5 < 5) { ?>
              <div class="warning">Quantity: <b><?php echo $qty5; ?></b></div>
              </p>
            <?php } else { ?>
              <div class="normal">Quantity: <b><?php echo $qty5; ?></b></div>
              </p>
            <?php } ?>
            </div>
          </a>
        </div>
        <button id="right_btn" class="right-btn" name="right_btn"><i class="arrow-right"></i></button>
      </div>
    </div>

    <div class="page">
      <i class="text_page">Page: <?php echo $_SESSION['currentPageNum'] . " / " . $maxPageNum ?></i>
    </div>
  <?php
  } ?>


</body>

<script type="text/javascript">
  var search = "<?php if (isset($_SESSION['search'])) {
                  echo $_SESSION['search'];
                } ?>";

  document.getElementById("right_btn").onclick = function() {
    location.href = "rightClicked.php";
  };
  document.getElementById("left_btn").onclick = function() {
    location.href = "leftClicked.php";
  };
  document.getElementById("book1").onclick = function() {
    location.href = "bookdata1.php?search=" + search;
  }
  document.getElementById("book2").onclick = function() {
    location.href = "bookdata2.php?search=" + search;
  }
  document.getElementById("book3").onclick = function() {
    location.href = "bookdata3.php?search=" + search;
  }
  document.getElementById("book4").onclick = function() {
    location.href = "bookdata4.php?search=" + search;
  }
  document.getElementById("book5").onclick = function() {
    location.href = "bookdata5.php?search=" + search;
  }
</script>

</html>