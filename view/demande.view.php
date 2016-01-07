<!DOCTYPE html>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../view/style/styleform.css" />
<html>
    <head>
        <title>
            Demande
        </title>
    </head>
    <body>
        <?php
        $active = "event";
        include('menu.view.php');
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
<?php if (isset($_COOKIE['username'])) { ?>
                <fieldset>
                    <legend>
                        Informations sur l'événement
                    </legend>
                    <p><ul class="liste"><li class="main">Booker demandé : </li><li class="sec">
                            <SELECT name="booker" size="1">
                                <?php
                                foreach ($bookers as $b) {
                                    $n = $b->getUsername();
                                    echo "<OPTION value=$n>$n";
                                }
                                ?> 
                            </SELECT></li></ul>
                    </p>
                    <p><ul class="listemult"><li class="main">Artistes demandés : </li><li class="sec">
                            <SELECT name="artists[]" size="4" multiple>
                                <?php
                                foreach ($artists as $a) {
                                    echo '<OPTION value="' . $a->getUsername() . '">' . $a->getUsername();
                                }
                                ?> 
                            </SELECT></li></ul>
                    </p>
                    <p><ul><li class="main">Nom de l'événement :</li><li class="sec"><input type="text" name="eventName"></li></ul>
                    </p>
                    <p><ul><li class="main">Lieu de déroulement de l'événement :</li><li class="sec"><input type="text" name="place"></li></ul>
                    </p>
                    <p>



                    <ul><li class="main">Date de l'événement :</li><li class="sec">

                            <?php
                            echo "<SELECT name='day' Size='1'>";

                            for ($day = 1; $day <= 31; $day++) {
                                if ($day < 10) {
                                    echo "<OPTION>0$day<br></OPTION>"; //rajoute un 0 lorsque day<10
                                } else {
                                    echo "<OPTION>$day<br></OPTION>";
                                }
                            }
                            echo "</SELECT>";

                            echo '<SELECT name="month" Size="1">';

                            for ($month = 1; $month <= 12; $month++) {
                                if ($month < 10) {
                                    echo "<OPTION>0$month<br></OPTION>";
                                } else {
                                    echo "<OPTION>$month<br></OPTION>";
                                }
                            }
                            echo "</SELECT>";

                            $date = date('Y');       //année courante

                            echo '<SELECT name="year" Size="1">';

                            for ($year = $date; $year <= $date + 50; $year++) {
                                echo "<OPTION><br>$year<br></OPTION>";
                            }
                            echo "</SELECT>";                           
                            ?>
                        </li></ul>
                    </p>

                    <p><ul class="area"><li class="main">Description de l'événement:</li><li class="sec"><textarea name="desc" rows=3></textarea></li></ul>
                    </p>
                </fieldset>
                <input id="valider" type="submit" name="valider" value="Valider">
                <?php
                if (isset($_POST['fieldnotset'])) {
                    echo '<script>alert("Veuillez remplir tout les champs d\'information.")</script>';
                }
            } else {
                echo '<center><p>Vous devez être connecté pour voir cette page</p></center>';
            }
            ?>
        </form>
    </body>
</html>
