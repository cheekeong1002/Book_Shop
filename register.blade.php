

<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" contents="IE=edge">
        <title>Register</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/css/bootstrap-grid.css">
        <link rel="stylesheet" href="/css/bootstrap.css">
        <link rel="stylesheet" href="/css/styleLoginRegisterUser.css">
    </head>
    @include('header')
    <body>
        <div class="container">
            <div class="register-inner-container">
                <!-- <form>
                    <label>Username:</label>
                    <input name="username" id="username">
                    <br/>
                    <label>Password:</label>
                    <input name="password" id="password">
                </form> -->
                <div class="title">
                    <h1><center>Register</center></h1>
                </div>
                <div class="register-form">
                <!-- <form>
                    <div class="form-group">
                      <label for="validationDefaultUsername">Username</label>
                      <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" placeholder="" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Sign up</button>
                </form> -->
                <form method="post" action="{{ route('auth.save') }}">
                    @if (Session::get('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                    @endif

                    @if (Session::get('fail'))
                    <div class="alert alert-danger">
                        {{ Session::get('fail') }}
                    </div>
                    @endif

                    @csrf
                    
                    <div class="form-group">
                        <label for="inputUsername">Username</label>
                        <input type="text" class="form-control" id="inputUsername" placeholder="Username" name="username" value="{{ old('username') }}" required>
                        <div class="error_message">
                            <span class="text-danger">@error('username'){{ $message }} @enderror</span>
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">Email</label>
                        <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email" value="{{ old('email') }}" required>
                        <div class="error_message">
                            <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Address</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="Address" name="address" value="{{ old('address') }}" required>
                        <div class="error_message">
                            <span class="text-danger">@error('address'){{ $message }} @enderror</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword">Password</label>
                        <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password" required>
                        <div class="error_message">
                            <span class="text-danger">@error('password'){{ $message }} @enderror</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword4">Retype Password</label>
                        <input type="password" class="form-control" id="inputRePassword" placeholder="Retype Password" name="password_confirmation" required>
                        <div class="error_message">
                            <span class="text-danger">@error('password_confirmation'){{ $message }} @enderror</span>
                        </div>
                    </div>
                    
                    <!-- </div> -->
                    <!-- <div class="form-group">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck">
                        <label class="form-check-label" for="gridCheck">
                          Check me out
                        </label>
                      </div>
                    </div> -->
                    <button type="submit" class="btn btn-primary" name="reg_admin">Register</button>
                </form>
                <div class="link">
                    <a href="{{ route('auth.login') }}" class="link_font">I have an account</a>
                </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>

    
