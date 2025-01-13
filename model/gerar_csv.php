<?php

session_start();
require_once('database/conection.php');
date_default_timezone_set('America/Sao_Paulo');
$id_hosp = mysqli_escape_string($conection, $_POST['id_hosp']);
$hosp_name = mysqli_escape_string($conection, $_POST['hosp_name']);
$created_at = date('d-m-Y');


$consult = "SELECT*FROM cart  ORDER BY id ASC";
$result = mysqli_query($conection, $consult);


//gerar csv dos dados dos equipamentos.
if ($result->num_rows > 0) {
    $directory = '../csv/'; // Substitua pelo caminho da pasta no servidor
    if (!is_dir($directory)) {
        mkdir($directory, 0777, true);
    }
    $filename_eqp = $directory . 'equipamentos' . $hosp_name . $id_hosp . $created_at . '.csv';
    //nome do arquivo csv equipamentos
    $name_file_eqp = 'equipamentos' . $hosp_name . $id_hosp . $created_at . '.csv';

    $file = fopen($filename_eqp, 'w');

    // Escrever cabeçalhos
    $headers = ['id', 'employee_name', 'name_of_the_meal', 'created_at', 'order_status'];
    while ($fieldinfo = $result->fetch_field()) {
    }
    fputcsv($file, $headers, ';');

    // Escrever dados
    while ($row = $result->fetch_assoc()) {
        fputcsv($file, $row, ';');
    }

    fclose($file);
    echo "Arquivo CSV '$filename_eqp' gerado e salvo com sucesso na pasta '$directory'.";
} else {
    echo "Nenhum resultado encontrado.";
}



//gerar csv dos dados dos funcionarios.

$consult = "SELECT*FROM employees WHERE hospitals_id = '$id_hosp' ORDER BY id ASC";
$result = mysqli_query($conection, $consult);





$zip = new ZipArchive();

// Criar o caminho dos arquivos
$diretorio_arquivos = '../csv/';

// Criar o nome do arquivo ZIP
$nome_arquivo_zip = $hosp_name.$created_at.'.zip';

// Criar o caminho do arquivo ZIP
$caminho_arquivo_zip = '../arquivos_zip/' . $nome_arquivo_zip;

// Criar o arquivo e verificar se ocorreu tudo certo
if ($zip->open($caminho_arquivo_zip, \ZipArchive::CREATE)) {

    // Adicionar os arquivos no arquivo zip
    // Caminho do arquivo original
    // Novo nome do arquivo
    $zip->addFile($diretorio_arquivos . "$name_file_eqp");
    $zip->addFile($diretorio_arquivos . "$name_file_fun");
    $zip->addFile($diretorio_arquivos . "$name_file_hosp");

    $diretorio_arquivos_doc = '../documentos/'.$hosp_name."/";

    $arquivos = glob($diretorio_arquivos_doc . '*');

    // Adicione cada arquivo ao ZIP
    foreach ($arquivos as $arquivo) {

        // Verifique se é um arquivo (e não um diretório)
        if (is_file($arquivo)) {
            // Adicione o arquivo ao ZIP, mantendo a estrutura de diretórios relativa
            $zip->addFile($arquivo, basename($arquivo));
        }
    }
    
    // Fechar o arquivo zip após inserir os arquivos
    $zip->close();


    echo "<p style='color: green;'>Arquivo criado com sucesso.</p>";
}
// insert de dados na tabela docie


$name_file = $hosp_name.$created_at.'.zip';

// Verificar se o arquivo zip foi criado
if (file_exists($caminho_arquivo_zip)) {

    // Forçar o donwload do arquivo
    header("Content-Type: application/zip");
    // Atribuir o nome do arquivo 
    // Content-Disposition = Disposição de conteúdo / attachment = anexo
    header("Content-Disposition: attachment;filename=$nome_arquivo_zip");
    // Gera o arquivo
    readfile($caminho_arquivo_zip);

    // Remover o arquivo zip após download
    //unlink($caminho_arquivo_zip);
}
$conection->close();

