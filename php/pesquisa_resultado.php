<?php
 // Conectando ao banco de dados:
    include_once("conectar.php");
 // Recebendo os dados a pesquisar
 $pesquisa= $_POST['fornecedor'];
?>
<html>
<head>
   <title>Listagem</title>
    <link href="https://getbootstrap.com/docs/5.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min. js"></script>
    <script src=>"bootstrap/js/bootstrap.min.js"</script>  
</head>
 <body>
 
 <!-- Criando tabela e cabeçalho de dados: -->
 <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-10">
    
    <h2>Listagem de menor preço por estabelecimento</h2>
    <table border="2" class="table table-striped">
        <thead><tr>
            <td>Fornecedor</td>
            <td>Produto</td>
            <td>Valor</td>                      

    </tr></thead>

 <!-- Preenchendo a tabela com os dados do banco: -->
 <?php
   $sql = "SELECT * FROM db_pesquisa_preco.tb_preco temp
            WHERE temp.precoValor=(SELECT MIN(precoValor) 
            FROM db_pesquisa_preco.tb_preco
            WHERE precoProduto=temp.precoProduto)
            AND precoFornecedor='$pesquisa';"; 
 $resultado = mysqli_query($strcon,$sql) or die("Erro ao retornar dados");
 
 // Obtendo os dados por meio de um loop while
 while ($registro = mysqli_fetch_array($resultado))
 {
   $nome = $registro['precoFornecedor'];
   $produto = $registro['precoProduto'];
   $valor = $registro['precoValor'];
   echo "<tr>";
   echo "<td>".$nome."</td>";
   echo "<td>".$produto."</td>";
   echo "<td>".$valor."</td>";
   echo "</tr>";
 }
 mysqli_close($strcon);
 echo "</table>";
?>
</body>
</html>