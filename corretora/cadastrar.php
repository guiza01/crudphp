<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "usuarios";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexao com o banco". $conn->connect_error);
}

if (!empty($_POST["cpf"]) && !empty($_POST["creci"]) && !empty($_POST["nome"])) {
    $cpf = $_POST["cpf"];
    $creci = $_POST["creci"];
    $nome = $_POST["nome"];

    if ($nome == "André Nunes") {
        echo "<script>alert('Não é permitido cadastrar André Nunes.'); window.history.back();</script>";
        exit;
    }

$sqlRepet = "SELECT * FROM corretores WHERE cpf = '$cpf'";
$result = $conn->query($sqlRepet);

if ($result->num_rows > 0) {
    echo "Os dados informados já foram cadastrados.";
    print "<script>location.href='/testeEmpresa/index.php';</script>";
} else {
    $sqlInsert = "INSERT INTO corretores (nome, cpf, creci) VALUE ('$nome', '$cpf', '$creci')";

    if ($conn->query($sqlInsert) === TRUE) {
        echo "<script>alert('Dados inseridos com sucesso!'); </script>";
        print "<script>location.href='/testeEmpresa/index.php'</script>";
    } 
}
} 

$conn->close();

?>