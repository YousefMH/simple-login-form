<?php
    session_start();

    include("connection.php");
    include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST"){

    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if(!empty($user_name) && !empty($password) && !is_numeric($user_name)){

        //save to db
        $user_id = random_num(20);
        $query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";
        mysqli_query($con, $query);

        header('Location: login.php');
        die;
    }else{
        echo "Plese enter some valid infromation!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <style>
        #text{
            height: 25px;
            border-radius: 5px;
            padding: 4px;
            border: solid thin #aaa;
            width: 100%;
        }

        #button{

            padding: 10px;
            width: 100px;
            color: white;
            background-color: blue;
            border: none;

        }

        #box{

            margin: auto;
            width: 300px;
            padding: 20px;
        }

    </style>
</head>
<body>
    <div id="box">
        <div style="font-size: 20px; margin:10px;">Signup</div>
        <form method="POST">
            <input id="text" type="text" name="user_name"><br><br>
            <input id="text" type="password" name="password"><br><br>

            <input id="button" type="submit" value="Signup"><br><br>

            <a href="login.php">Click To Login</a><br><br>
        </form>
    </div>
</body>
</html>