<?php
session_start();
if ($calcolation->status == 1) {
    $files = $calcolation->loadFile();
    $data  = fread($files[1], $files[0]);
}
?>
<script>
function Cleaner() {
    this.Valid = "<?php echo $_SESSION['clean']; ?>";
    this.Clean = function () {
         var ArrayOfIds = ["HowTo", "Tips", "MainObject", "calcolation_name", "checkmark", "History"];
         if(this.Valid == true) {
              for (var Index in ArrayOfIds) {
                  var Child = document.getElementById(ArrayOfIds[Index]);
                  Child.parentNode.removeChild(Child);
              }
         }
    }
}
InstanceOfCleaner = new Cleaner();
</script>
<html>
    <head>
        <title>
        </title>
    </head>
    <body onload="InstanceOfCleaner.Clean()">
        <?php
require("linker.php");
require("calcolator_panels/how_to_use_panel.php");
require("calcolator_panels/user.php");
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
