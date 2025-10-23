<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarefa :: Editar</title>
    <?php
    include "referencias.php";
    ?>
</head>

<body>
    <?php
       //PRIMEIRO PASSO: Criar variáveis para armazenar dados retornados pelo comando SELECT
    $id = $_POST["txtId"]; // O ID foi informado na página PESQUISAR
    $descricao = "";
    $data_entrega = "";
    $prioridade = "";
    $responsavel = "";
    
    // SEGUNDO PASSO: Construir o comando SQL - SELECT
    $sql = "SELECT * FROM tarefa WHERE id = ?";

    //3° PASSO: Preparar o comando sql para ser executado na conexão
    $comando = $conexao->prepare($sql);

    //4° PASSO: Associar os valores dos parâmetros do comando sql
    $comando->bind_param("i",$id);

    //5° PASSO: Executar o comando SQL
    $comando->execute();
    //OBS: Como um comando SELECT traz um retorno de dados, precisamos guardar os resultados em uma variável
    $resultado = $comando->get_result();
    if ($resultado->num_rows <= 0)
    {
       echo "<h1>Esta tarefa não foi cadastrada! </h1>";
    }
    else
    {
       //OBS: Como um comando SELECT pode retornar várias linhas de registro, precisamos capturar linha por linha dos valores que estão em resultado
      
       //Pega uma linha/registro retornado
       $registro = $resultado->fetch_assoc();
       
       //Preenche as varáveis com o que o SELECT retornou
       $descricao = $registro["descricao"];
       $data_entrega = $registro["data_entrega"];
       $prioridade = $registro["prioridade"];
       $responsavel = $registro["responsavel"];

       echo $descricao;
       echo $responsavel;

       //PRÓXIMA AULA COLOCAR OS VALORES NAS CAIXINHAS

    }
    ?>
    <form method="post">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2>Tarefa :: Editar</h2>
                <div class="form-group">
                    <label>Id</label>
                    <input value= "<?php echo $id ?>" type="text" class="form-control" required="" placeholder="Id da tarefa" name="txtId">
                </div>

                <div class="form-group">
                    <label>Descrição</label>
                    <input value= "<?php echo $descricao ?>" type="text" class="form-control" required="" placeholder="Descricao da tarefa" name="txtDescricao">
                </div>

                <div class="form-group">
                    <label>Data</label>
                    <input value= "<?php echo $data_entrega ?>" type="date" class="form-control" required="" name="txtData">
                </div>

                <div class="form-group">
                    <label>Prioridade</label>
                    <select name="txtPrioridade" class="form-control">
                        <option value="Alta">Alta</option>
                        <option value="Média">Média</option>
                        <option value="Baixa">Baixa</option>
                    </select>
                </div>


                <div class="form-group">
                    <label>Responsável</label>
                    <input value= "<?php echo $responsavel
                     ?>" type="text" class="form-control" placeholder="Responsável pela tarefa" name="txtResponsavel">
                </div>


                <br>
                <div class="form-group">

                    <button formaction="tarefa_atualizar.php" type="submit" class="btn btn-primary" name="btEditar">
                        Editar
                    </button>

                    <button formaction="tarefa_excluir.php" type="submit" class="btn btn-warning" name="btExcluir">
                        Excluir
                    </button>


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