<?php    
    try{        
        $link = new PDO ("mysql:localhost;db_pesquisa_preco", "root", "");        
        $nome = $_POST['nome'];
        $endereco = $_POST['endereco'];
        $cidade = $_POST['cidade'];
       
        $query = $link->prepare('INSERT db_pesquisa_preco.tb_fornecedor 
                                 SET fornecedorNome=:nomeFornecedor, 
                                 fornecedorEndereco=:enderecoFornecedor, 
                                 fornecedorCidade=:cidadeFornecedor');
        
        $query->bindValue(":nomeFornecedor", $nome);
        $query->bindValue(":enderecoFornecedor", $endereco);
        $query->bindValue(":cidadeFornecedor", $cidade);       

        $query->execute();

        echo"<script> alert('Cadastro realizado com sucesso!');
                        top.location.href='/sistemaWeb/menu.html';
             </script>";
    }
    catch(PDOException $erro) {
        echo"<strong> ERRO DETECTADO!:</strong><br>", $erro->getMessage();
    }
?>



