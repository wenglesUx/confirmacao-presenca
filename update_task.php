<?php
if (isset($_POST['task_id']) && isset($_POST['task_description'])) {
    $conn = new mysqli('localhost', 'root', '', 'tasks');

    // Verificar conexão
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    // Escapar dados
    $taskId = $conn->real_escape_string($_POST['task_id']);
    $taskDescription = $conn->real_escape_string($_POST['task_description']);

    // Atualizar descrição
    $sql = "UPDATE tasks SET task_description = '$taskDescription' WHERE id = '$taskId'";

    if ($conn->query($sql) === TRUE) {
        alert ("Descrição atualizada com sucesso!");
    } else {
        alert ("Erro ao atualizar descrição: ") . $conn->error;
    }

    $conn->close();
} else {
    echo "ID da tarefa ou descrição não fornecido!";
}
?>
