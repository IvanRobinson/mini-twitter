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
      <header><h1>Criar uma nova conta</h1></header>
      <form method="post" action="process_new.php">
         <input type="text" id="txtNome" class="input-text" name="name" size="50" placeholder="nome"/><br />
         <input type="text" pattern="[a-zA-Z][a-zA-Z0-9]*" id="txtUsername" class="input-text" name="username" size="50" placeholder="nome de usuário"/><br />
         <input type="email" id="txtEmail" class="input-text" name="email" size="50" placeholder="e-mail"/><br />
         <input type="password" id="txtSenha" class="input-text" name="password" size="50" placeholder="senha"/><br />
         <input type="password" id="txtConfirmaSenha" class="input-text" name="confirmation" size="50" placeholder="confirme a senha"/><br />
         <input type="text" id="txtDataNascimento" class="input-text" name="birthDate" size="50" placeholder="data de nascimento"/><br />
         <select id="txtSex" class="input-text" name="sex">
            <option value="">Selecione</option>
            <option value="f">Feminino</option>
            <option value="m">Masculino</option>
            <option value="n">Não informado</option>
         </select><br />
         <input type="text" id="txtCidade" class="input-text" name="city" value="<?=$city?>" size="50" placeholder="cidade"/><br />
         <input type="text" id="txtWebsite" class="input-text" name="website" value="<?=$website?>" size="50" placeholder="website"/><br />
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
            <input type="submit" value="Enviar" class="button send"/>
            <input type="reset" value="Limpar" class="button"/>
         </footer>
      </form>
   </section>
   <?php include("footer.php"); ?>
   </main>
</body>
</html>