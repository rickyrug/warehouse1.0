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
        <link rel="stylesheet" href="../assets/foundation/css/foundation.css" />
        <script src="../assets/foundation/js/vendor/modernizr.js"></script>
        <script src="../assets/js/jquery-1.11.2.min.js"></script>
        <script src="../assets/js/jquery-ui.js"></script>   

    </head>
    <body>
        <form action="#" method="POST">


            <ul class="tabs" data-tab role="tablist">
                <li class="tab-title active" role="presentational"><a href="#panel2-1" role="tab" tabindex="0" aria-selected="true" controls="panel2-1">General</a></li>
                <li class="tab-title" role="presentational"><a href="#panel2-2" role="tab" tabindex="0" aria-selected="false" controls="panel2-2">Quality</a></li>
                <li class="tab-title" role="presentational"><a href="#panel2-3" role="tab" tabindex="0" aria-selected="false" controls="panel2-3">Body Properties</a></li>
                <li class="tab-title" role="presentational"><a href="#panel2-4" role="tab" tabindex="0" aria-selected="false" controls="panel2-4">End Properties</a></li>
            </ul>
            <div class="tabs-content">
                <section role="tabpanel" aria-hidden="false" class="content active" id="panel2-1">
                    <tr>
                        <td><h5>Product code</h5></td>
                        <td>
                            <input type="text" name="code" value="" size="50" />
                        </td>
                    </tr>
                    <tr>
                        <td><h5>Product name</h5></td>
                        <td>
                            <input type="text" name="name" value="" size="50" />
                        </td>
                    </tr>
                    <tr>
                        <td><h5>Product group</h5></td>
                        <td>
                            <input type="text" name="group" value="" size="50" />
                        </td>
                    </tr>
                    <tr>
                        <td><h5>Product UOM</h5></td>
                        <td>
                            <select name="">
                                <option>M</option>
                                <option>PLG</option>
                            </select>
                        </td>
                    </tr>
                </section>
                <section role="tabpanel" aria-hidden="true" class="content" id="panel2-2">
                    <h2>Second panel content goes here...</h2>
                </section>
                <section role="tabpanel" aria-hidden="true" class="content" id="panel2-3">
                    <h2>Third panel content goes here...</h2>
                </section>
                <section role="tabpanel" aria-hidden="true" class="content" id="panel2-4">
                    <h2>Fourth panel content goes here...</h2>
                </section>
            </div>

            <script src="../assets/foundation/js/vendor/jquery.js"></script>
            <script src="../assets/foundation/js/foundation.min.js"></script>
            <script>
                $(document).foundation();
            </script>
        </form> 
    </body>
</html>
</body>
</html>
