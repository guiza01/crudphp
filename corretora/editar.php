<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <title>Editar</title>
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
            width: 505px;
            height: 40px;
            font-size: 20px;
            margin-top: 10px;
            background-color: #00BFFF;
        }

        form {
            text-align: center;
        }
    </style>

</head>

<body>

    <h2>Editar cadastro de Corretor</h2>

    <?php
    include("atualizar.php");
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "usuarios";

    $conn = new mysqli($servername, $username, $password, $dbname);
    $sqlSelec = "SELECT * FROM corretores WHERE id=".$_REQUEST["id"];
    $res = $conn->query($sqlSelec);
    $row = $res->fetch_object();
    ?>

    <form action="editar.php" method="POST">
        <input type="hidden" name="id" value="<?php print $row->id; ?>">
        <input type="number" name="cpf" id="cpf" value="<?php print $row->cpf; ?>" minlength="11" maxlength="11" required>
        <input type="number" name="creci" id="creci" value="<?php print $row->creci; ?>" minlength="2" maxlength="8" required>
        <br>
        <input type="text" name="nome" id="nome" value="<?php print $row->nome; ?>" minlength="2" maxlength="20" required>
        <br>
        <button type="submit" value="enviar">Atualizar</button>

    </form>

    <?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "usuarios";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $sqlUpdate = "UPDATE corretores SET 
        cpf = '$cpf',
        creci = '$creci',
        nome = '$nome'
        WHERE id =".$_REQUEST["id"];

        if ($conn->query($sqlUpdate) === TRUE) {
            echo "<script>alert('Registro atualizado com sucesso');</script>";
            print "<script>location.href='/testeEmpresa/index.php'</script>";
        } else {
            echo "Erro ao atualizar registro: " . $conn->error;
        }
    }
    ?>


</body>

</html>