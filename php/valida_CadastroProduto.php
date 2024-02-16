<?php   
    try{
        $link = new PDO ("mysql:localhost;dbname=db_pesquisa_preco", "root", "");                   
        $nome = $_POST['nome'];        
        $embalagem = $_POST['embalagem'];
        $marca = $_POST['marca'];

        $query = $link->prepare('INSERT db_pesquisa_preco.tb_produto
                                 SET produtoNome=:nomeProduto, 
                                 produtoEmbalagem=:embalagemProduto, 
                                 produtoMarca=:marcaProduto');
        
        $query->bindValue(":nomeProduto", $nome);
        $query->bindValue(":embalagemProduto", $embalagem);    
        $query->bindValue(":marcaProduto", $marca);    

        $query->execute();

        echo"<script> alert('Cadastro realizado com sucesso!');
                        top.location.href='/sistemaWeb/menu.html';
            </script>";
    }
    catch(PDOException $erro) {
        echo"<strong> ERRO DETECTADO!:</strong><br>", $erro->getMessage();
    }
?>