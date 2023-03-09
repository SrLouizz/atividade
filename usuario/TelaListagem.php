<?php

    include("../config/cabecalho.php");
    include("../conexao.php");

    $sql = "SELECT id, nome, email, agencia, conta login FROM usuario";
     
    $result = $conexao->query($sql);

    if($result->rowCount() > 0){
        echo "<table border=1>";
        echo "
            <tr>
                <th>Nome</th>
                <th>E-Mail</th>
                <th>Agencia</th>
                <th>Telefone</th>
                <th>Conta</th>
                <th>Deletar</th>
                <th>Editar</th>
           </tr>
           ";
           foreach ($result as $row) {
            echo "<tr>";
            echo "<td>".$row["nome"]."</td>";
            echo "<td>".$row["email"]."</td>";
            echo "<td>".$row["razao_social"]."</td>";
            echo "<td>".$row["telefone"]."</td>";
            echo "<td>".$row["conta"]."</td>";
            echo '<td><a href="TelaEditar.php?id='.$row['id'].'">Editar</a> </td>';
            echo '<td><a href="deletar.php?id='.$row['id'].'">Excluir</a> </td>';
            echo "</tr>";

           }
            echo "</table>";        

    }else {
        echo "Nenhum dado encontrado";
    }

    include("../config/rodape.php");