<!doctype html>  
  <html xmlns="http//www.w3.org/1999/xhtml"> 
  <head>     
    <meta charset="UTF-8">
    <title> Listagem </title>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min. js"></script>    
    <script src=>"bootstrap/js/bootstrap.min.js"</script> 
    <link rel="stylesheet" href="/css/styleRelatorio.css"> 
  </head>

<body>
  <style>
    *{
      margin: 0;
      padding: 0;
    }
    body {
      width: 100%; 
      height: 100%;  
      box-sizing: border-box;
      background-color: #232f3e;
      font-family: sans-serif;
      color: peru; 
      text-align: center;   
    }
    .cabecalho {
      width: 100%;
      padding: 10px;
      background-color: #ffffff;
      text-align: center;
    }
    .cabecalho__menu__link {             
      font-family: Arial, Helvetica, sans-serif;    
      font-size: 1.2em;
      color:black;    
    }  
    .titulo {
      margin-top: 5%;
      font-family: Arial, Helvetica, sans-serif;
      font-size: 2em;
      text-decoration: underline;      
    }
    form {
      margin-top: 5%;
    }
    .etiqueta {
      font-family: Arial, Helvetica, sans-serif;
      font-size: 1.5em;
      
    }
    .selecao {
      font-family: Arial, Helvetica, sans-serif;
      font-size: 1.2em;
    }
    .botao {
      width: 10%;
      border-radius: 10px;
      font-size: 1.5em;
      background: tan;
      border: 0;
      margin-bottom: 1em;
      color: #ffffff;
      padding: 0.2em 0.6em;
      box-shadow: rgba(0,0,0.2);
      text-shadow: rgba(0,0,0.5);
      position: absolute;
      top: 55%;
      left: 45%;
      margin-right: 50%;
      transform: translate(-50%, -50%);
    }
    .botao:hover {
      background: #CCBBFF;
      box-shadow: inset 2px 2px 2px rgba(0,0,0.2);
      text-shadow: none;
    }
    .botao, select {
      cursor: pointer;
    }
    .rodape {   
      width: 100%;            
      margin-top: 24%;
      padding: 10px;
      color: black;  
      background-color: #ffffff;  
      text-align: center;
      font-family:Arial, Helvetica, sans-serif;
      font-size: 1.1rem;
      font-weight: 400;
    }
    
  </style>

  <header class="cabecalho">        
    <nave class="cabecalho__menu">            
        <a class="cabecalho__menu__link" href="/sistemaWeb/menu.html">Clique aqui para retornar à página de menu</a>                                 
    </nave>        
</header>  
<h1 class="titulo">Listar menor preço por fornecedor</h1><br>
<form name="relatorio" action="./pesquisa_resultado.php" method="POST">
  <label class="etiqueta">Selecione o fornecedor:</label>
  <select class="selecao" name="fornecedor" value="" class="form-control" /><br />
  <option value="">...</option>
<?php
   $link = new PDO ("mysql:localhost;dbname=db_pesquisa_preco","root", "");                         

   $query = $link->prepare('SELECT fornecedorNome FROM db_pesquisa_preco.tb_fornecedor;' );        
   $query->execute();
   $rows = $query ->fetchALL(PDO::FETCH_ASSOC);

    foreach($rows as $row)
        {
          ?>
          <option value="<?php echo $row['fornecedorNome'];?>"><?php echo $row['fornecedorNome'];?></option>
          <?php
        }
        ?>
</select><br />
<input class="botao" type="submit" name="enviar" value="Listar">
</form>
</body>
<footer class="rodape">
    <p>Desenvolvido por: Everaldo Boscatto - 2024.</p>
</footer>
</html>