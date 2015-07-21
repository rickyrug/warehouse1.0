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
        <script type="text/javascript" src="../assets/js/jquery-1.11.2.min.js"></script>
        <script type="text/javascript">
         $(document).ready(function(){
          $('#warehouse').change(function(){
           var selTable = $(this).val(); // selected name from dropdown #table
           $.ajax({
            url: "http://localhost/Codeigniter/index.php/configuration/workcenter/ajax_call_dropdown",  // or "resources/ajax_call" - url to fetch the next dropdown
                        async: false,
                        type: "POST", // post
                        data: "warehousenumber=" + selTable, // variable send
                        dataType: "html", // return type
                        success: function (data) {  // callback function
                            $('#workcenter').html(data);
                        }
                    })
                });
            });
        </script>

    </head>
    
    <body>
        <form action="testaction.php" method="POST">
            <table border="1">
                
                <tbody>
                    <tr>
                        <td>
                            <select id="warehouse" name="warehouse">
                                <option ></option>
                                <option value="1">1810</option>
                                <option value="3">1010</option>
                            </select>
                        </td>
                        <td>
                            <div id="workcenter">
                                
                            </div>
                        </td>
                    </tr>
                    
                </tbody>
            </table>
            <input type="submit" value="send" />

        </form>
    </body>
</html>
