<?php
$host='localhost';
$dbname='poatients';
$user='root';
$password='Projeto@228638';

$conection = mysqli_connect($host,$user,$password,$dbname);

if($conection != true){

    echo "connection error";
}
$host = "localhost";
$user = "root";
$pass = "Projeto@228638";
$dbname = "patients";

try{
    //Conexão com a porta
    //$conn = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname, $user, $pass);

    //Conexão sem a porta
    $conn = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);

    //echo "Conexão com banco de dados realizado com sucesso!";
}  catch(PDOException $err){
    echo "Erro: Conexão com banco de dados não foi realizada com sucesso. Erro gerado " . $err->getMessage();
}
/*

<?php
$host='sigart_db.mysql.dbaas.com.br';
$dbname='sigart_db';
$user='sigart_db';
$password='Projeto@22863';

$conection = mysqli_connect($host,$user,$password,$dbname);

if($conection != true){

    echo "connection error";
}
?>

*/



?>