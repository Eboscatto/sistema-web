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
    
    <h3>Listagem de Produtos</h3>
    <table border="2" class="table table-striped">
        <thead><tr>
            <td>Código</td>
            <td>Nome do produto</td>           
            <td>Embalagem/quantidade</td>          

    </tr></thead>
    <tbody>
        <?php
            $link = new PDO ("mysql:localhost; dbname=db_pesquisa_preco", "root", "");

            $query = $link->prepare('SELECT produtoId, produtoNome, produtoEmbalagem FROM db_pesquisa_preco.tb_produto;');

            $query->execute();
            $rows = $query ->fetchALL(PDO::FETCH_ASSOC);

            foreach($rows as $row)
            {
                ?>
                <tr>
                    <td><?php echo $row['produtoId'];?> </td>
                    <td><?php echo $row['produtoNome'];?> </td>                   
                    <td><?php echo $row['produtoEmbalagem'];?> </td>                    
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
