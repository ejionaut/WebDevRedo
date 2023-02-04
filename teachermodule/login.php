<?php   
require 'sessionConfig.php';
 $msg="";  
 if(!empty($_SESSION["user_id"])) {
    header("Location: teacherModule.php");
 }
 if (isset($_POST['submit'])) {  
      $username= $_POST['username'];  
      $password= $_POST['password'];  
      $sql = mysqli_query($conn,"SELECT user_id,password FROM accounts WHERE user_id < '2000' AND user_id='$username' AND password='$password'");  
      $row = mysqli_fetch_assoc($sql);  
      if (mysqli_num_rows($sql) > 0) {  
        if($password == $row["password"]) {
            $_SESSION["login"] = true;
            $_SESSION["user_id"]=$row['username'];
            header("Location: teacherModule.php");  

        } else {
            $msg="Wrong username or password";  
        }
      }else{  
           $msg="No such user";  
      }  
 }  
 ?>  

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Teacher Login Page </title>
    <link rel="stylesheet" href="./styles/loginTeacher.css">
</head>
<body>
    <div>
        <div>
            <img src="./images/logo_white.png" alt="">
            <h1> Staff Login </h1>
        </div>
        <main>
            <form method="post" action="">
                <div class="errorMsg"><?php echo $msg ?> </div>
                    <div>
                        <label>Username: </label>
                        <input type="text" placeholder="Enter Username" id="username" name="username" required>
                    </div>
                    <div>
                        <label>Password: </label>
                        <input type="password" placeholder="Enter Password" id="password" name="password" required>
                    </div>
                    <button type="submit" name="submit" value="submit">Login</button>
            </form>
            <div>
                    <h2> If password is forgotten please contact management</h2>
            </div>
        </main>
    </div>


</body>
</html>