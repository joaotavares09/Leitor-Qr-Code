<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "qrcode";

    try{
        $conexao = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexao;
    }
    catch(PDOException $e) {
        echo "erro na conexao".$e->getMessage();
        return null;
    }
?>
<!-- SERVIDOR HOSTGATOR CORREN_22_QRCODE -->
<!-- 108.179.253.175 -->