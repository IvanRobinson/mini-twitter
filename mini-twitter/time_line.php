<?php require_once("check_user.php")?>
<html lang="pt">
<head>
   <title>Mini Twitter</title>
   <link rel="stylesheet" href="css/style.css" />
   <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet"/>
   <link rel="icon" href="favicon.ico" type="image/x-icon" />
</head>
<body>
    <div>
   <main>
   <?php include("header.php"); ?>
   <div>
      Olá <?php echo $auth_name; ?>
   </div>
   <section id="twitt-panel">
      <header><h1>O que está acontecendo?</h1></header>

      <form method="post">
         <input type="text" id="txtName" name="name" size="50" placeholder="seu nome de usuário"/><br />
         <textarea id="txtMsg" name="msg" rows="5" cols="50" placeholder="sua mensagem"></textarea>
         <footer>
         
            <input type="submit" value="Enviar" class="button send"/>
            <input type="reset" value="Limpar" class="button"/>
         </footer>
         <input type="file" name="foto" /><br /><br />
<input type="submit" name="foto" value="foto" />
      </form>
   </section>




   <section id="twitts">
      <header><h1>Veja o que seus amigos estão contando.</h1></header>

   </section>
   <?php include("footer.php"); ?>

   <?php
 
// Exibe as informações de cada usuário
while ($usuario = mysql_fetch_object($sql)) {
	// Exibimos a foto
    echo "<img src='fotos/".$usuario->foto."' alt='Foto de exibição' /><br />";
    
      }
define('TAMANHO_MAXIMO', (2 * 1024 * 1024));
if (!isset($_FILES['foto']))
{
    echo retorno('Selecione uma imagem');
    exit;
}
$foto = $_FILES['foto'];
if(!preg_match('/^image\/(pjpeg|jpeg|png|gif|bmp)$/', $tipo))
{
    echo retorno('Isso não é uma imagem válida');
    exit;
}
$id = (int) $_GET['id'];
 
// Selecionando fotos
$stmt = $pdo->prepare('SELECT conteudo, tipo FROM fotos WHERE id = :id');
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
 
// Se executado
if ($stmt->execute())
{
    // Alocando foto
    $foto = $stmt->fetchObject();
    
    // Se existir
    if ($foto != null)
    {
        // Definindo tipo do retorno
        header('Content-Type: '. $foto->tipo);
        
        // Retornando conteudo
        echo $foto->conteudo;
    }
}
$stmt = $pdo->query('SELECT id, nome, tipo, tamanho FROM fotos');
?>
div class="row">
 
 <?php while ($foto = $stmt->fetchObject()): ?>

     <div class="col-sm-6 col-md-4">

         <div class="thumbnail">

             <img src="imagem.php?id=<?php echo $foto->id ?>" />

             <div class="caption">
                 <strong>Nome:</strong> <?php echo $foto->nome ?> <br/>
                 <strong>Tipo:</strong> <?php echo $foto->tipo ?> <br/>
                 <strong>Tamanho:</strong> <?php echo $foto->tamanho ?> bytes <br/>
             </div>

         </div>

     </div>

 <?php endwhile ?>

</div>

?>
   </main>
 

   
   </main>

    </div>
</body>
</html>