<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarefas :: Listar</title>

    <?php
    include "referencias.php";
    ?>

</head>

<body>
    <form  action="" method="post">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">


                    <h2>Tarefas :: Listar</h2>

                    <div class="form-group">
                        <table>

                            <tr>
                                <td>Descrição</td>
                                <td>Data</td>
                                <td>Prioridade</td>
                                <td>Responsável</td>
                            </tr>

                            <?php

                             // PRIMEIRO PASSO: Montar o comando SQL que será executado
                             $sql= "SELECT * FROM tarefa ORDER BY data_entrega DESC";
                             // SEGUNDO PASSO: Preparar o comando para ser executado na conexão de dados
                             $comando = $conexao->prepare($sql);
                             // TERCEIRO PASSO: Executar o comando
                             $comando->execute();
                             // QUARTO PASSO: Capturar resultados trazidos pelo MYSQL
                             $resultado = $comando->get_result();
                             
                             // QUINTO PASSO: Pegar todas as linhas de dados que estão em RESULTADOS
                             while($registro = $resultado->fetch_assoc())
                             {
                                $descricao = $registro ["descricao"];
                                $data_entrega = $registro ["data_entrega"];
                                $prioridade = $registro ["prioridade"];
                                $responsavel = $registro ["responsavel"];

                            ?>

                            <tr>
                                <td><?php echo $descricao ?></td>
                                <td><?php echo $data_entrega ?></td>
                                <td><?php echo $prioridade ?></td>
                                <td><?php echo $responsavel ?></td>
                            </tr>

                            <?php } ?>

                        </table>
                    </div>

                    <div class="form-group">

                        <a href="index.php">
                            <button type="button" class="btn btn-danger" name="btVoltar">
                                Voltar
                            </button>
                        </a>

                    </div>

                </div>

            </div>
        </div>

    </form>

</body>

</html>