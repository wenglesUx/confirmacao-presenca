<?php
// Conectar ao banco de dados
$conn = new mysqli('localhost', 'root', '', 'tasks');

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Query para buscar os dados
$sql = "SELECT id, task_title, task_description, task_status, created_at FROM tasks";
$result = $conn->query($sql);

// Array para armazenar os resultados
$data = [];

if ($result->num_rows > 0) {
    // Popular o array com os dados do banco de dados
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Fechar conexão
$conn->close();

// Retornar os dados como JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
