<!DOCTYPE html>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../view/style/styleart.css" />
<html>
    <head>
        <title>
            Artistes
        </title>
    </head>
    <body>
        <?php
        $active = "artistes";
        include('menu.view.php');
        if (isset($data['artistes'])) {
            foreach ($data['artistes'] as $value) {
                ?>
                <section>
                    <p class='name'>
                        <a href="../controller/unartiste.php?art=<?php echo $value->getUserName(); ?>">
                        <?php echo $value->getFirstName(); ?>
                        </a>
                    </p>
                    <a href="../controller/unartiste.php?art=<?php echo $value->getUserName(); ?>">
                        <img src='<?php echo $value->getProfilPic(); ?>' height="200" width="200">
                    </a>
                </section>
                <?php
            }
        }
 ?>
</body>
</html>
