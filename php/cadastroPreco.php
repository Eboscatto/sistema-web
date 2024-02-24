<!doctype html>
<html lang="pt-br">
<html xmlns="http//www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Preços</title>
    <link href="https://getbootstrap.com/docs/5.1/dist/css/bootstrap.min.css" rel="stylesheet">    
    <link rel="stylesheet" type="text/css" href="/css/styleCadastroPeco.css">   
    <style>
    body{        
         width: 100%; 
         height: 100%;  
         box-sizing: border-box;
         background-color: #232f3e;
         font-family: sans-serif;
         color: peru;         
        }

        .cabecalho {
            width: 100%;
            padding: 10px;
            background-color: #ffffff;
            text-align: center;
        }
        .cabecalho__menu__link {             
            font-family: Arial, Helvetica, sans-serif;    
            font-size: 1em;
            color:black;    
        }    
        h2{
            padding-top: 20px;
            font-family:Arial, Helvetica, sans-serif;
            font-size: 2em;   
            text-decoration: underline;         
        }
        form{
            width: 100%;
            height: 50%;
        }
        label {
            padding-top: 15px;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 20px;           
        }
        .botao {
            width: 10%;
            border-radius: 10px;
            font-size: 1.2em;
            background: tan;
            border: 0;
            margin-bottom: 1em;
            color: #ffffff;
            padding: 0.2em 0.6em;
            box-shadow: rgba(0,0,0.2);
            text-shadow: rgba(0,0,0.5);
            position: absolute;
            top: 65%;
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
            margin-top: 24.3%;
            padding-top: 14.2px;
            color: black;  
            background-color: #ffffff;  
            text-align: center;
            font-family:Arial, Helvetica, sans-serif;
            font-size: .8rem;            
        }
    </style>        
</head>
<body>
<header class="cabecalho">        
    <nave class="cabecalho__menu">            
        <a class="cabecalho__menu__link" href="/sistemaWeb/menu.html">Clique aqui para retornar à página de menu</a>                                 
    </nave>        
</header>     
    <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
            <h2>Cadastro de preço</h2>
            <form action="valida_CadastroPreco.php" method="post">
            <fieldset>
                <div class="row">
                <div class="col-md-6">
                    <label>Fornecedor:</label>
                    <select type="text" name="fornecedor" value="" class="form-control" /><br />
                    <option value="">...</option>
                    <?php
                        $link = new PDO("mysql:localhost;dbname=db_pesquisa_preco", "root", "");
                        $query = $link->prepare('SELECT fornecedorNome FROM db_pesquisa_preco.tb_fornecedor;');
                        $query->execute();
                        $rows = $query->fetchALL(PDO::FETCH_ASSOC);
                        foreach ($rows as $row) {
                        ?>
                        <option value="<?php echo $row['fornecedorNome']; ?>"><?php echo $row['fornecedorNome']; ?></option>
                            <?php
                            }
                            ?>
                            </select><br />
                        </div>
                        <div class="col-md-6">
                            <label>Produto:</label>
                            <select type="text" name="produto" value="" class="form-control"><br />
                                <option value="">...</option>
                                <?php
                                $link = new PDO("mysql:localhost;dbname=db_pesquisa_preco", "root", "");

                                $query = $link->prepare('SELECT produtoNome FROM db_pesquisa_preco.tb_produto;');

                                $query->execute();
                                $rows = $query->fetchALL(PDO::FETCH_ASSOC);

                                foreach ($rows as $row) {
                                ?>
                                    <option value="<?php echo $row['produtoNome']; ?>"><?php echo $row['produtoNome']; ?></option>
                                <?php
                                }
                                ?>
                            </select><br />
                        </div>
                        <div class="col-md-6">
                            <label>Preço:</label>
                            <input type="text" name="preco" class="form-control" /> <br />
                        </div>
                        <input class="botao" type="submit" value="Cadastrar" class="btn-sucess btn-block" />
                    </div>
                </fieldset>
            </form>
        </div>
  </body>
    <footer class="rodape">
    <p>&copy; 2024 Everaldo Boscatto. Todos os direitos reservados.</p>
    </footer>
</html>
</html>