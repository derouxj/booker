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
        <?php include('menu.view.php');
        if(isset($data['artistes'])){
            foreach ($data['artistes'] as $value) { 
                echo $value->getFirstName();
                echo '</br>';
            }
        }
 ?>
</body>
</html>
