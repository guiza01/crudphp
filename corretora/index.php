<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <title>Cadastro</title>
    <style>
        body {
            justify-content: center;
            align-items: center;
        }
        h2 {
            margin-top: 20px;
            text-align: center;
        }
        input {
            width: 250px;
            padding: 08px;
            margin-top: 10px;
        }
        #nome {
            width: 505px;
            padding: 10px;
            margin-top: 5px;
        }
        button {
            width: 70px;
            height: 35px;
            font-size: 20px;
            margin-top: 5px;
            align-items: center;
        }
        #enviar {
            width: 505px;
            height: 40px;
            font-size: 20px;
            margin-top: 10px;
            background-color: #00BFFF;
        }
        form {
            text-align: center;
        }
        table {
            margin-top: 50px;
            border-collapse: collapse;
        }
        .custom-table {
            width: 100%;
            border: 1px solid black;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        #acao {
            text-align: center;
            align-items: center;
        }
    </style>

</head>

<body>

    <h2>Cadastro de Corretor</h2>


    <form id="form" action="index.php" method="POST">

        <input type="text" id="cpf" name="cpf" placeholder="Digite o seu cpf" minlength="11" maxlength="11" required>
        <input type="text" id="creci" name="creci" placeholder="Digite o seu creci" minlength="2" maxlength="8" required>
        <br>
        <input type="text" id="nome" name="nome" placeholder="Digite o seu nome" minlength="2" maxlength="20" required>
        <br>
        <button type="submit" id="enviar" value="enviar">Enviar</button>

    </form>

    <?php

    ?>
    <div class="container">
        <table class="custom-table">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Creci</th>
                <th>CPF</th>
                <th id="acao">AÇÃO</th>
            </tr>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "usuarios";

            $conn = new mysqli($servername, $username, $password, $dbname);

            $sql = "SELECT * FROM corretores";

            $res = $conn->query($sql);

            $qtd = $res->num_rows;

            if ($qtd > 0) {
                while ($row = $res->fetch_object()) {
                    echo "<tr>";
                    echo "<td>" . $row->id . "</td>";
                    echo "<td>" . $row->nome . "</td>";
                    echo "<td>" . $row->creci . "</td>";
                    echo "<td>" . $row->cpf . "</td>";
                    echo "<td id='acao'>
                        <button onclick=\"window.location.href='editar.php?id=".$row->id."';\" class='btn btn-success'>Editar</button>

                        <button onclick=\"window.location.href='excluir.php?id=".$row->id."';\" class='btn btn-danger'>Excluir</button>
                      </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Nenhum registro encontrado.</td></tr>";
            }
            
            ?>
        </table>
    </div>
    <?php
    include("cadastrar.php");
    ?>

</body>

</html>