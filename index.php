<?php
$name = $pass = '';
$nameErr = $passErr = '';
$userpassErr = '';

function validation($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (empty($_POST['username']))
        {
            $nameErr = "<span style='color: red'>*Name is required.</span>";
        }elseif (!preg_match("/^[a-zA-Z ]*$/",$_POST['username']))
        {
            $nameErr = "<span style='color: red'>*Only Letters & Space Accepted</span>";
        }else
        {
            $name = validation($_POST['username']);
        }

        if (empty($_POST['password']))
        {
            $passErr = "<span style='color: red'>*Name is required.</span>";
        }else
        {
            $pass = validation($_POST['password']);
        }



        if ($_POST['username']=='shajib' && $_POST['password'] == 'password')
        {
            header("Location: success.php");
        }else
        {
            $userpassErr = "<span style='color: red'>*Invalid Username & Password.</span>";
        }
    }

?>

<!Doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="Favicon.png" type="image/png">
</head>
<body>

<div class="login">
    <img class="avatar" src="person-flat.png" alt="login">
    <h2>Login</h2>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
        <p>Email Address</p>
        <input type="text" name="username" placeholder="Enter Username"><span><?php echo $nameErr?></span>
        <p>Password</p>
        <input type="password" name="password" placeholder="Enter Your Password"><span><?php echo $passErr?></span>
        <input type="submit" name="submit" value="Sign In">

        <span><?php echo $userpassErr?></span>
        <a href="#">Forget Password</a>
    </form>
</div>

</body>
</html>
