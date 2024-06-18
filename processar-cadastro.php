<?php
// Configurações de conexão com o PostgreSQL
$host = "localhost";
$dbname = "GameBlog";
$user = "rafaelnbg";
$pass = "071920";

// Conecta ao banco de dados
$conn = pg_connect("host=$host dbname=$dbname user=$user password=$pass");

if (!$conn) {
    die("Falha na conexão com o banco de dados.");
}

// Obtém os dados do formulário
$username = $_POST['username'];
$password = $_POST['password'];


// Prepara a query SQL para inserção de dados
$query = "INSERT INTO usuarios (usuario,senha) 
          VALUES ($1, $2)";
$result = pg_query_params($conn, $query, array($username,$password ));

if ($result) {
    echo "Cadastro realizado com sucesso!";
    // Redireciona para a página inicial após o cadastro
    header("Location: index.html");
    exit();
} else {
    echo "Erro ao cadastrar usuário.";
}

// Fecha a conexão com o banco de dados
pg_close($conn);
?>
