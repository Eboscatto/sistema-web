<?php    
    try{

        $link = new PDO ("mysql:localhost;dbname=db_pesquisa_preco", "root", "");
       // $id = $_POST ['id'];            
        $fornecedor = $_POST['fornecedor'];
        $produto = $_POST['produto'];
        $preco= $_POST['preco'];        

        $query = $link->prepare('INSERT db_pesquisa_preco.tb_preco 
                                  SET precoFornecedor=:fornecedorPreco, 
                                  precoProduto=:produtoprec, 
                                  precoValor=:precoprec');

        //$query->bindValue(":ides", $id);
        $query->bindValue(":fornecedorPreco", $fornecedor);
        $query->bindValue(":produtoprec", $produto);
        $query->bindValue(":precoprec", $preco);       

        $query->execute();

        echo"<script> alert('Cadastro realizado com sucesso!');
                        top.location.href='./cadastroPreco.php';
            </script>";
    }
    catch(PDOException $erro) {
        echo"<strong> ERRO DETECTADO!:</strong><br>", $erro->getMessage();
    }
?>