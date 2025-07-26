<?php
// Dados do banco (substitua pelos seus)
$host = "sql110.infinityfree.com"; // pegue no painel
$usuario = "if0_39558269";
$senha = "91643840";
$banco = "if0_39558269_banco";

// Link do WhatsApp (altere aqui!)
$link_destino = "https://wa.me/5594991849613?text=Olá,%20quero%20saber%20mais";

// Conectar
$conn = new mysqli($host, $usuario, $senha, $banco);

// Verifica erro
if ($conn->connect_error) {
    die("Erro: " . $conn->connect_error);
}

// Dados do visitante
$ip = $_SERVER['REMOTE_ADDR'];
$navegador = $_SERVER['HTTP_USER_AGENT'];
$data = date("Y-m-d H:i:s");

// Salva no banco
$sql = "INSERT INTO cliques (ip, navegador, data_acesso) VALUES ('$ip', '$navegador', '$data')";
$conn->query($sql);
$conn->close();

// Redireciona
header("Location: $link_destino");
exit;
?>
