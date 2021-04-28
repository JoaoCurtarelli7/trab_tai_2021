<?php
include '../database/bd.php';

$objBD = new bd();
$tabela = "crud_agenda";
if (!empty($_POST['valor'])) {
    $result = $objBD->search($tabela, $_POST);
} else {
    $result = $objBD->select($tabela);
}

if (!empty($_GET['id'])) {
    $objBD->remove($tabela, $_GET['id']);
    header("location:listaAgenda.php");
}

?>

<?php
include "./head.php"
?>

<br>
<h4>Listagem de Agenda</h4>
<br>


<form action="listaAgenda.php" method="post">
    <div class="row">
        <div class="col-3">
            <input type="text" class="form-control" placeholder="Pesquisar" name="valor" id=""><br>
        </div>

        <div class="col-2">
            <select name="tipo" class="form-control" id="">
                <option>Tipo</option>
                <option value="titulo">Titulo</option>
                <option value="data_inicio">Data Início</option>
                <option value="hora_inicio">Hora Início</option>
                <option value="data_fim">Data fim</option>
                <option value="hora_fim">Hora fim</option>
                <option value="local">Local</option>
                <option value="convidado_id">Convidado</option>
                <option value="descricao">Descrição</option>

            </select>
        </div>
        <div class="col-3">
            <button type="submit" class="btn btn-success"> <i class="fas fa-search"></i> Buscar</button>

            <a href="./cadastroAgenda.php" class="btn btn-primary"><i class="fas fa-plus"></i> Cadastrar</a>
        </div>
    </div>
</form>


<table class="table table-hover">
    <thead>
        <th scope="col">#</th>
        <th scope="col">Titulo</th>
        <th scope="col">Data Início</th>
        <th scope="col">Hora Início</th>
        <th scope="col">Data fim</th>
        <th scope="col">Hora fim</th>
        <th scope="col">Local</th>
        <th scope="col">Descrição</th>
        <th scope="col">Convidado</th>
        <th scope="col">Ação</th>
        <th scope="col">Ação</th>



    </thead>
    <tbody>
        <?php
foreach ($result as $item) {
    $item = (object) $item;
    $resultCategoria = $objBD->find("crud_contato", $item->convidado_id);
    
    echo "
    <tr>
    <th scope='row'>" . $item->id . "</td>
    <td>" . $item->titulo . "</td>
    <td>" . $item->data_inicio . "</td>
    <td style=color:blue>" . $item->hora_inicio . "</td>
    <td>" . $item->data_fim . "</td>
    <td style=color:blue>" . $item->hora_fim . "</td>
    <td>" . $item->local . "</td>
    <td style=color:blue>" . $item->descricao . "</td>
    <td><a href = 'cadastroAgenda.php?id=" . $item->id . "' style='color:orange;''><i class='fas fa-edit'></i></a></td>
    <td><a href='listaAgenda.php?id=" . $item->id . "' onclick=\"return confirm('Deseja remover o registro ?'); \" style='color:red;'><i class='fas fa-trash'></i></a> </td>       
     </tr>
    ";
       
}
?>
    </tbody>
</table>

<?php
include "./footer.php"
?>