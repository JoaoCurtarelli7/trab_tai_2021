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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h3>Formulário</h3>

    <form action="cadastro.php" method="post">
        <input type="hidden" name="id" styles="width: 500px" value="<?php echo !empty($result->id)
? $result->id : ""; ?>"><br>

        <div class="input-group mb-3">

            <input type="text" class="form-control" placeholder="Nome" aria-describedby="basic-addon1" name="nome" id=""
                value="<?php echo !empty($result->nome)
? $result->nome : ""; ?>" required>
        </div><br>



        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Sobrenome" aria-describedby="basic-addon1"
                name="sobrenome" id="" value="<?php echo !empty($result->sobrenome)
? $result->sobrenome : ""; ?>" required>
        </div><br>


        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Telefone 01" aria-describedby="basic-addon1"
                name="telefone1" id="" value="<?php echo !empty($result->telefone1)
? $result->telefone1 : ""; ?>" required>
        </div>

        <div class="input-group mb-3">
            <select style="width: 500px;" class="custom-select" name="tipo_telefone1" id="" value="<?php echo !empty($result->tipo_telefone1)
? $result->tipo_telefone1 : ""; ?>" required>

                <option selected>Tipo Telefone 01</option>
                <option value="Casa">Casa</option>
                <option value="Celular">Celular</option>
                <option value="Comercial">Comercial</option>
                <option value="Principal">Principal</option>
            </select>
            <div class="input-group-append">
                <label class="input-group-text" for="inputGroupSelect02">Opções</label>
            </div>
        </div><br>

        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Telefone 02" aria-describedby="basic-addon1"
                name="telefone2" id="" value="<?php echo !empty($result->telefone2)
? $result->telefone2 : ""; ?>" required>
        </div>

        <div class="input-group mb-3">
            <select style="width: 500px;" class="custom-select" name="tipo_telefone2" id="" value="<?php echo !empty($result->tipo_telefone2)
? $result->tipo_telefone2 : ""; ?>" required>

                <option selected>Tipo Telefone 02</option>
                <option value="Casa">Casa</option>
                <option value="Celular">Celular</option>
                <option value="Comercial">Comercial</option>
                <option value="Principal">Principal</option>
            </select>
            <div class="input-group-append">
                <label class="input-group-text" for="inputGroupSelect02">Opções</label>
            </div>
        </div>



        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="E-mail" aria-describedby="basic-addon1" name="email"
                id="" value="<?php echo !empty($result->email)
? $result->email : ""; ?>" required>
        </div><br>


        <input type="submit" value="Salvar">
        <a href="./lista.php">Voltar</a>
    </form>
</body>

</html>

<?php
include "./footer.php"
?>