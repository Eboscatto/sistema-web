<!doctype html>
<html xmlns="http//www.w3.org/1999/xhtml">
  <head>    
    <title>Listagem</title>
    <link href="https://getbootstrap.com/docs/5.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min. js"></script>
    <script src=>"bootstrap/js/bootstrap.min.js"</script>    
</head>
<body>
    
    <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-10">
    
    <h3>Listagem de Preços</h3>
    <table border="2" class="table table-striped">
        <thead><tr>
            <td>Estabelecimento</td>
            <td>Produto</td>
            <td>Preço</td>                      

    </tr></thead>
    <tbody>
        <?php
            $link = new PDO ("mysql:localhost; dbname=db_pesquisa_preco", "root", "");

            $query = $link->prepare('SELECT precoFornecedor, precoProduto, precoValor FROM db_pesquisa_preco.tb_preco;');

            $query->execute();
            $rows = $query ->fetchALL(PDO::FETCH_ASSOC);

            foreach($rows as $row)
            {
                ?>
                <tr>
                    <td><?php echo $row['precoFornecedor'];?> </td>
                    <td><?php echo $row['precoProduto'];?> </td>
                    <td><?php echo $row['precoValor'];?> </td>                                     
                </tr>
                <?php
            }
            ?>
    </tbody>
 </table>
 </div>
 </div>
</body>
</html>
