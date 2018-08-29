<?php
   require_once('data.php');
   require_once('util.php');
   $name = fromPost('name');
   $username = fromPost('username');
   $email = fromPost('email');
   $password = fromPost('password');
   $birthDate = fromPost('birthDate');
   $sex = fromPost('sex');
   $city = fromPost('city');
   $website = fromPost('website');
   $confirmation = fromPost('confirmation');
   $errors = "";
   if (!isValid($name)){
      $errors .= li("Nome é obrigatório");
   }
   if (!isValid($username)){
      $errors .= li("Nome de usuário é obrigatório");
   }
   if (!isValid($email)){
      $errors .= li("E-mail é obrigatório");
   }
   if (!isValid($sex)){
      $errors .= li("Sexo é obrigatório");
   }
   if (!isValid($password)){
      $errors .= li("Senha é obrigatória");
   }
   if (!isValid($confirmation)){
      $errors .= li("Confirmação de senha é obrigatória");
   }
   if ($errors) {
      session_start();
      $_SESSION['error'] = ul($errors);
      header("Location: new.php");
      exit();
   }
   if (strcmp($confirmation, $password)!=0){
      session_start();
      $_SESSION['error'] = "a senha e a confirmação devem ser iguais";
      $_SESSION['name'] = $name;
      header("Location: new.php");
   } else {
      $stmt = $conn->prepare("INSERT INTO users (name, username, email, password, sex, city, website, birthDate ) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
      $stmt->bind_param("ssssssss", $name, $username, $email, $password, $sex, $city, $website, $birthDate);
      if ($stmt->execute()){
         header("Location: index.php");
      } else {
         session_start();
         $_SESSION['error'] = "erro no banco de dados. ".$conn->error;
         header("Location: new.php");
      }
   }
?>