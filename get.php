<?php
session_start();


if (!$_SESSION['fname']) {
    header('location: send.php');
}

if (!$_SESSION['IS_LOGIN']) {
    header('location: index.php');
}



if (empty($_POST['degree'])) {
} else {
    $_SESSION['degree'] = $_POST['degree'];
}

if (empty($_POST['uni'])) {
} else {
    $_SESSION['uni'] = $_POST['uni'];
}

if (empty($_POST['per'])) {
} else {
    $_SESSION['per'] = $_POST['per'];
}

if (empty($_POST['date'])) {
} else {
    $_SESSION['date'] = $_POST['date'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data</title>
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
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }

        .b {
            background-color: white;
            padding: 40px;
            border-radius: 8px;
            width: 780px;
            margin-top: 200px;
            margin-left: 450px;
        }

        .d {
            padding-bottom: 12px;
        }

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 8px;
        }
    </style>
</head>


<body>
    <div class="b">
        <div class="a">
            <small>Last Login : <?php echo $_SESSION['datetime'] ?></small><br><br><br>
            <?php
            if ($_SESSION['gender'] == 'Male') {
                echo ucwords('<p class = "d">' . 'Mr.' . ' ' . $_SESSION['fname'] . ' ' . $_SESSION['mname'] . ' ' . $_SESSION['lname'] . '</p>');
            } else if ($_SESSION['gender'] == 'Female') {
                echo ucwords('<p  class = "d">' . 'Ms.' . ' ' . $_SESSION['fname'] . ' ' . $_SESSION['mname'] . ' ' . $_SESSION['lname'] . '</p>');
            }
            ?><br>
            <p class="d"><?php echo strtolower($_SESSION['email']); ?></p><br>
            <table class="table table-hover">
                <tr>
                    <th>Degree Name</th>
                    <th>University/Board</th>
                    <th>Percentage</th>
                    <th>Year Of Passing </th>
                </tr>
                <tr>
                    
                    Qualification<br>
                    <!-- <?php if ($_SESSION['date']) {
                                rsort($_SESSION['date']);
                                echo $_SESSION['date'];
                            } else {
                                echo 'none';
                            } ?> -->
                    <td><?php if (isset($_SESSION['user'][0]['degree'])) {
                            echo $_SESSION['user'][0]['degree'];
                        } else {
                            echo "None";
                        } ?></td>
                    <td><?php if (isset($_SESSION['user'][0]['uni'])) {
                            echo $_SESSION['user'][0]['uni'];
                        } else {
                            echo "None";
                        } ?></td>
                    <td><?php if (isset($_SESSION['user'][0]['per'])) {
                            echo $_SESSION['user'][0]['per'];
                        } else {
                            echo "None";
                        } ?></td>
                    <td><?php if (isset($_SESSION['user'][0]['date'])) {
                            echo $_SESSION['user'][0]['date'];
                        } else {
                            echo "None";
                        } ?></td>
                    <?php

                    // }
                    // }
                    ?>

                </tr>
            </table>

            <?php


            $month = date("m", strtotime($_SESSION['ld']));
            $day = date("d", strtotime($_SESSION['ld']));
            $year = date("Y", strtotime($_SESSION['ld']));

            $date = $year . "-" . $month . "-" . $day;

            $timestamp = strtotime($date);

            $remainingDays = (int)date('t', $timestamp) - (int)date('j', $timestamp);
            ?>
            <br>

            <p>Business licence get expired after <?php echo $remainingDays; ?> day/days</p><br><br><br>

            <!-- <p><?php echo $_SESSION['datetime'] ?></p> -->


            <a href="logout.php">LoginOut</a><br><br>

            <a href="clear.php">Clear Session</a>

        </div>
    </div>
</body>

</html>