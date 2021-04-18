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
 
    
    header("location:lista.php");
} elseif (!empty($_GET['id'])) {
    $result = $objBD->find($_GET['id']);
}
?>


<?php
include "./head.php"
?>

<!DOCTYPE html>
<html lang = "en">
<head>
<meta charset = "UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h3>Formulário</h3>

    <form action="cadastro.php" method="post">
        <input type="hidden" name="id" value="<?php echo !empty($result->id)
? $result->id : ""; ?>"><br>

        <label for="">Nome</label>
        <input type="text" name="nome" id="" value="<?php echo !empty($result->nome)
? $result->nome : ""; ?>"><br>

<label for="">Sobrenome</label>
        <input type="text" name="sobrenome" id="" value="<?php echo !empty($result->sobrenome)
? $result->sobrenome : ""; ?>" required><br>

        <label for="">Telefone 01</label>
        <input type="text" name="telefone1" id="" value="<?php echo !empty($result->telefone1)
? $result->telefone1 : ""; ?>" required><br>

<label for="">Tipo Telefone 01</label>
        <input type="text" name="tipo_telefone1" id="" value="<?php echo !empty($result->tipo_telefone1)
? $result->tipo_telefone1 : ""; ?>" required><br>

<label for="">Telefone 02</label>
        <input type="text" name="telefone2" id="" value="<?php echo !empty($result->telefone2)
? $result->telefone2 : ""; ?>" required><br>

<label for="">Tipo Telefone 02</label>
        <input type="text" name="tipo_telefone2" id="" value="<?php echo !empty($result->tipo_telefone2)
? $result->tipo_telefone2 : ""; ?>" required><br>

<label for="">E-mail</label>
        <input type="text" name="email" id="" value="<?php echo !empty($result->email)
? $result->email : ""; ?>" required><br>

        <input type="submit" value="Salvar">
        <a href="./lista.php">Voltar</a>
    </form>
</body>
</html>

<?php
include "./footer.php"
?>
