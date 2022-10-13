<form class="form" action="" role="form" method="post" enctype="multipart/form-data">
    
    <br>
        <input type="hidden" name="id" value="<?php echo ($id) ?>" />
    <br>

    <div>
        <label class="form-label" for="nom">Nom:</label>
        <input type="text" class="form-control" id="nom" name="nom" placeholder="Ex : Xavier" value="">
    </div>
    <br>
    <div>
        <label class="form-label" for="Prenom">Prenom:</label>
        <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Ex : DIALLO" value="">
    </div>

    <br>

    <div class="form-actions">
        <button type="submit" class="btn btn-primary"><span class="bi-pencil"></span> Modifier</button>
    </div>
</form>
