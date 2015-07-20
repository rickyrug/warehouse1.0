<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>jQuery UI Autocomplete - Combobox</title>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <link rel="stylesheet" href="../assets/js/autocompleteFW/autocomplete-0.3.0.css">
 <!--  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>-->
        <script src="../assets/js/jquery-1.11.2.min.js"></script> 
        <script src="../assets/js/autocompleteFW/autocomplete-0.3.0.js"></script> 
    </head>
    <body>
        <?php
        if(isset($_GET['test'])){
            echo $_GET['test'];
        }
        ?>
        <form>

            <div id="search_bar">

            </div>
            <input type="submit" value="Test" id="testbtn"/>
        </form>
        <script>
            var buildAjaxOpts = function (input) {
                return {
                    data: {
                    },
                    type: 'POST',
                    url: 'http://localhost/Codeigniter/index.php/configuration/Product/ajax_call_list/' + input
                };
            };


            var config = {
                maxTokenGroups: 1,
                lists: {
                    products: {
                        ajaxOpts: buildAjaxOpts,
                    }
                }
            };
            
            var widget = new AutoComplete('search_bar', config);
            
            $('#testbtn').on('click', function() {
                var valorBusqueda = widget.getValue()[0];
                
                var newdiv = document.createElement('div');
                newdiv.innerHTML = "Entry " + " <br><input type='text' name='test' value='"+valorBusqueda[0].value+"'>";
               document.getElementById("search_bar").appendChild(newdiv);
               console.log(widget.getValue());
               console.log(valorBusqueda[0].value);
            });
            
            
        </script>
    </body>
</html>