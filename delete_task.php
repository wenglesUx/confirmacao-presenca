<?php

if (isset($_POST['id'])) {

    $conn = new mysqli('localhost', 'root', '', 'tasks');

    // Verificar conexão
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    // Corrigido: real_escape_string em vez de real_scape_string
    $taskId = $conn->real_escape_string($_POST['id']);

    $sql = "DELETE FROM tasks WHERE id = '$taskId'";

    if ($conn->query($sql) === TRUE) {
        echo "Tarefa removida com sucesso";
    } else {
        echo "Erro ao remover tarefa: " . $conn->error;
    }

    // Fechar conexão
    $conn->close();

} else {
    // Corrigido: estrutura correta para exibir mensagem
    echo "ID da tarefa não fornecido!";
}
?>
