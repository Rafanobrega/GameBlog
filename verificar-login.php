<?php
session_start();

$host = "localhost";
$dbname = "GameBlog";
$user = "rafaelnbg";
$pass = "071920";

// Conexão com o bd 
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
    
    $_SESSION['username'] = $username;

    
    $nomeUsuario = $username; 
    header("Location: index.html?mensagem=boas-vindas&nomeUsuario=" . urlencode($nomeUsuario));
    exit();
} else {
    
    header("Location: login.html"); 
    exit();
}

pg_close($conn);
?>

