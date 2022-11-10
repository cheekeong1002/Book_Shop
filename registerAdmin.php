<?php include "header_admin.php"; include "createAdminTable.php"; include "processRegAdmin.php"?>
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
        <div class="container">
            <div class="inner-container">
                <!-- <form>
                    <label>Username:</label>
                    <input name="username" id="username">
                    <br/>
                    <label>Password:</label>
                    <input name="password" id="password">
                </form> -->
                <div class="title">
                    <h1>Register</h1>
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
                <form method="post" action="registerAdmin.php">
                    <div class="form-group">
                        <label for="inputEmail4">Email</label>
                        <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email" value="<?php echo $email;?>" required>
                    </div>
                    <div class="form-group">
                        <label for="validationDefaultUsername">Username</label>
                        <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" placeholder="Username" name="username" value="<?php echo $username;?>" required>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword4">Password</label>
                        <input type="password" class="form-control" id="inputPassword4" placeholder="Password" name="password" value="<?php echo $password;?>" required>
                      </div>
                      
                    <div class="form-group">
                        <label for="inputState">Privilege</label>
                        <select id="inputState" class="form-control" name="privilege" required>
                            <option style="display-none">
                            <option>High</option>
                            <option>Low</option>
                        </select>
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
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
