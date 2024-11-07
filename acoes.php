<?php
session_start();
require_once('conexao.php');


if (isset($_POST['create_tarefa'])) {
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $descricao = mysqli_real_escape_string($conn, $_POST['descricao']);
    $prioridade = mysqli_real_escape_string($conn, $_POST['prioridade']);
    $data_limite = mysqli_real_escape_string($conn, $_POST['data_limite']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    $sql = "INSERT INTO tarefas (nome, descricao, prioridade, data_limite, `status`) 
            VALUES ('$nome', '$descricao', '$prioridade', '$data_limite', '$status')";

    if (mysqli_query($conn, $sql)) {
        header('Location: index.php');
        exit();
    } else {
        echo "Erro ao inserir a tarefa: " . mysqli_error($conn);
    }
}




if (isset($_POST['delete_tarefa'])) {
    require_once('conexao.php');

    $id = mysqli_real_escape_string($conn, $_POST['delete_tarefa']);
    
    $sql = "DELETE FROM tarefas WHERE id = '$id'";
    mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        $_SESSION['message'] = "A tarefa com o ID {$id} foi excluída com sucesso!";
        $_SESSION['type'] = 'success';
    } else {
        $_SESSION['message'] = "Não foi possível excluir a tarefa.";
        $_SESSION['type'] = 'error';
    }

    header('Location: index.php');
    exit;
}

if (isset($_POST['edit_tarefa'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $descricao = mysqli_real_escape_string($conn, $_POST['descricao']);
    $prioridade = mysqli_real_escape_string($conn, $_POST['prioridade']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $data_limite = mysqli_real_escape_string($conn, $_POST['data_limite']);

    $sql = "UPDATE tarefas SET nome = '{$nome}', descricao = '{$descricao}', prioridade = '{$prioridade}', `status` = '{$status}', data_limite = '{$data_limite}' WHERE id = '{$id}'";

    if (mysqli_query($conn, $sql)) {
        if (mysqli_affected_rows($conn) > 0) {
            $_SESSION['message'] = 'Tarefa editada com sucesso!';
            $_SESSION['type'] = 'success'; 
        } else {
            $_SESSION['message'] = 'Não foi possível editar a tarefa';
            $_SESSION['type'] = 'error';
        }
    } else {
        $_SESSION['message'] = 'Erro ao executar a atualização!';
        $_SESSION['type'] = 'error';
    }

    header("Location: index.php");
    exit;
}


?>