<?php
// Conexão com o banco de dados
$conn = new mysqli('localhost', 'root', '', 'tasks');

// Verificar conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Verificar se os dados foram enviados via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Receber os dados enviados via POST
    $task_id = $_POST['task_id']; // ID da tarefa para atualização
    $task_title = $_POST['text_title'];
    $task_description = $_POST['full_text_description'];

    // Verificar se os campos não estão vazios
    if (!empty($task_id) && !empty($task_title) && !empty($task_description)) {
        // Usar prepared statements para evitar SQL injection
        $stmt = $conn->prepare("UPDATE tasks SET task_title = ?, task_description = ? WHERE id = ?");
        $stmt->bind_param('ssi', $task_title, $task_description, $task_id);

        // Executar a query e verificar se deu certo
        if ($stmt->execute()) {
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["error" => "Erro ao atualizar os dados: " . $conn->error]);
        }

        // Fechar statement
        $stmt->close();
    } else {
        echo json_encode(["error" => "Todos os campos são obrigatórios."]);
    }
}

// Fechar conexão
$conn->close();
?>
