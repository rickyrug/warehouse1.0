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
        <link href="dependent-dropdown-master/css/dependent-dropdown.min.css" media="all" rel="stylesheet" type="text/css" />
        <script src="../assets/js/jquery-1.11.2.min.js"></script>
        <script src="dependent-dropdown-master/js/dependent-dropdown.min.js" type="text/javascript"></script>
    </head>
    <body>
        <select id="parent-1">
            <!-- your select options -->
        </select>

        <select id="child-1" class="depdrop" depends="['parent-1']" url="/path/to/child_1_list">
            <!-- your select options -->
        </select>

        <select id="child-2" class="depdrop" depends="['parent-1, 'child-1']" url="/path/to/child_2_list">
            <!-- your select options -->
        </select>
    </body>
</html>
