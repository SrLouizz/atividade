<?php

include("../conexao.php");

// verificar se o id foi fornecido
if (!isset($_GET['id'])){
    die("ID do usuário não foi encontrado");
}else {
    $id = $_GET['id'];

    $sql = "DELETE FROM usuario WHERE id =:id";
    $stmt = $conexao->prepare($sql);
    $stmt->bindValue(":id", $id);
    $stmt->execute();

    header("Location: TelaListagem.php");
    exit;
}