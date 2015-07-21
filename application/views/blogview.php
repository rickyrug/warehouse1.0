<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title; ?></title>
    </head>
    <body>
        <h1><?php echo $heading; ?></h1>
        <?php
           foreach ($results as $result){
               var_dump($result);
           }
        ?>
    </body>
</html>
