<!DOCTYPE html>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>
            $(document).ready(function () {
                $("form").submit(function () {
                var name = $('[name="FirstName"]').val();
                console.log(name);
              
               
                $.get('',{ FirstName: name });
                });
                $("button").click(function () {
                     event.preventDefault();
                        $("form").submit();
                });
            });
        </script>
    </head>
    <body>

        <form action="">
            First name: <input type="text" name="FirstName[]" value="Mickey" id="name"><br>
                        <input type="text" name="FirstName[]" value="Mickey2" id="name"><br>
                        <input type="text" name="FirstName[]" value="Mickey3" id="name"><br>
                        <input type="text" name="FirstName[]" value="Mickey4" id="name"><br>
            Last name: <input type="text" name="LastName" value="Mouse"><br>
        </form> 

        <button>Trigger submit event</button>

    </body>
</html>

<?php

if(isset($_GET['FirstName'])){
    var_dump($_GET['FirstName']);
}
?>