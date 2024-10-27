<?php
// Conexão com o banco de dados
$conn = new mysqli('localhost', 'root', '', 'tasks');

// Verificar conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Receber o ID da tarefa e o status atual
$task_id = $_POST['task_id'];
$current_status = $_POST['current_status'];

// Determinar o novo status
$new_status = ($current_status == 'pendente') ? 'completa' : 'pendente';

// Atualizar o status no banco de dados
$sql = "UPDATE tasks SET task_status = ? WHERE id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param('si', $new_status, $task_id);

if ($stmt->execute()) {
    echo "Status da tarefa atualizado para: " . $new_status;
} else {
    echo "Erro ao atualizar o status: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
