<?php
include '../database/bd.php';

$objBD = new bd();

$tabela = "crud_agenda";
$resultCategoria = $objBD->select("crud_contato");

if (!empty($_POST['nome'])) {

    if (!empty($_POST['id'])) {
        $objBD->update($tabela, $_POST);
    } else {
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

            <div class="col-6">
                <label>Local</label>
                <input type="text" class="form-control" placeholder="Local" aria-describedby="basic-addon1" name="nome"
                    id="" value="<?php echo !empty($result->nome)
? $result->nome : ""; ?>" required><br>
            </div>

        </div>

        <div class="form-row">

            <div class="form-group col-md-6"><label>Convidado</label>
                <label for="categoria_id">Categoria</label>
                <select class="custom-select" id="categoria_id" name="categoria_id">
                    <?php
                foreach ($resultCategoria as $item) {
                    $item = (object) $item;

                    $selected = $item->id === $result->categoria_id ? "selected" : "";

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
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
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