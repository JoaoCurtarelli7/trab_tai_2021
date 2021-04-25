<?php
include "./src/head.php";
?>


<H4 style=" margin: 20px; font-size: 30px;">Telas</H4>
<div class="card" style="width: 33rem; margin: 20px;">
    <img class="card-img-top" style="max-width: 140px; margin-left: 20px; margin-top: 10px;"
        src="https://cdns.iconmonstr.com/wp-content/assets/preview/2018/240/iconmonstr-user-circle-thin.png"
        alt="Imagem de capa do card">
    <div class="card-body" style="margin-left: 180px; margin-top: -150px;">
        <h5 class="card-title">Meus Contatos</h5>
        <p class="card-text">Cadastre e Gerencie todos seus contatos</p>
        <a href="./src/listaContato.php" class="btn btn-primary"><i class="fas fa-address-card"></i> Ver</a>
    </div>
</div>
<div class="card" style="width: 33rem; margin: 20px;">
    <img class="card-img-top" style="max-width: 140px; margin-left: 20px; margin-top: 10px;"
        src="https://img.ibxk.com.br/2014/11/programas/9457724.png" alt="Imagem de capa do card">
    <div class="card-body" style="margin-left: 180px; margin-top: -150px;">
        <h5 class="card-title">Minha Agenda</h5>
        <p class="card-text">Cadastre e Gerencie todos seus compromissos</p>
        <a href="./src/listaAgenda.php" class="btn btn-primary"><i class="fas fa-address-card"></i> Ver</a>
    </div>
</div>

<?php
include "./src/footer.php";
?>