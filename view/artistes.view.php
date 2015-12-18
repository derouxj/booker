<!DOCTYPE html>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../view/style/styleform.css" />
<html>
    <head>
        <title>
            Artistes
        </title>
    </head>
    <body>
        <?php $active = "artistes";include('menu.view.php');
        if(isset($data['artistes'])){
            foreach ($data['artistes'] as $value) { 
                echo $value->getFirstName();
                echo '</br><img src='.$value->getProfilPic().' height="200" width="200">';
                echo '</br>';
            }
        }
 ?>
</body>
</html>
