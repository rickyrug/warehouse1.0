<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Warehouse 1.0</title>
        <link rel="stylesheet" href="<?php echo base_url() . 'assets/foundation/css/foundation.css'; ?>" />
        <script src="<?php echo base_url() . 'assets/foundation/js/vendor/modernizr.js'; ?>"></script>
        <script src="<?php echo base_url() . 'assets/js/jquery-1.11.2.min.js'; ?>"></script>
            
    </head>
    <body>
     
    <nav class="top-bar" data-topbar role="navigation">
  <ul class="title-area">
    <li class="name">
        <h1><?php  echo anchor('#','Warehouse 1.0');?></h1>
    </li>
     <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
  </ul>


</nav>
<?php
echo form_open('login');
?>
<table >
    <tbody>
        <tr>
            <td><h5>Username</h5></td>
            <td>
                 <?php
                        if (form_error('username') != "") {
                            echo '<small class="error">' . form_error('username') . '</small>';
                        }
                 ?>
                <input type="text" name="username" value="" />
            </td>
        </tr>
        <tr>
            <td><h5>Password</h5></td>
            <td>
            <?php
                        if (form_error('password') != "") {
                            echo '<small class="error">' . form_error('password') . '</small>';
                        }
                 ?>
                <input type="password" name="password" value="" />
            </td>
        </tr>
        
        <tr>
            <td><h5>Warehouse number</h5></td>
            <td>
                <?php
                     if (form_error('warehousenumber') != "") {
                            echo '<small class="error">' . form_error('warehousenumber') . '</small>';
                        }
                    echo warehouse_dropdown($warehouselist, 'warehousenumber');

                    ?>

            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Login" class="button"/></td>

        </tr>
    </tbody>
</table>
   <script src="<?php echo base_url().'assets/foundation/js/vendor/jquery.js';  ?>"></script>
    <script src="<?php echo base_url().'assets/foundation/js/foundation.min.js'; ?>"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
