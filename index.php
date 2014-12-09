<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Twitter</title>
 <header>Bienvenido a Twitter</header>
</head>
<body><?php 
    $id= 1;

    $con = pg_connect("host=localhost dbname=piolin
                    user=piolin password=piolin");

    if (isset($_POST['mensaje'])){
        $texto = $_POST['mensaje'];
        $msj = pg_query($con, "insert into twits (texto, usuario_id)
                                    values ('$texto', $id)");
    }
    $res= pg_query($con, "select * from twits 
                            where usuario_id= $id");

    $cols= array('usuario_id' => 'Id del Usuario',
               'texto' => 'Mensaje', 
               'fecha' => 'Fecha');


 ?>
    <form action="index.php" method="POST">
 <textarea name="mensaje" value="" rows="10" cols="50"></textarea>
 <input type="submit" value="enviar">
 </form>
 <table border="1">
        <thead><?php
            foreach ($cols as $k => $v):?>
                <th><?= $v ?></th><?php
            endforeach;?>
        </thead> 
        <tbody><?php
            for ($i = 0; $i < pg_num_rows($res); $i++):
                $fila = pg_fetch_assoc($res, $i);?>
                <tr><?php
                    foreach ($cols as $k => $v):?>
                        <td><?= $fila[$k] ?></td><?php
                    endforeach;?>
                   
                        </form>
                    </td>
                </tr><?php
            endfor;?>
        </tbody>
    </table>

 

 
</body>
</html>