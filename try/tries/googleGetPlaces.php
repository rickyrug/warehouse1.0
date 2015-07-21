<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="http://maps.googleapis.com/maps/api/distancematrix/json?" method="POST">
            <table border="1">
                <thead>
                    <tr>
                        <th colspan="2">Origen</th>
                        <th colspan="2">Destino</th>
                    </tr>
                    <tr>
                        <th>Calle</th>
                        <th>Ciudad</th>
                         <th>Calle</th>
                        <th>Ciudad</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" name="calleo" value="" /></td>
                        <td><input type="text" name="estadoo" value="" /></td>
                        <td><input type="text" name="called" value="" /></td>
                        <td><input type="text" name="estadod" value="" /></td>
                    </tr>
                    <tr>
                        
                        <td colspan="4"><input type="submit" value="test" size="100"/></td>
                    </tr>
                </tbody>
            </table>

        </form>
    </body>
</html>
