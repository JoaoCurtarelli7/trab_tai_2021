<?php
include '../database/bd.php';

$objBD = new bd();

$tabela = "crud_agenda";
$resultCategoria = $objBD->select("crud_contato");

if (!empty($_POST['titulo'])) {

    if (!empty($_POST['id'])) {
        $objBD->update($tabela, $_POST);
    } else {
        var_dump($_POST);

        $objBD->insert($tabela, $_POST);
    }

    header("location:listaAgenda.php");
} elseif (!empty($_GET['id'])) {
    $result = $objBD->find($tabela, $_GET['id']);
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
                    name="titulo" id="" value="<?php echo !empty($result->titulo)
? $result->titulo : ""; ?>" required><br>
            </div>

        </div>

        <div class="form-row">

            <div class="col-3">
                <label>Data Início</label>
                <input type="date" class="form-control" aria-describedby="basic-addon1" name="data_inicio" id="" value="<?php echo !empty($result->data_inicio)
? $result->data_inicio : ""; ?>" required>
            </div>
            <div class="col-3">
                <label>Hora Início</label>
                <input type="time" class="form-control" aria-describedby="basic-addon1" name="hora_inicio" id="" value="<?php echo !empty($result->hora_inicio)
? $result->hora_inicio : ""; ?>" required>
                <br>
            </div>

        </div>

        <div class="form-row">

            <div class="col-3">
                <label>Data Fim</label>
                <input type="date" class="form-control" aria-describedby="basic-addon1" name="data_fim" id="" value="<?php echo !empty($result->data_fim)
? $result->data_fim : ""; ?>" required>
            </div>
            <div class="col-3">
                <label>Hora Fim</label>
                <input type="time" class="form-control" aria-describedby="basic-addon1" name="hora_fim" id="" value="<?php echo !empty($result->hora_fim )
? $result->hora_fim  : ""; ?>" required><br>
            </div>

        </div>
        <div class="form-row">

            <div class="col-6">
                <label>Local</label>
                <input type="text" class="form-control" placeholder="Local" aria-describedby="basic-addon1" name="local"
                    id="" value="<?php echo !empty($result->local)
? $result->local : ""; ?>" required><br>
            </div>

        </div>

        <div class="form-row">

            <div class="form-group col-md-6"><label>Convidado</label>
                <select class="custom-select" id="convidado_id" name="convidado_id">
                    <?php
                foreach ($resultCategoria as $item) {
                    $item = (object) $item;

                    $selected = $item->id === $result->convidado_id ? "selected" : "";

                    echo " <option value=" . $item->id . " $selected>" . $item->nome . "</option>";
                }
                ?>
                </select>



                </select>
            </div>

        </div>
        <div class="form-row">
            <div class="form-group col-6">
                <label for="exampleFormControlTextarea1">Descrição</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="descricao" rows="3"
                    placeholder="Ponto de referência..."></textarea>
            </div>
        </div>

        <button type="submit" value="Salvar" class="btn btn-success"><i class="far fa-save"></i> Salvar</button>
        <button type="button" class="btn btn-primary"> <a style="color: white" href="./listaAgenda.php"><i
                    class="fas fa-arrow-left"></i> Voltar</a></button>


    </form>
</body>

</html>

<?php
include "./footer.php"
?>