<?php
// Conexão com o banco de dados

// Criar conexão
$usuario = 'root';
$senha = '';
$database = 'tasks';
$host = 'localhost';

$mysqli = new mysqli($host, $usuario, $senha, $database);

if($mysqli->error) {
    die("Falha ao conectar ao banco de dados: " . $mysqli->error);
}

// Receber dados do formulário
$task_title = $_POST['task_title'];
$task_description = $_POST['task_description'];

// Preparar e executar a inserção no banco de dados
$sql = "INSERT INTO tasks (task_title, task_description) VALUES (?, ?)";

// Preparar statement para prevenir SQL Injection
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("ss", $task_title, $task_description);  //  "ss" significa duas strings (s)

// Executar a query
if ($stmt->execute()) {
    echo "<script>alert('Tarefa adicionada com sucesso!');</script>";
   
} else {
    echo "<script>alert('Erro ao adicionar tarefa: " . $mysqli->error . "');</script>";
}

// Fechar a conexão
$stmt->close();
$mysqli->close();
?>
