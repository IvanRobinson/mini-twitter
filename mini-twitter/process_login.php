<?php
   require_once('data.php');
   $username = $_POST['username'];
   $password = $_POST['password'];
   $query = "select username, name, password from users where username = '$username' ";
   if ($result = $conn->query($query)) {
      if ($row = $result->fetch_object()){
         if (strcmp($row->password, $password)==0){
            session_start();
            $_SESSION['username'] = $row->username;
            $_SESSION['name'] = $row->name;
            header("Location: time_line.php");
         } else {
            session_start();
            $_SESSION['error'] = "usuário ou senha incorretos";
            header("Location: login.php");
         }
      } else {
         session_start();
         $_SESSION['error'] = "usuário ou senha incorretos";
         header("Location: login.php");
      }
   } else {
      die ("erro no banco de dados");
   }
?>