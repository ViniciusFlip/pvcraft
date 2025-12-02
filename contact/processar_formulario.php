<?php
// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coleta os dados do formulário
    $nome = trim($_POST["nome"]);
    $email = trim($_POST["email"]);
    $assunto = trim($_POST["assunto"]);
    $mensagem = trim($_POST["mensagem"]);

    // Validações básicas
    $erros = [];

    if (empty($nome)) {
        $erros[] = "O campo nome é obrigatório.";
    }

    if (empty($email)) {
        $erros[] = "O campo e-mail é obrigatório.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erros[] = "O e-mail informado não é válido.";
    }

    if (empty($assunto)) {
        $erros[] = "O campo assunto é obrigatório.";
    }

    if (empty($mensagem)) {
        $erros[] = "O campo mensagem é obrigatório.";
    }

    // Se não houver erros, processa os dados
    if (empty($erros)) {
        // Nome do arquivo onde as mensagens serão armazenadas
        $arquivo_mensagens = "mensagens.txt";

        // Formata os dados para salvar
        $dados_mensagem  = "Data: " . date("d/m/Y H:i:s") . "\n";
        $dados_mensagem .= "Nome: $nome\n";
        $dados_mensagem .= "Email: $email\n";
        $dados_mensagem .= "Assunto: $assunto\n";
        $dados_mensagem .= "Mensagem: $mensagem\n";
        $dados_mensagem .= "----------------------------------------\n\n";

        // Salva no arquivo
        $salvo = file_put_contents($arquivo_mensagens, $dados_mensagem, FILE_APPEND | LOCK_EX);

        if ($salvo !== false) {
            // Redireciona para a página de sucesso
            header("Location: /submission/success/index.html");
            exit;
        } else {
            // Redireciona para o formulário com erro
            header("Location: formulario.html?status=error");
            exit;
        }
    } else {
        // Se houver erros de validação, redireciona com erro
        header("Location: formulario.html?status=error");
        exit;
    }
}

// Se o acesso não foi via POST, redireciona direto
header("Location: formulario.html");
exit;
?>
