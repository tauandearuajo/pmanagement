<?php

session_start();
require_once('database/conection.php');
date_default_timezone_set('America/Sao_Paulo');
$created_at = date('d-m-Y');

$data_inicial = $_POST['data_inicial'];
$data_final = $_POST['data_final'];



// QUERY para recuperar os registros do banco de dados
$query_usuarios = "SELECT employee_name,business_name,unitary_value,name_of_the_meal,name_restaurant,order_status,created_at FROM cart WHERE created_at BETWEEN '$data_inicial' AND '$data_final'";

// Preparar a QUERY
$result_usuarios = $conn->prepare($query_usuarios);

// Executar a QUERY
$result_usuarios->execute();

// Acessa o IF quando encontrar registro no banco de dados
if(($result_usuarios) and ($result_usuarios->rowCount() != 0)){

    // Aceitar csv ou texto 
    header('Content-Type: text/csv; charset=utf-8');

    // Nome arquivo
    header('Content-Disposition: attachment; filename=relatorio-de-pedidos'.$created_at.'.csv');

    // Gravar no buffer
    $resultado = fopen("php://output", 'w');

    // Criar o cabeçalho do Excel - Usar a função mb_convert_encoding para converter carateres especiais
    $cabecalho = ['Nome funcionario','Nome da empresa','Valor da refeição','Nome da refeição','Nome do restaurante','Status do pedido','Data da compra', mb_convert_encoding('Endereço', 'ISO-8859-1', 'UTF-8')];

    // Escrever o cabeçalho no arquivo
    fputcsv($resultado, $cabecalho, ';');

    // Ler os registros retornado do banco de dados
    while($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)){

        // Escrever o conteúdo no arquivo
        fputcsv($resultado, $row_usuario, ';');

    }

    // Fechar arquivo
    //fclose($resultado);
}else{ // Acessa O ELSE quando não encontrar nenhum registro no BD
    $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Nenhum usuário encontrado!</p>";
    header("Location: index.php");
}






$conection->close();

