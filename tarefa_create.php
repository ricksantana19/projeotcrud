<?php
session_start();
require_once('conexao.php');
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud - Criar</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">
        <div class="card-header" style="background-color: #000;">
            <h4 style="color: #fff; margin-top: 5px;"> Gerenciador e Tarefas</h4>
        </div>

        <div class="card-body border border-1 rounded">
            <form action="acoes.php" method="POST">
                <div class="d-flex justify-content-end mb-3">
                    <button type="submit" name="create_tarefa" class="btn btn-primary">Adicionar Tarefa</button>
                </div>
                <div class="form-group">
                    <label for="nome">Nome da Tarefa</label>
                    <input type="text" class="form-control" id="nome" name="nome" required>
                </div>
                <div class="form-group">
                    <label for="descricao">Descriçao da Tarefa</label>
                    <input type="text" class="form-control" id="descricao" name="descricao">
                </div>
                <div class="form-group">
                    <label for="prioridade">Prioridade</label>
                    <select class="form-control" id="prioridade" name="prioridade">
                        <option>Baixa</option>
                        <option>Média</option>
                        <option>Alta</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status">
                        <option value="Pendente">Pendente</option>
                        <option value="Em Progresso">Em Progresso</option>
                        <option value="Concluída">Concluída</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="data_limite">Data Limite</label>
                    <input type="date" class="form-control" id="data_limite" name="data_limite">
                </div>
            </form>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html> 