<?php
    session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Business Registration Form</title>
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

        label {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }

        input {
            width: 240px;
            padding: 2px;
            border-radius: 4px;
        }

        br {
            padding: 20px;
        }

        .error {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            color: red;
        }

        #submit {
            margin-top: 20px;
            padding: 8px;
            border-radius: 6px;
            font-weight: 800;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;

        }

        #add {
            width: 100px;
            padding: 8px;
            border-radius: 6px;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-weight: 800;
        }

        .gender {
            display: flex;
            display: inline;
            margin: 0;
        }
    </style>
</head>

<body>
    <?php

    $errors = array();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $bname = $_POST['bname'];
        $contact = $_POST['contact'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $tex = $_POST['tex'];
        $tob = $_POST['tob'];
        $hob = $_POST['hob'];
        $ld = $_POST['ld'];


        $vaild = true;

        if (empty($fname)) {
            $vaild = false;

            $errors['fn'] = "first name cannot be empty";
        } elseif (!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-][0-9]/', $fname)) {
            $vaild = false;

            $errors['fs'] = "first name should not contain any number or special symbol";
        }

        if (empty($mname)) {
            $vaild = false;

            $errors['mn'] = "middle name cannot be empty";
        } elseif (!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-][0-9]/', $mname)) {
            $vaild = false;

            $errors['ms'] = "middle name should not contain any number or special symbol";
        }

        if (empty($lname)) {
            $vaild = false;

            $errors['ln'] = "last name cannot be empty";
        } elseif (!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-][0-9]/', $lname)) {
            $vaild = false;

            $errors['ls'] = "last name should not contain any number or special symbol";
        }

        if (empty($bname)) {
            $vaild = false;

            $errors['bn'] = "business name cannot be empty";
        }

        if (empty($contact)) {
            $vaild = false;

            $errors['cn'] = "contact number cannot be empty";
        } elseif ($contact < !11) {
            $vaild = false;

            $errors['c1n'] = "contact number is greater than 10";
        }


        if (empty($email)) {
            $vaild = false;

            $errors['en'] = "email cannot be empty";
        } elseif (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email)) {
            $vaild = false;

            $errors['e1n'] = "email address is not contain @gmail.com or @yahoo.com";
        }

        if (empty($password)) {
            $vaild = false;

            $errors['pn'] = "password cannot be empty";
        }
        //  elseif (strlen($password) <= 6) {
        //     $vaild = false;

        //     $errors['pn1'] = "password length should be more than 6 characters";
        // }
        //  elseif (!preg_match("^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$", $password)) {
        //     $vaild = false;

        //     $errors['pn2'] = "password should contains alphanumeric characters having any one special symbol ";
        // }

        if (empty($tex)) {
            $vaild = false;

            $errors['tn'] = "address cannot be empty";
        }

        if (empty($cpassword)) {
            $vaild = false;
            $errors['cpn'] = "password cannot be empty";
        } elseif ($password != $cpassword) {
            $vaild = false;
            $errors['c1pn'] = "confirm password and password is not matching";
        }

        if (empty($ld)) {
            $vaild = false;
            $errors['ldn'] = "license date is empty";
        }


        if (empty($tob)) {
            $vaild = false;
            $errors['tbn'] = "business name cannot be empty";
        }

        if (empty($hob)) {
            $vaild = false;
            $errors['hn'] = "hobbie name cannot be empty";
        }

        if ($vaild) {
            $_SESSION['fname'] = $_POST['fname'];
            $_SESSION['mname'] = $_POST['mname'];
            $_SESSION['lname'] = $_POST['lname'];
            $_SESSION['bname'] = $_POST['bname'];
            $_SESSION['contact'] = $_POST['contact'];
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['tex'] = $_POST['tex'];
            $_SESSION['gender'] = $_POST['gender'];
            $_SESSION['degree'] = $_POST['degree'];
            $_SESSION['uni'] = $_POST['uni'];
            $_SESSION['date'] = $_POST['date'];
            $_SESSION['per'] = $_POST['per'];
            $_SESSION['ld'] = $_POST['ld'];
            // $_SESSION['user'] = $_POST['user'];
            $_SESSION['user'] = array(array('degree' => $_SESSION['degree'], 'uni' => $_SESSION['uni'], 'per'=>$_SESSION['per'], 'date'=>$_SESSION['date']));
            // gender
            header('location: index.php');
            exit();
        }

        // if (empty($lid)) {
        //     $errors['ln'] = "licence issue date cannot be empty";
        // }
    }





    ?>
    <form method="post" action="" id="myform" name="data" novalidate>

        <label>first name : </label>
        <input type="text" name="fname" id="fname" required>
        <p class="error"><?php if (isset($errors['fn'])) echo $errors['fn']; ?></p>
        <p class="error"><?php if (isset($errors['fs'])) echo $errors['fs']; ?></p>
        <br><br>

        <label>middle name : </label>
        <input type="text" name="mname" id="mname" required>
        <p class="error"><?php if (isset($errors['mn'])) echo $errors['mn']; ?></p>
        <p class="error"><?php if (isset($errors['ms'])) echo $errors['ms']; ?></p>
        <br><br>


        <label>Last name : </label>
        <input type="text" name="lname" id="lname" required>
        <p class="error"><?php if (isset($errors['ln'])) echo $errors['ln']; ?></p>
        <p class="error"><?php if (isset($errors['ls'])) echo $errors['ls']; ?></p>
        <br><br>


        <label>Business name : </label>
        <input type="text" name="bname" id="bname" required>
        <p class="error"><?php if (isset($errors['bn'])) echo $errors['bn']; ?></p>
        <br><br>


        <label>Contact Number : </label>
        <input type="number" name="contact" id="contact" required>
        <p class="error"><?php if (isset($errors['cn'])) echo $errors['cn']; ?></p>
        <p class="error"><?php if (isset($errors['c1n'])) echo $errors['c1n']; ?></p>
        <br><br>


        <label>E-mail address : </label>
        <input type="email" name="email" id="email" required>
        <p class="error"><?php if (isset($errors['en'])) echo $errors['en']; ?></p>
        <p class="error"><?php if (isset($errors['e1n'])) echo $errors['e1n']; ?></p>
        <br><br>


        <label>Password : </label>
        <input type="password" name="password" id="password" required>
        <p class="error"><?php if (isset($errors['pn'])) echo $errors['pn']; ?></p>
        <p class="error"><?php if (isset($errors['pn1'])) echo $errors['pn1']; ?></p>
        <p class="error"><?php if (isset($errors['pn2'])) echo $errors['pn2']; ?></p>
        <br><br>


        <label>confirm password : </label>
        <input type="password" name="cpassword" id="cpassword" required>
        <p class="error"><?php if (isset($errors['cpn'])) echo $errors['cpn']; ?></p>
        <p class="error"><?php if (isset($errors['c1pn'])) echo $errors['c1pn']; ?></p>
        <br><br>


        <label>Address : </label>
        <textarea name="tex" id="tex" cols="50" rows="5" required></textarea>
        <p class="error"><?php if (isset($errors['tn'])) echo $errors['tn']; ?></p>
        <br><br>

        <label>Type of Business : </label>
        <input type="text" name="tob" id="tob" required>
        <p class="error"><?php if (isset($errors['tbn'])) echo $errors['tbn']; ?></p>
        <br><br>
        <label>Gender : </label>
        <label class="radio-inline">
            <input type="radio" value="Male" name="gender" checked>Male
            <input type="radio" value="Female" name="gender">Female
        </label>

        <br><br>
        <label>hobbies : </label>
        <input type="text" name="hob" id="hob" required>
        <p class="error"><?php if (isset($errors['hn'])) echo $errors['hn']; ?></p>
        <br><br>

        <label>licence issue date : </label>
        <input type="date" name="ld" id="ld" required>
        <p class="error"><?php if (isset($errors['ldn'])) echo $errors['ldn']; ?></p>
        <br><br>

        <button type="button" id="add" name="add">Add</button>
        <div id="get"></div>


        <input type="submit" name="submit" id="submit" disabled='disabled' value="Submit" />

    </form>







    <script>
        $(document).ready(function() {
            var i = 1;
            $("#add").click(function() {
                i++;
                $('#get').append('<br><label>degree name : </label>' +
                    '<input type="text" name="degree" id="degree"><br><br>' +
                    '<label>university/board : </label>' +
                    '<input type="text" name="uni" id="un"><br><br>' +
                    '<label>percentage : </label>' +
                    '<input type="number" name="per" id="per"><br><br>' +
                    '<label>year of passing : </label>' +
                    '<input type="date" name="date" id="date"><br><br><br>')
            });
        });

        // (function() {
        $('#myform > input').keyup(function() {

            var empty = false;
            $('form > input #ld').each(function() {
                if ($(this).val() == '') {
                    empty = true;
                }
            });

            if (empty) {
                $('#submit').attr('disabled', 'disabled');
            } else {
                $('#submit').removeAttr('disabled');
            }
        });


        // })()
    </script>
</body>

</html>