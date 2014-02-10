<?php

    require_once('../config.php');
    $pagetitle = "Hem | Matkassen.se";

require_once(ROOT_PATH.'/header.php'); ?>

<div class="row">
    <div class="col-md-3 col-md-offset-5">
        <h1>Lägg till Butiker</h1>
        <div id="storeForm">
            <form role="form" method="post" action="run.php?func=adm_adm_add">
                <div class="form-group">
                    <label for="storename">Butiksnamn</label>
                    <input type="text" class="form-control" id="storename" placeholder="Butiksnamn" name="storename">
                </div>
                <div id="login" class="form-group">
                    <label for="username">Användarnamn</label>
                    <input type="text" class="form-control" id="username" placeholder="Användarnamn" name="username">
                </div>
                <div class="form-group">
                    <label for="password">Lösenord</label>
                    <input type="password" class="form-control" id="password" placeholder="Lösenord" name="password">
                </div>
                <div class="form-group">
                    <label for="password2">Upprepa lösenord</label>
                    <input type="password" class="form-control" id="password2" placeholder="Upprepa lösenord" name="password2">
                </div>
                
                <button type="submit" class="btn btn-primary">Lägg till</button>
            </form>
        </div>
    </div>
</div>

<?php require_once(ROOT_PATH.'/footer.php'); ?>