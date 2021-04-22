<?php

include '../database/bd.php';

$objBD = new bd();

if (!empty($_POST['nome'])) {
    $dados = [
        "id" => $_POST['id'],
        "nome" => $_POST['nome'],
        "sobrenome" => $_POST['sobrenome'],
        "telefone1" => $_POST['telefone1'],
        "tipo_telefone1" => $_POST['tipo_telefone1'],
        "telefone2" => $_POST['telefone2'],
        "tipo_telefone2" => $_POST['tipo_telefone2'],
        "email" => $_POST['email'],

    ];

    if (!empty($_POST['id'])) {
        $objBD->update($dados);
    } else {
        $objBD->insert($dados);
    }

    header("location:listaAgenda.php");
} elseif (!empty($_GET['id'])) {
    $result = $objBD->find($_GET['id']);
}
?>


<?php
include "./head.php"
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <br>
    <h3>Formulário Agenda</h3>

    <form action="cadastroAgenda.php" method="post">
        <input type="hidden" name="id" styles="width: 500px" value="<?php echo !empty($result->id)
? $result->id : ""; ?>"><br>



    </form>
</body>

</html>

<?php
include "./footer.php"
?>