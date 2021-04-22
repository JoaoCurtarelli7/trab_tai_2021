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

        <div class="form-row">

            <div class="col-6">
                <label>Titulo</label>
                <input type="text" class="form-control" placeholder="Reunião" aria-describedby="basic-addon1"
                    name="nome" id="" value="<?php echo !empty($result->nome)
? $result->nome : ""; ?>" required><br>
            </div>

        </div>

        <div class="form-row">

            <div class="col-3">
                <label>Data Início</label>
                <input type="date" class="form-control" aria-describedby="basic-addon1" name="nome" id="" value="<?php echo !empty($result->nome)
? $result->nome : ""; ?>" required>
            </div>
            <div class="col-3">
                <label>Hora Início</label>
                <input type="time" class="form-control" aria-describedby="basic-addon1" name="nome" id="" value="<?php echo !empty($result->nome)
? $result->nome : ""; ?>" required>
                <br>
            </div>

        </div>

        <div class="form-row">

            <div class="col-3">
                <label>Data Fim</label>
                <input type="date" class="form-control" aria-describedby="basic-addon1" name="nome" id="" value="<?php echo !empty($result->nome)
? $result->nome : ""; ?>" required>
            </div>
            <div class="col-3">
                <label>Hora Fim</label>
                <input type="time" class="form-control" aria-describedby="basic-addon1" name="nome" id="" value="<?php echo !empty($result->nome)
? $result->nome : ""; ?>" required><br>
            </div>

        </div>
        <div class="form-row">

            <div class="form-group col-md-6"><label>Convidado</label>
                <select class="custom-select" name="id" id="" value="<?php echo !empty($result->convidado_id)
? $result->convidado_id : ""; ?>" required>

                    <option selected>Convidado</option>
                    <option value="Casa">Casa</option>
                    <option value="Celular">Celular</option>
                    <option value="Comercial">Comercial</option>
                    <option value="Principal">Principal</option>
                </select>
            </div>

        </div>
        <div class="form-row">
            <div class="form-group col-6">
                <label for="exampleFormControlTextarea1">Descrição</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
        </div>
    </form>
</body>

</html>

<?php
include "./footer.php"
?>