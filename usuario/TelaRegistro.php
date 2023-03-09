<?php
    include("../config/cabecalho.php");
?>

<div class="container">
    <h1>Registro de funcionário</h1>
    <form action="" method="POST">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" placeholder="Informe seu nome" required>

        <label for="nome">Email</label>
        <input type="email" name="email" id="email" placeholder="Informe seu email" required>

        <label for="nome">Nome da agencia</label>
        <input type="text" name="agencia" id="agencia" placeholder="Informe sua agencia" required>

        <label for="nome">Telefone</label>
        <input type="text" name="tel" id="tel" placeholder="Informe seu Telefone" required>


        <label for="nome">Conta</label>
        <input type="text" name="conta" id="conta" placeholder="Informe sua conta bancaria" required>

        <button type="submit">Enviar</button>
    </form>
    <?php
        // conectar com o banco de dados
        include("../conexao.php");

        // formulario foi enviado?
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $agencia = $_POST["agencia"];
            $telefone = $_POST["telefone"];
            $conta= $_POST["conta"];

            $sql = "INSERT INTO funcionario(nome, email, agencia, telefone, conta) VALUES (:nome, :email, :agencia, :telefone, :conta)";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":nome",$nome);
            $stmt->bindValue(":email",$email);
            $stmt->bindValue(":agencia",$agencia);
            $stmt->bindValue(":telefone",$telefone);
            $stmt->execute();

            if ($stmt-> rowCount() > 0){
                echo "<div class='sucess'>Funcionario cadastrado com sucesso</div>";
            }else{
                echo "<div class='error'>Falha ao registrar funcionario</div>";
            }

        }
    ?>
</div>

<?php
    include("../config/rodape.php");
?>