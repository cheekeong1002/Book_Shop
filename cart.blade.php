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
      <div style="margin:50px">
        <table >
          <tr>
            <th>Front Cover</th>
            <th>Book Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Action</th>
          </tr>
            <?php $num=0;?>
            @foreach ($cartItem as $singleItem)
            
            <tr>
              <?php 
              $num++;
              session()->put("num", $num);
              session()->put($num, $singleItem[4]);
              ?>
              <td><img src="data:image/jpg;charset=utf8;base64,{{ $singleItem[0] }}" alt="Front Cover" height=160 width=102></td>
              <td>{{ $singleItem[1] }}</td>
              <td>{{ $singleItem[2] }}</td>
              <td>
                <div style="width: 100%;">
                  <a href="{{ route('incrementBook', ['isbn' => $singleItem[4] ]) }}" class="font-black">+</a>
                  <div id="num">{{ $singleItem[3] }}</div>
                  <a href="{{ route('decrementBook', ['isbn' => $singleItem[4] ]) }}" class="font-black">-</a>
                </div>
              </td>
  
              <td><a href="{{ route('deleteBookInCart', ['isbn' => $singleItem[4] ]) }}" onclick="return confirm('Do you really want to remove '+toUnicodeVariant('<?php $bookName = $singleItem[1]; echo $bookName;?>','bold sans', 'bold')+' from your cart?')" class="font-red">Delete</a></td>
            </tr>
            
            @endforeach
          
        </table>
      </div>
    </div>

    <div class="row">
      <div class="right">
        <div class="option">
          <p>Total Price: RM {{ $totalPrice }}</p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="right">
        <div class="option">
          <div class="button-container">
            <a href="/clearCart" class="add_to_cart" style="width:max-content; background-image: linear-gradient(-180deg, #FF0000, #e50000);">Cancel</a>
            <a href="/displayOrderDetail" class="add_to_cart" style="width:max-content">Checkout</a>
          </div>
        </div>
      </div>
    </div>
    
    <script>
      function toUnicodeVariant(str, variant, flags) 
      {
        const offsets = {
            m: [0x1d670, 0x1d7f6],
            b: [0x1d400, 0x1d7ce],
            i: [0x1d434, 0x00030],
            bi: [0x1d468, 0x00030],
            c: [0x1d49c, 0x00030],
            bc: [0x1d4d0, 0x00030],
            g: [0x1d504, 0x00030],
            d: [0x1d538, 0x1d7d8],
            bg: [0x1d56c, 0x00030],
            s: [0x1d5a0, 0x1d7e2],
            bs: [0x1d5d4, 0x1d7ec],
            is: [0x1d608, 0x00030],
            bis: [0x1d63c, 0x00030],
            o: [0x24B6, 0x2460],
            p: [0x249C, 0x2474],
            w: [0xff21, 0xff10],
            u: [0x2090, 0xff10]
        }

        const variantOffsets = {
            'monospace': 'm',
            'bold': 'b',
            'italic': 'i',
            'bold italic': 'bi',
            'script': 'c',
            'bold script': 'bc',
            'gothic': 'g',
            'gothic bold': 'bg',
            'doublestruck': 'd',
            'sans': 's',
            'bold sans': 'bs',
            'italic sans': 'is',
            'bold italic sans': 'bis',
            'parenthesis': 'p',
            'circled': 'o',
            'fullwidth': 'w'
        }

        // special characters (absolute values)
        var special = {
            m: {
                ' ': 0x2000,
                '-': 0x2013
            },
            i: {
                'h': 0x210e
            },
            g: {
                'C': 0x212d,
                'H': 0x210c,
                'I': 0x2111,
                'R': 0x211c,
                'Z': 0x2128
            },
            o: {
                '0': 0x24EA,
                '1': 0x2460,
                '2': 0x2461,
                '3': 0x2462,
                '4': 0x2463,
                '5': 0x2464,
                '6': 0x2465,
                '7': 0x2466,
                '8': 0x2467,
                '9': 0x2468,
            },
            p: {},
            w: {}
        }
        //support for parenthesized latin letters small cases 
        for (var i = 97; i <= 122; i++) {
            special.p[String.fromCharCode(i)] = 0x249C + (i - 97)
        }
        //support for full width latin letters small cases 
        for (var i = 97; i <= 122; i++) {
            special.w[String.fromCharCode(i)] = 0xff41 + (i - 97)
        }

        const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        const numbers = '0123456789';

        var getType = function (variant) {
            if (variantOffsets[variant]) return variantOffsets[variant]
            if (offsets[variant]) return variant;
            return 'm'; //monospace as default
        }
        var getFlag = function (flag, flags) {
            if (!flags) return false
            return flags.split(',').indexOf(flag) > -1
        }

        var type = getType(variant);
        var underline = getFlag('underline', flags);
        var strike = getFlag('strike', flags);
        var result = '';

        for (var k of str) {
            let index
            let c = k
            if (special[type] && special[type][c]) c = String.fromCodePoint(special[type][c])
            if (type && (index = chars.indexOf(c)) > -1) {
                result += String.fromCodePoint(index + offsets[type][0])
            } else if (type && (index = numbers.indexOf(c)) > -1) {
                result += String.fromCodePoint(index + offsets[type][1])
            } else {
                result += c
            }
            if (underline) result += '\u0332' // add combining underline
            if (strike) result += '\u0336' // add combining strike
        }
        return result
    }
    </script>
</body>
