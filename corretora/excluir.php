<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "usuarios";

$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "DELETE from corretores WHERE id=".$_REQUEST["id"];
$res = $conn->query($sql);
if ($res === true) {
    print "<script>confirm('Tem certeza que deseja excluir?')</script>";
    print "<script>alert('Excluido com sucesso!')</script>";
    print "<script>location.href='/testeEmpresa/index.php'</script>";
}
?>