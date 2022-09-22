<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Prénom</th>
        <th scope="col">Nom</th>
    </tr>
    </thead>
    <tbody>

    <?php
        foreach($les_membres as $cle => $valeur) {
            echo '<tr>';
            echo '<td>'.  $valeur['id'] . '</td>';
            echo '<td>'.  $valeur['nom'] . '</td>';
            echo '<td>'.  $valeur['prenom'] . '</td>';            
            echo '<td width=340>';
            echo '<a class="btn btn-danger" href="index.php?uc=gerer&action=supprimer&id='.$valeur['id'].'"><span class="bi bi-x-circle"></span> Supprimer</a>';
                                    // index.php?controle=c_admin_modifier&action=modifierAdherantC&idAdherant=
            echo '</tr>';
        }
        ?>

    </tbody>
</table>
<ul>
    <li><a href='index.php'>retour accueil</a></li>
</ul>

