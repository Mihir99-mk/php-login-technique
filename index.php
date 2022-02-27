<!DOCTYPE html>
<html lang="en">

<?php
session_start();

if (!$_SESSION['fname']) {
    header('location: send.php');
}


if (isset($_POST['login'])) {
    $e = $_POST['e'];
    $p = $_POST['p'];
    $datetime = new DateTime();
    $string = $datetime->format('m/d/Y H:i A');

    // strtotime()

    $_SESSION['fname'];
    $_SESSION['mname'];
    $_SESSION['lname'];
    $_SESSION['bname'];
    $_SESSION['contact'];
    $_SESSION['email'];
    $_SESSION['tex'];
    $_SESSION['gender'];
    $_SESSION['degree'];
    $_SESSION['uni'];
    $_SESSION['date'];
    $_SESSION['per'];
    $_SESSION['ld'];
    $_SESSION['user'];
    $_SESSION['datetime'] = $string;
    


    $msg = array();

    if ($e == 'mihir@gmail.com' && $p == '123') {
        $datetime = new DateTime();
        $datetime->format('m/d/Y g:i A');

        if (isset($_POST['r'])) {
            setcookie('email', $e, time() + (60 * 5));
            setcookie('password', $p, time() + (60 * 5));
            setcookie('datetime', $datetime, time() + (60 * 5));
        } else {
            setcookie('email', "");
            setcookie('password', "");
        }
        $_SESSION['IS_LOGIN'] = 'yes';
        header('location: get.php');
    } elseif (empty($e) && empty($p)) {
        $msg['1'] = "input cannot be empty";
        // header('location: index.php');
    } elseif ($e != 'mihir@gmail.com') {
        $msg['2'] = "fill proper correct email";
        // header('location: index.php');
    } elseif ($p != '123') {
        $msg['3'] = "fill proper correct password";
    }
}



$e_c = '';
$p_c = '';
$s_r = '';

if (isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
    $e_c = $_COOKIE['email'];
    $p_c = $_COOKIE['password'];
    $s_r = "checked='checked'";
}

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Login</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            height: 100%;
            width: 100%;
            background-color: #D3D3D3;
        }



        form {
            width: 500px;
            padding: 60px;
            margin: 80px 550px;
            align-items: center;
            background-color: white;
            align-items: center;
            border-radius: 20px;
        }

        .er {
            font-size: smaller;
            color: red;
        }

        label {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-size: medium;
        }

        span {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-size: medium;
        }

        input {
            /* width: 240px; */
            padding: 2px;
            border-radius: 4px;
        }

        input[type=checkbox] {
            /* width: 240px; */
            padding: 4px;
            border-radius: 4px;
        }

        .error {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            color: red;
        }

        #submit {
            padding: 8px;
            width: 100px;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-size: medium;
        }
    </style>
</head>

<body>
    
    <form method="POST" action="" name="data" novalidate>

        <label>E-mail address : </label>
        <input type="email" name="e" id="email" value="<?php if (isset($e_c)) echo $e_c; ?>" required>

        <br><br>


        <label>Password : </label>
        <input type="password" name="p" id="password" value="<?php if (isset($p_c)) echo $p_c; ?>" required>

        <br><br>


        <span>Rememeber Me</span>
        <input type="checkbox" name="r" id="rem" <?php if (isset($s_r)) echo $s_r; ?>>

        <br><br>



        <span class="er">
            <?php if (isset($msg['1'])) echo $msg['1']; ?></span>
        <span class="er">
            <?php if (isset($msg['2'])) echo $msg['2']; ?></span>
        <span class="er">
            <?php if (isset($msg['3'])) echo $msg['3']; ?></span>


        <input type="submit" name="login" id="submit" value="Submit" />

    </form>





</body>

</html>