<?php
session_start();
if ($calcolation->status == 1) {
    $files = $calcolation->loadFile();
    $data  = fread($files[1], $files[0]);
}
?>
<html>
    <head>
        <title>
        </title>
    </head>
    <body onload="">
        <?php
require("linker.php");
require("calcolator_panels/how_to_use_panel.php");
?>
        <div class="Holder" id="MainObject">
             <?php
require("calcolator_panels/calcolator_panel_1.php");
?>
             <?php
require("calcolator_panels/calcolator_panel_2.php");
?>
        </div>
        <?php
require("calcolator_panels/calcolator_panel_3.php");
?>
        <?php
require("calcolator_panels/calcolator_panel_4.php");
?>
        <?php
require("calcolator_panels/calcolator_panel_5.php");
?>
    </body>
</html>
