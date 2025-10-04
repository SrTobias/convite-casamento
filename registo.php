<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = trim($_POST['nome']);
    $resposta = trim($_POST['resposta']);

    // Nome do ficheiro CSV
    $ficheiro = "confirmacoes.csv";

    // Se o ficheiro não existir, cria com cabeçalho
    if (!file_exists($ficheiro)) {
        $cabecalho = ["Nome", "Resposta", "Data/Hora"];
        $file = fopen($ficheiro, "w");
        fputcsv($file, $cabecalho);
        fclose($file);
    }

    // Regista a confirmação
    $file = fopen($ficheiro, "a");
    fputcsv($file, [$nome, $resposta, date("Y-m-d H:i:s")]);
    fclose($file);

    echo "✅ Obrigado, {$nome}! A tua resposta foi registada com sucesso.";
}
?>
