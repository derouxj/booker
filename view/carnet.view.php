<!DOCTYPE html>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../view/style/styleacc.css" />
<html>
    <head>
        <title>
            Contact
        </title>
    </head>
    <body>
        <?php $active = "carnet"; include('menu.view.php'); ?>
        <section id="main">
            <center><p> ICI VOTRE CARNET </p>
                <table>
                    <tr id="top">
                        <td>Nom</td>
                        <td>Prenom</td>
                        <td>E-mail</td>
                        <td>Ville</td>
                        <td>Métier</td>
                        <td>Téléphone</td>
                        <td>Détails</td>
                        <td>Modification</td>
                    </tr>
                    <?php
                        if (isset($mesContacts)) {
                            foreach($mesContacts as $monContact) {
                                echo '<tr><td>'.$monContact[3].'</td>';
                                echo '<td>'.$monContact[2].'</td>';
                                echo '<td>'.$monContact[4].'</td>';
                                echo '<td>'.$monContact[5].'</td>';
                                echo '<td>'.$monContact[6].'</td>';
                                echo '<td>'.$monContact[7].'</td>';
                                echo '<td>'.$monContact[8].'</td>';
                                echo '<td><a href=\''.'../controller/nouveauContactCarnet.php?idC='.$monContact[0].'\'><img src=\'../view/img/logo_modif.png\' height="30" width="30"/></a> 
                                <a href=\''.'../controller/carnet.php?idC='.$monContact[0].'\'><img src=\'../view/img/logo_suppr.png\' height="30" width="30"/></a> </td></tr>';
                            }
                        }
                    ?>
                </table>
                <div id="end">
                    <a href="../controller/nouveauContactCarnet.php">Ajouter un contact</a>
                </div>
                <div id="end">
                    <a href="../controller/importerContact.php">Importer un contact</a>
                </div>
                
            </center>
        </section>
</body>
</html>
