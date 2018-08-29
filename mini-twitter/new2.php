<html lang="pt">
<head>
   <title>Mini Twitter</title>
   <link rel="stylesheet" href="css/style.css" />
   <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet"/>
   <link rel="icon" href="favicon.ico" type="image/x-icon" />
   <script>
      function enviar(){
         var txtNome = document.getElementById("txtNome");
         var txtUsername = document.getElementById("txtUsername");
         var txtEmail = document.getElementById("txtEmail");
         var txtSenha = document.getElementById("txtSenha");
         var txtConfirmaSenha = document.getElementById("txtConfirmaSenha");
         var txtDataNascimento = document.getElementById("txtDataNascimento");
         var txtSexo = document.getElementById("txtSexo");
         var txtCidade = document.getElementById("txtCidade");
         var txtWebsite = document.getElementById("txtWebsite");
         var frmNew = document.getElementById("frmNew");
         if (!frmNew.checkValidity()) {
            document.getElementById("error").style.display="block";
            var error = "";
            if (!txtNome.checkValidity()){
               error += "Nome: "+txtNome.validationMessage+"\n";
            }
            if (!txtEmail.checkValidity()){
               error += "E-mail: "+txtEmail.validationMessage;
            }
            document.getElementById("error").innerText = error;
         } else {
            document.getElementById("error").style.display="none";
            var nome = txtNome.value;
            var username = txtUsername.value;
            var email = txtEmail.value;
            var senha = txtSenha.value;
            var confirmaSenha = txtConfirmaSenha.value;
            var dataNascimento = txtDataNascimento.value;
            var sexo = txtSexo.value;
            var cidade = txtCidade.value;
            var website = txtWebsite.value;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var data = this.responseText;
                    alert(data);
                }
            };
            params = "name="+nome
                        +"&username="+username
                        +"&email="+email
                        +"&password="+senha
                        +"&confirmation="+confirmaSenha
                        +"&birthDate="+dataNascimento
                        +"&sex="+sexo
                        +"&city="+cidade
                        +"&website="+website;
            alert(params);
            xmlhttp.open("POST", "logic/process_new_ajax.php", true);
            xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xmlhttp.send(params);
         }
      }
   </script>
</head>
<body>
   <main>
   <?php include("header.php"); ?>
   <section id="panel">
      <header><h1>Criar uma nova conta</h1></header>
      <form method="post" action="process_new.php" id="frmNew">
         <input type="text" id="txtNome" class="input-text" name="name" size="50" placeholder="nome" required="true"/><br />
         <input type="text" pattern="[a-zA-Z][a-zA-Z0-9]*" id="txtUsername" class="input-text" name="username" size="50" placeholder="nome de usuário"/><br />
         <input type="email" id="txtEmail" class="input-text" name="email" size="50" placeholder="e-mail"/><br />
         <input type="password" id="txtSenha" class="input-text" name="password" size="50" placeholder="senha"/><br />
         <input type="password" id="txtConfirmaSenha" class="input-text" name="confirmation" size="50" placeholder="confirme a senha"/><br />
         <input type="text" id="txtDataNascimento" class="input-text" name="birthDate" size="50" placeholder="data de nascimento"/><br />
         <select id="txtSexo" class="input-text" name="sex">
            <option value="">Selecione</option>
            <option value="f">Feminino</option>
            <option value="m">Masculino</option>
            <option value="n">Não informado</option>
         </select><br />
         <input type="text" id="txtCidade" class="input-text" name="city" size="50" placeholder="cidade"/><br />
         <input type="text" id="txtWebsite" class="input-text" name="website" size="50" placeholder="website"/><br />
         <br />
         <div class="error" id="error" style="display:none;"></div>
         <br />

         <footer>
            <input type="button" value="Enviar" class="button send" style="height: 50px;" onclick="enviar()"/>
            <input type="reset" value="Limpar" class="button" style="height: 50px;"/>
         </footer>
      </form>
   </section>
   <?php include("footer.php"); ?>
   </main>
</body>
</html>