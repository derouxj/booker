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
        <?php include('menu.view.php'); ?>
        <section id="main">
            <center><p> ICI VOTRE CARNET </p>
                <table>
                    <tr>
                        <td><p>Nom</p></td>
                        <td><p>Prenom</p></td>
                        <td><p>E-mail</p></td>
                        <td><p>Ville</p></td>
                        <td><p>Métier</p></td>
                        <td><p>Téléphone</p></td>
                        <td><p>Détails</p></td>
                        <td><p>Modification</p></td>
                    </tr>
                    <?php
                        if (isset($mesContacts)) {
                            foreach($mesContacts as $monContact) {
                                echo '<tr><td><p>'.$monContact[3].'</p></td>';
                                echo '<td><p>'.$monContact[2].'</p></td>';
                                echo '<td><p>'.$monContact[4].'</p></td>';
                                echo '<td><p>'.$monContact[5].'</p></td>';
                                echo '<td><p>'.$monContact[6].'</p></td>';
                                echo '<td><p>'.$monContact[7].'</p></td>';
                                echo '<td><p>'.$monContact[8].'</p></td>';
                                echo '<td><a href=\'PAGE_MODIF_AVEC_PRAM_GET\'><img src=\'../view/img/logo_modif.png\' height="30" width="30"/></a></td></tr>';
                            }
                        }
                    ?>
                </table>
            </center>
        </section>
</body>
</html>
