<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" contents="IE=edge">
  <title>Home</title>
  <link rel="stylesheet" href="css/styleHome.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <?php
    if(isset($_GET['search']))
    {
      include "searchBook.php";
    }?>
</head>

<body>
  @include('header')
  @if (Session::get('success'))
    <div class="success">
      <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
      {{ Session::get('success') }}
    </div>
  @endif

  @if (Session::get('fail'))
    <div class="fail">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        {{ Session::get('fail') }}
    </div>
  @endif
  
  <div class="row">   
    <div class="button-container"> 
      <div class="left">
        <form action="/searchBook" class="searchbar" method="get" style="margin-top:auto; margin-bottom:auto;">
            @if (session()->has('bookSearched'))
              <input type="text" name="bookName" placeholder="Search something..." value="{{ session()->get('bookSearched') }}" required>
            @else
              <input type="text" name="bookName" placeholder="Search something..." required>
            @endif
            <button type="submit"><i class="fa fa-search" aria-hidden="true"></i>
					  <input type = "hidden" name = "submitted" value = "true">
        </form>
      </div>
      @if (session()->has('LoggedUser'))
        <div class="right">
          <a href="{{ route('viewCart') }}" class="cart_container">
            <div class="cart">
              <i class="fa" style="font-size:25px; color:blue">&#xf07a;</i>
              <span class='badge badge-warning' id='lblCartCount'> {{ $cartIconInfo[0] }} </span>
              RM{{ $cartIconInfo[1] }}
            </div> 
          </a>
        </div>
      @endif
    </div>
    
  </div>

  <?php 
  if(isset($error))
  {
    ?>
    <div class="error">
			<?php echo '<h1>'; 
				  echo $error; 
				  echo '</h1>'; ?>
		</div>
    <?php
  }
  else
  { ?>
    <div class="row">
      <div class="center">
        <a href="{{ route('getPreviousPage') }}" class="left-btn"><i class="arrow-left"></i></a>
        <div class="column">
          @if ($data == NULL)
            <div class="polaroid">
            </div>
            <div class="container">
                <p class="book-information">Book Title:</br><b>N/A</b></br></br>
            </div>
          @else
            @if (count($data) >= 1)
              <div class="polaroid">
                <img src="data:image/jpg;charset=utf8;base64,{{ $data[0]->frontCover }}" alt="Front Cover" height=300 width=210>
              </div>
              <div class="container">
                @if ($data[0]->quantity  <= 0)
                  <p class="book-information" style="color: red;">Book Title:</br><b>{{ $data[0]->bookName }}</b></br></br></p>
                  <center><b><p style="color: red; font-size: 17px;">Out of Stock!</p></b></center>
                @else
                  <p class="book-information">Book Title:</br><b>{{ $data[0]->bookName }}</b></br></br>
                  @if (session()->has('LoggedUser'))
                    <a href="/addToCart1" class="add_to_cart">Add to Cart</a>
                  @endif
                @endif
              </div>
            @else
              <div class="polaroid">
              </div>
              <div class="container">
                  <p class="book-information">Book Title:</br><b>N/A</b></br></br>
              </div>
            @endif
          @endif
          
        </div>

        <div class="column">
          @if ($data == NULL)
            <div class="polaroid">
            </div>
            <div class="container">
                <p class="book-information">Book Title:</br><b>N/A</b></br></br>
            </div>
          @else
            @if (count($data) >= 2)
              <div class="polaroid">
                <img src="data:image/jpg;charset=utf8;base64,{{ $data[1]->frontCover }}" alt="Front Cover" height=300 width=210>
              </div>
              <div class="container">
                @if ($data[1]->quantity  <= 0)
                  <p class="book-information" style="color: red;">Book Title:</br><b>{{ $data[1]->bookName }}</b></br></br></p>
                  <center><b><p style="color: red; font-size: 17px;">Out of Stock!</p></b></center>
                @else
                  <p class="book-information">Book Title:</br><b>{{ $data[1]->bookName }}</b></br></br>
                  @if (session()->has('LoggedUser'))
                    <a href="/addToCart2" class="add_to_cart">Add to Cart</a>
                  @endif
                @endif
              </div>
            @else
              <div class="polaroid">
              </div>
              <div class="container">
                  <p class="book-information">Book Title:</br><b>N/A</b></br></br>
              </div>
            @endif
          @endif
        </div>

        <div class="column">
          @if ($data == NULL)
            <div class="polaroid">
            </div>
            <div class="container">
                <p class="book-information">Book Title:</br><b>N/A</b></br></br>
            </div>
          @else
            @if (count($data) >= 3)
              <div class="polaroid">
                <img src="data:image/jpg;charset=utf8;base64,{{ $data[2]->frontCover }}" alt="Front Cover" height=300 width=210>
              </div>
              <div class="container">
                @if ($data[2]->quantity  <= 0)
                  <p class="book-information" style="color: red;">Book Title:</br><b>{{ $data[2]->bookName }}</b></br></br></p>
                  <center><b><p style="color: red; font-size: 17px;">Out of Stock!</p></b></center>
                @else
                  <p class="book-information">Book Title:</br><b>{{ $data[2]->bookName }}</b></br></br>
                  @if (session()->has('LoggedUser'))
                    <a href="/addToCart3" class="add_to_cart">Add to Cart</a>
                  @endif
                @endif
              </div>
            @else
              <div class="polaroid">
              </div>
              <div class="container">
                  <p class="book-information">Book Title:</br><b>N/A</b></br></br>
              </div>
            @endif
          @endif
        </div>

        <div class="column">
          @if ($data == NULL)
            <div class="polaroid">
            </div>
            <div class="container">
                <p class="book-information">Book Title:</br><b>N/A</b></br></br>
            </div>
          @else
            @if (count($data) >= 4)
              <div class="polaroid">
                <img src="data:image/jpg;charset=utf8;base64,{{ $data[3]->frontCover }}" alt="Front Cover" height=300 width=210>
              </div>
              <div class="container">
                @if ($data[3]->quantity  <= 0)
                  <p class="book-information" style="color: red;">Book Title:</br><b>{{ $data[3]->bookName }}</b></br></br></p>
                  <center><b><p style="color: red; font-size: 17px;">Out of Stock!</p></b></center>
                @else
                  <p class="book-information">Book Title:</br><b>{{ $data[3]->bookName }}</b></br></br>
                  @if (session()->has('LoggedUser'))
                    <a href="/addToCart4" class="add_to_cart">Add to Cart</a>
                  @endif
                @endif
              </div>
            @else
              <div class="polaroid">
              </div>
              <div class="container">
                  <p class="book-information">Book Title:</br><b>N/A</b></br></br>
              </div>
            @endif
          @endif
        </div>

        <div class="column">
          @if ($data == NULL)
            <div class="polaroid">
            </div>
            <div class="container">
                <p class="book-information">Book Title:</br><b>N/A</b></br></br>
            </div>
          @else
            @if (count($data) >= 5)
              <div class="polaroid">
                <img src="data:image/jpg;charset=utf8;base64,{{ $data[4]->frontCover }}" alt="Front Cover" height=300 width=210>
              </div>
              <div class="container">
                @if ($data[4]->quantity  <= 0)
                  <p class="book-information" style="color: red;">Book Title:</br><b>{{ $data[4]->bookName }}</b></br></br></p>
                  <center><b><p style="color: red; font-size: 17px;">Out of Stock!</p></b></center>
                @else
                  <p class="book-information">Book Title:</br><b>{{ $data[4]->bookName }}</b></br></br>
                  @if (session()->has('LoggedUser'))
                    <a href="/addToCart5" class="add_to_cart">Add to Cart</a>
                  @endif
                @endif
              </div>
            @else
              <div class="polaroid">
              </div>
              <div class="container">
                  <p class="book-information">Book Title:</br><b>N/A</b></br></br>
              </div>
            @endif
          @endif
        </div>
        <a href="{{ route('getNextPage') }}" class="right-btn"><i class="arrow-right"></i></a>
      </div>
    </div>

    <div class="page">
        <i class="text_page">Page: {{ session()->get('currentPage') }} / {{ session()->get('maxPageNum') }}</i>
    </div>
    <?php
  }?>

  
</body>
</html>