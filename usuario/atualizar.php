<?php

    include("../conexao.php");

    if(!isset($_GET['id'])){
        die("Funcionario não existe");
    }

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $login = $_POST['agencia'];
    $telefone = $_POST['telefone'];
    $conteudo = $_POST['Conta'];

    if(isset($id) && isset($nome) && isset($email) && isset($login)){
        $sql = "UPDATE usuario SET nome = :nome, email = :email, agencia =:agencia, telefone =:telefone, conta =:conta WHERE id= :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->bindValue(":nome", $nome);
        $stmt->bindValue(":email", $email);

        $stmt->execute();

        header("Location: TelaListagem.php");
        exit();

    }else{
        die("Dados do formulário não preenchidos"); 
    }