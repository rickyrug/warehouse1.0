<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Warehouse 1.0</title>
        <link rel="stylesheet" href="<?php echo base_url() . 'assets/foundation/css/foundation.css'; ?>" />
        <script src="<?php echo base_url() . 'assets/foundation/js/vendor/modernizr.js'; ?>"></script>
        <script src="<?php echo base_url() . 'assets/js/jquery-1.11.2.min.js'; ?>"></script>
        <script src="<?php echo base_url() . 'assets/js/jquery-ui.js'; ?>"></script>   
    </head>
    <body>
        <?php logged_in($this->session); ?>
        <nav class="top-bar" data-topbar role="navigation">
            <ul class="title-area">
                <li class="name">
                    <h1><?php echo anchor('MainController', 'Warehouse 1.0'); ?></h1>
                </li>
                <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
                <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
            </ul>

            <section class="top-bar-section">
                <!-- Right Nav Section -->
                <ul class="right">
                    <li class="has-dropdown">
                        <a href="#">Profile</a>
                        <ul class="dropdown">
                            <li><a href="#">User:<?php echo get_username($this->session); ?></a></li>
                            <li><a href="#">Warehouse:<?php echo get_warehousenumber($this->session); ?></a></li>
                            <li><?php echo anchor('Login/logoff', 'Exit'); ?></a></li>
                        </ul>
                    </li>

                </ul>

                <!-- Left Nav Section -->
                <ul class="left">
                    <li class="has-dropdown">
                        <a href="#">Operation</a>
                        <ul class="dropdown">
                            <li><?php echo anchor('inbound/InboundDelivery', 'Inbound Delivery'); ?></li>

                        </ul>
                    </li>
                    <li class="has-dropdown">
                        <a href="#">Configuration</a>
                        <ul class="dropdown">
                            <li class="has-dropdown">
                                <a href="#">Warehouse Structure</a>
                                <ul class="dropdown">
                                    <li><?php echo anchor('configuration/warehouse', 'Warehouse'); ?></li>
                                    <li><?php echo anchor('configuration/storagetype', 'Storage Type'); ?></li>
                                    <li><?php echo anchor('configuration/storagesection', 'Storage Section'); ?></li>
                                    <li><?php echo anchor('configuration/storagebin', 'Storage Bin'); ?></li>
                                </ul>
                            </li>
                            <li class="has-dropdown">
                                <a href="#">Product configuration</a>
                                <ul class="dropdown">   
                                    <li><?php echo anchor('configuration/type', 'Tipo'); ?></li>
                                    <li><?php echo anchor('configuration/properties', 'Propiedades'); ?></li>
                                    <li><?php echo anchor('configuration/characteristic', 'Caracteristicas'); ?></li>
                                    <li><?php echo anchor('configuration/uom', 'Unidad de medida'); ?></li>
                                    <li><?php echo anchor('configuration/product', 'Product'); ?></li>
                                </ul>
                            </li>
                            <li><?php echo anchor('configuration/workcenter', 'Workcenter'); ?></li>
                        </ul>
                    </li>
                </ul>
            </section>
        </nav>