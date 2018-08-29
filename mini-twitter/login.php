<html lang="pt">
<head>
   <title>Mini Twitter</title>
   <link rel="stylesheet" href="css/style.css" />
   <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet"/>
   <link rel="icon" href="favicon.ico" type="image/x-icon" />
</head>
<body>
   <main>
   <?php include("header.php"); ?>
   <section id="panel">
      <header><h1>Identifique-se</h1></header>
      <form method="post" action="process_login.php">
         <label for="txtLogin">E-mail/usuário</label><br />
         <input type="text" id="txtLogin" name="username" class="input-text" size="50" placeholder="seu nome de usuário"/><br />
         <label for="txtLogin">Senha</label><br />
         <input type="password" id="txtPassword" name="password"  class="input-text" size="50" placeholder="sua senha"/><br />
         <input type="checkbox" id="chkRemember" name="remember">Lembrar meu nome de usuário</input><br />
         <br />
         <?php
            session_start();
            $error = $_SESSION['error'];
            if (isset($error)){
               echo "<div class='error'>$error</div>";
            }
            unset($_SESSION['error']);
         ?>
         <footer>
            <input type="submit" value="Entrar" class="button"/>
            <input type="button" value="Esqueci a senha" class="button" onclick="window.location='esqueci.php';"/>
         </footer>
      </form>
   </section>
      <?php include("footer.php"); ?>
   </main>
</body>
</html>