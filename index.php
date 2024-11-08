<?php
session_start();
require_once('conexao.php');

$sql = "SELECT * FROM tarefas";
$tarefas = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud - tarefas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./css/index.css">
</head>

<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="background-color: #000;">
                        <h4 style="color: #fff;">
                            Gerenciador e Tarefas
                            <a href="tarefa_create.php" class="btn btn-primary float-end">Adicionar Tarefa</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php include('mensagem.php'); ?>
                        <div class="row">
                            <?php foreach ($tarefas as $tarefa): ?>
                                <div class="col-md-4 mb-4">
                                    <div class="card">
                                        <div class="card-body d-flex flex-column" style="min-height: 400px;">
                                            <h5 class="card-title"><?php echo $tarefa['nome']; ?></h5>
                                            <p class="card-text"><?php echo $tarefa['descricao']; ?></p>
                                            <div class="mt-auto">
                                                <p class="card-text"><strong>Prioridade:</strong> <?php echo $tarefa['prioridade']; ?></p>
                                                <p class="card-text"><strong>Status:</strong> <?php echo $tarefa['status']; ?></p>
                                                <p class="card-text"><strong>Data de Lançamento:</strong> <?php echo date('d/m/Y', strtotime($tarefa['data_lancamento'])); ?></p>
                                                <p class="card-text"><strong>Data Limite:</strong> <?php echo date('d/m/Y', strtotime($tarefa['data_limite'])); ?></p>
                                                <div class="d-flex gap-2">
                                                    <a href="tarefa_edit.php?id=<?= $tarefa['id'] ?>" class="btn btn-warning btn-sm">
                                                        <i class="bi bi-pencil-fill"></i> Editar</a>
                                                    <form action="acoes.php" method="POST" class="d-inline">
                                                        <button onclick="return confirm('Excluir tarefa?')" name="delete_tarefa" type="submit" value="<?php echo $tarefa['id']; ?>" class="btn btn-danger btn-sm">
                                                            <i class="bi bi-trash-fill"></i> Excluir
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>