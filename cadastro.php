<?php

require_once "conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "INSERT INTO Usuarios (nome, email, senha) VALUES (?, ?, ?)";

    $stmt = $mysqli->prepare($sql);

    $stmt->bind_param("sss", $nome, $email, $senha);

    if ($stmt->execute()) {
        echo "Usuário criado com sucesso";
        echo "Faça login.<p><a href=\"login.php\">Entrar</a></p>";
    } else {
        echo "Erro: " . $stmt->error;
    }

    $stmt->close();
}

$mysqli->close();

?>
