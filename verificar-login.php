<?php
session_start();

$host = "localhost";
$dbname = "GameBlog";
$user = "rafaelnbg";
$pass = "071920";

// Conexão com o banco de dados
$conn = pg_connect("host=$host dbname=$dbname user=$user password=$pass");

if (!$conn) {
    die("Connection failed: " . pg_last_error());
}

// Obter dados do formulário
$username = $_POST['username'];
$password = $_POST['password'];

// Consulta para verificar se o usuário e senha estão corretos
$query = "SELECT * FROM usuarios WHERE login = $1 AND senha = $2";
$result = pg_query_params($conn, $query, array($username, $password));

if (pg_num_rows($result) > 0) {
    // Login bem-sucedido
    $_SESSION['username'] = $username;

    // Redirecionar para index.html com mensagem de boas-vindas
    $nomeUsuario = $username; // Aqui você pode usar o nome real do usuário obtido do banco de dados
    header("Location: index.html?mensagem=boas-vindas&nomeUsuario=" . urlencode($nomeUsuario));
    exit();
} else {
    // Login falhou
    header("Location: login.html"); // Redirecionar de volta para a página de login
    exit();
}

pg_close($conn);
?>

