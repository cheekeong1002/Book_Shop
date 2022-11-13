<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" contents="IE=edge">
    <title>Home</title>
    <link rel="stylesheet" href="css/styleHome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/cart.css">
    <link rel="stylesheet" href="css/purchaseHistory.css">

</head>

<body>
    @include('header')
    <div class="row">
      <div style="margin:50px">
        <table >
          <tr>
            <th class="book-name">Book Name</th>
            <th>Quantity</th>
            <th>Purchase Date</th>
          </tr>
          
          @foreach ($purchaseHistory as $item)
            @if ($item[2] != $item[3])
            <tr>
              <td>
              @foreach ($purchaseHistory as $singleItem)
                @if ($singleItem[2] == $item[2])
                  <p>{{ $singleItem[0] }}</p>
                @endif
              @endforeach
              </td>
              <td>
              @foreach ($purchaseHistory as $singleItem)
                @if ($singleItem[2] == $item[2])
                  <p>{{ $singleItem[1] }}</p>
                @endif
              @endforeach  
              </td>
              <td>{{ $item[2] }}</td>
            </tr>
            @endif
          @endforeach
          
        </table>
      </div>
    </div>
    
    <script>
      function add(e){
        // var num = document.getElementById("num").val + 1;
        // num.setAttribute("num", 2);
        // console.log(num);
        // document.getElementById("num").value + 1;
      }
    </script>
</body>


