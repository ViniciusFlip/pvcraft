<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Captura e limpa os dados
    $type = htmlspecialchars($_POST["type"]);
    $title = htmlspecialchars($_POST["title"]);
    $short_desc = htmlspecialchars($_POST["short_desc"]);
    $long_desc = htmlspecialchars($_POST["long_desc"]);
    $image = htmlspecialchars($_POST["image"]);
    $download = htmlspecialchars($_POST["download"]);
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);

    // Formata os dados para salvar
    $data = "-----------------------------\n";
    $data .= "Tipo: $type\n";
    $data .= "Título: $title\n";
    $data .= "Descrição Curta: $short_desc\n";
    $data .= "Descrição Longa: $long_desc\n";
    $data .= "Link da Imagem: $image\n";
    $data .= "Link de Download: $download\n";
    $data .= "Nome: $name\n";
    $data .= "Email: $email\n";
    $data .= "Enviado em: " . date("d/m/Y H:i:s") . "\n";
    $data .= "-----------------------------\n\n";

    // Salva em um arquivo de texto
    $file = "conteudos.txt";

    if (file_put_contents($file, $data, FILE_APPEND | LOCK_EX)) {
        header("Location: success/index.html");
        exit;
    } else {
        echo "<h3>Erro ao salvar os dados.</h3>";
    }
} else {
    echo "<h3>Método de envio inválido.</h3>";
}
?>
