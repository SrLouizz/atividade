<?php

include("../config/cabecalho.php");
include("../conexao.php");

// saber se o ID do usuário foi passado
if(!isset($_GET['id'])){
    die("ID do funcionario invalido");
}

// obtem o id do usuario
$id = $_GET['id'];

$sql = "SELECT * FROM funcionario WHERE id= :id";
$stmt = $conexao->prepare($sql);
$stmt->bindValue(":id", $id);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if(!$row){
    die("funcionario não encontrado");
}
?>

<div class="container">
    <h1>Edição de usuário</h1>
    <form action="<?php echo "atualizar.php?id={$id}" ?>" method="POST">
        <input type="hidden" name="id" id="id" value="<?php echo $row['id'] ?>" >

        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" placeholder="Informe seu nome" required value="<?php echo $row['nome'] ?>">

        <label for="nome">Email</label>
        <input type="email" name="email" id="emaol" placeholder="Informe seu email" requiredvalue="<?php echo $row['email'] ?>">

        <label for="nome">Nome da agencia</label>
        <input type="text" name="login" id="login" placeholder="Informe seu login" requiredvalue="<?php echo $row['agencia'] ?>">

        <label for="nome">Telefone</label>
        <input type="text" name="tel" id="tel" placeholder="Informe seu email" requiredvalue="<?php echo $row['telefone'] ?>">

        <label for="nome">Conta</label>
        <input type="text" name="conta" id="conta" placeholder="Informe seu email" requiredvalue="<?php echo $row['conta'] ?>">

        <button type="submit">Atualizar</button>
    </form>
</div>

<?php

