<html lang="pt">
<head>
   <title>Mini Twitter</title>
   <link rel="stylesheet" href="css/style.css" />
   <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet"/>
   <link rel="icon" href="favicon.ico" type="image/x-icon" />
   <script>
      function executar(){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var data = JSON.parse(this.responseText);
                alert(data.nome);
            }
        };
        xmlhttp.open("GET", "logic/json.php", true);
        xmlhttp.send();
      }
   </script>
</head>
<body>
   <main>
   <?php include("header.php"); ?>
   <section id="panel">
      <header>
         Um teste com Ajax
      </header>
      <div>
         <input type="button" value="Ajax" onclick="executar()" />
      </div>
   </section>
   <?php include("footer.php"); ?>
   </main>
</body>
</html>