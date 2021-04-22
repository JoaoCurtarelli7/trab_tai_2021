<?php

include '../database/bd.php';

$objBD = new bd();

if (!empty($_POST['valor'])) {
    $result = $objBD->search($_POST);
} else {
    $result = $objBD->select();
}
if (!empty($_GET['id'])) {
    $objBD->remove($_GET['id']);
    header("location:listaContato.php");
}

?>

<?php
include "./head.php"
?>

<br>
<h4>Listagem de Usuários</h4>
<br>


<form action="listaContato.php" method="post">
    <div class="row">
        <div class="col-3">
            <input type="text" class="form-control" placeholder="Pesquisar" name="valor" id=""><br>
        </div>

        <div class="col-2">
            <select name="tipo" class="form-control" id="">
                <option value="nome">Nome</option>
                <option value="sobrenome">Sobrenome</option>
                <option value="telefone1">Telefone 02</option>
                <option value="tipo_telefone1">Tipo telefone 01</option>
                <option value="telefone2">Telefone 02</option>
                <option value="tipo_telefone2">Tipo telefone 02</option>
                <option value="email">E-mail</option>
            </select>
        </div>
        <div class="col-3">
            <button type="submit" class="btn btn-primary"> <i class="fas fa-search"></i> Buscar</button>

            <a href="./cadastroContato.php" class="btn btn-success"> <i class="fas fa-plus-circle"></i> Cadastrar</a>
        </div>
    </div>
</form>



<table class="table table-hover">
    <thead>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Sobrenome</th>
        <th scope="col">Telefone 01</th>
        <th scope="col">Tipo Telefone 01</th>
        <th scope="col">Telefone 02</th>
        <th scope="col">Tipo Telefone 02</th>
        <th scope="col">Email</th>
        <th scope="col">Ação</th>
        <th scope="col">Ação</th>



    </thead>
    <tbody>
        <?php
foreach ($result as $item) {
    $item = (object) $item;
    echo "
        <tr>
        <th scope='row'>" . $item->id . "</td>
        <td>" . $item->nome . "</td>
        <td>" . $item->sobrenome . "</td>
        <td>" . $item->telefone1 . "</td>
        <td>" . $item->tipo_telefone1 . "</td>
        <td>" . $item->telefone2 . "</td>
        <td>" . $item->tipo_telefone2 . "</td>
        <td>" . $item->email . "</td>
        <td><a href = 'cadastroContato.php?id=" . $item->id . "'><i class=\"fas fa-user-edit\"></i></a></td>
        <td><a href='listaContato.php?id=" . $item->id . "' onclick=\"return confirm('Deseja remover o registro ?'); \"  > <i class=\"fas fa-user-times\"></i></a> </td>       
         </tr>
        ";
}
?>
    </tbody>
</table>

<?php
include "./footer.php"
?>