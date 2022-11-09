<!DOCTYPE html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" contents="IE=edge">
        <title>Update Book</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap-grid.css">
        <link rel="stylesheet" href="css/bootstrap-reboot.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/styleHeaderAdmin.css">
        <link rel="stylesheet" href="css/styleLoginRegisterAdmin.css">
    </head>
    
    <body>
        <header>
            <img class="logo" src="images/logo.png" alt="logo">
        </header>
        <?php include "processLoginAdmin.php" ?>
        <div class="container">
            <div class="inner-container">
                <div class="title">
                    <h1>Login</h1>
                </div>
                <div class="login-form">
                <form method="post" action="loginAdmin.php" >
                    <div class="form-group">
                      <label for="validationDefaultUsername">Username</label>
                      <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" placeholder="" name="username" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="" name="password" required>
                    </div>
                    <?php
                        if(isset($invalid)){
                            echo "<div class='form-group'><small>\"$invalid\"</small></div>";
                        } 
                        if(isset($_SESSION['privilege'])){
                            echo "<div class='form-group'><small>\"{$_SESSION['privilege']}\"</small></div>";
                        }
                        
                    ?> 
                    <button type="submit" class="btn btn-primary" name="login">Login</button>
                </form>
                </div>
            </div>
            
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>