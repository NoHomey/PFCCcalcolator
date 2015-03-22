<!-- if you need user information, just put them into the $_SESSION variable and output them here -->
<!-- because people were asking: "index.php?logout" is just my simplified form of "index.php?logout=true" -->
<?php

session_start();
?>
<link rel="stylesheet" type="text/css" href="css/login.css">
<form>
<span><?php echo $_SESSION['user_name']; ?></span>
<a href="index.php?logout">Logout</a>
</form>

<form id="choose" method="post" action="index.php" name="chooser">
<input id="option" type="button" name="new" value="New Calcolation" onclick="new_cal()"/>
<input id="option" type="submit" name="choose" value="Choose Calcolation" onclick=""/>
</form>
<script>
	function remove() {
		for(var i = 0;i < 2;i++) {
			var element = document.getElementById("option");
			element.parentNode.removeChild(element);
		}
	}
	
	function new_cal() {
		
		remove();
		var parent = document.getElementById("choose");
		parent.innerHTML = "Enter name of the new Calcolation";
		var tag = "input";
		var Element = document.createElement(tag);
		Element.id = "choose";
		Element.name = "fileName";
		Element.type = "text";
		parent.appendChild(Element);
		var Element = document.createElement(tag);
		Element.id = "save";
		Element.setAttribute("class", "action");
		Element.type = "submit";
		Element.name = "save";
		Element.value = "Save";
		parent.appendChild(Element);
		parent.action = "calcolator.php";
	}
</script>

	
	
