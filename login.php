<?php
    include "includes/connect.php";
    require_once "includes/templates/header.php";
    if(isset($_GET['logout'])):
        session_destroy();
    elseif(isset($_SESSION['firstname'])):
        header('Location: index.php');
    endif;
    if(isset($_POST['login'])):
        $email = ver($_POST['email']);
        $pass = ver($_POST['pass']); 
        session_start();
        $sql="SELECT first_name, Type, password FROM `users` WHERE `email`='$email' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        if(mysqli_num_rows($result) > 0 && password_verify($pass, $row['password']) && $result):
            $_SESSION['firstname'] = $row['first_name'];
            $_SESSION['type'] = $row['Type'];
            header('Location: index.php');
        else:
            echo"<script>alert('The email or password is not existed.');</script>";
        endif;
    elseif (isset($_POST['sign'])):
        $fname = ver($_POST["fname"]);
        $lname = ver($_POST["lname"]);
        $email = ver($_POST["email"]);
        $pass = ver($_POST["pass"]);
        $cpass = ver($_POST["cpass"]);
        if($pass==$cpass) :
            $pass = password_hash($pass, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (first_name, last_name, email, password, Type) VALUES('" . $fname . "','" . $lname . "','" . $email . "','" . $pass . "', '0')";
            $_SESSION['firstname'] = $fname;
            $_SESSION['email'] = $email;
            if (!mysqli_query($conn, $sql)):
                 echo"<script>
                    alert('The email is already existed');
                </script>";
            else:
                header('Location: index.php');
            endif;
        else:
            echo"<script>alert('The passwords are not identical.');</script>";
        endif;
    endif;
    ?>
    <div class="image">
        <img src="layout/images/icon_head.png" alt="Help in healing" title="Help in healing">
    </div>
    <div class="register">
        <form method="POST" action="login.php" class="login-form">
            <h2>Login</h2>
            <hr>
            <input type="email" placeholder="Email" class="not-text" name="email" value = "<?php if(isset($email)){ echo $email;} ?>" autocomplete="off" required>
            <input type="password" placeholder="Password" class="not-text" name="pass" value = "<?php if(isset($pass)){ echo $pass;} ?>" autocomplete="new-password" required>
            <input type="submit" value="Login" class="btnsign" name="login"><br>
            <a href="#" class="forget-password">Forget Passowrd?</a>
        </form>
        <form method="POST" action="login" class="signup-form">
            <h2>Sign up</h2>
            <hr>
            <input type="text" placeholder="First Name" name="fname" value = "<?php if(isset($fname)){ echo $fname;} ?>" autocomplete="off" required>
            <input type="text" placeholder="Last Name" name="lname" value = "<?php if(isset($lname)){ echo $lname;} ?>" autocomplete="off" required>
            <input type="email" placeholder="Email" class="not-text" name="email" value = "<?php if(isset($email)){ echo $email;} ?>" required>
            <input type="password" placeholder="Password" class="not-text" name="pass" value = "<?php if(isset($pass)){ echo $pass;} ?>" autocomplete="new-password" required>
            <input type="password" placeholder="Confirm Password" class="not-text" name="cpass" value = "<?php if(isset($cpass)){ echo $cpass;} ?>" autocomplete="new-password" required>
            <input type="submit" value="Sign up" class="btnsign" name="sign">
        </form>
    </div>
    <?php require_once 'includes/templates/footer.php';
