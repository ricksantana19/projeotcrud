<?php
session_start();
require_once('conexao.php');

$tarefa = [];

if (!isset($_GET['id']) || empty($_GET['id'])){
    header('Location: index.php');
} else {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM tarefas WHERE id = '{$id}'";
    $query = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($query) > 0) {
        $tarefa = mysqli_fetch_array($query);
    } else {
        echo "Tarefa não encontrada no banco de dados.";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud - Edição</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="card-header rounded" style="background-color: #000; padding: 10px;">
            <h4 style="color: #fff; margin-top: 5px;">Editar Tarefa</h4>
        </div>

        <div class="card-body border border-1 rounded">
            <?php if (!empty($tarefa)): ?>
                <form action="acoes.php" method="POST">
                    <input type="hidden" name="id" value="<?= $tarefa['id']; ?>">
                    <div class="d-flex justify-content-end" style="margin-top: 20px;">
                        <button type="submit" name="edit_tarefa" class="btn btn-primary">Salvar Alterações</button>
                    </div>
                    <div class="form-group">
                        <label for="nome">Nome da Tarefa</label>
                        <input type="text" name="nome" class="form-control" id="nome" value="<?= $tarefa['nome'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="descricao">Descrição da Tarefa</label>
                        <input type="text" name="descricao" class="form-control" id="descricao" value="<?= $tarefa['descricao'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="prioridade">Prioridade</label>
                        <select class="form-control" name="prioridade" id="prioridade" required>
                            <option value="Baixa" <?= $tarefa['prioridade'] == 'Baixa' ? 'selected' : '' ?>>Baixa</option>
                            <option value="Média" <?= $tarefa['prioridade'] == 'Média' ? 'selected' : '' ?>>Média</option>
                            <option value="Alta" <?= $tarefa['prioridade'] == 'Alta' ? 'selected' : '' ?>>Alta</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" name="status" id="status" required>
                            <option value="Pendente" <?= $tarefa['status'] == 'Pendente' ? 'selected' : '' ?>>Pendente</option>
                            <option value="Em Progresso" <?= $tarefa['status'] == 'Em Progresso' ? 'selected' : '' ?>>Em Progresso</option>
                            <option value="Concluída" <?= $tarefa['status'] == 'Concluída' ? 'selected' : '' ?>>Concluída</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="data_limite">Data Limite</label>
                        <input type="date" name="data_limite" id="data_limite" class="form-control" value="<?= $tarefa['data_limite'] ?>" required>
                    </div>
                </form>
            <?php else: ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Tarefa não encontrada.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>