<!-- if you need user information, just put them into the $_SESSION variable and output them here -->
<!-- because people were asking: "index.php?logout" is just my simplified form of "index.php?logout=true" -->
<?php

session_start();
?>
<link rel="stylesheet" type="text/css" href="css/login.css">
<div id="This">
<form class="panel"
<span><?php echo $_SESSION['user_name']; ?></span>
<a class="go_back" href="index.php?logout">Logout</a>
</form>

<form class="panel" id="choose" method="post" action="index.php" name="chooser">
<input class="input" id="option" type="button" name="new" value="New Calcolation" onclick="new_cal()"/>
<input class="input" id="option" type="submit" name="old" value="Choose Calcolation" onclick=""/>
</form>
</div>
<script>
	function remove() {
		for(var i = 0;i < 2;i++) {
			var element = document.getElementById("option");
			element.parentNode.removeChild(element);
		}
	}
	
	function back() {
		remove();
		var parent = document.getElementById("choose");
		parent.innerHTML = null;
		var tag = "input";
		var Element = document.createElement(tag);
		Element.id = "option";
		Element.setAttribute("class", "input");
		Element.name = "new";
		Element.type = "button";
		Element.value = "New Calcolation";
		Element.setAttribute("onclick", "new_cal()");
		parent.appendChild(Element);
		var Element = document.createElement(tag);
		Element.id = "option";
		Element.setAttribute("class", "input");
		Element.name = "old";
		Element.type = "submit";
		Element.value = "Choose Calcolation";
		Element.setAttribute("onclick", "new_cal()");
		parent.appendChild(Element);
		var Element = document.getElementById("back_to");
		Element.parentNode.removeChild(Element);
	}		
	
	function add_back () {
		var parent = document.getElementById("This");
		var tag = "input";
		var Element = document.createElement(tag);
		Element.id = "back_to";
		Element.setAttribute("class", "go_back");
		Element.type = "button";
		Element.value = "Back";
		Element.setAttribute("onclick", "back()");
		parent.appendChild(Element);
	}
	
	function new_cal() {
		
		remove();
		var parent = document.getElementById("choose");
		parent.innerHTML = "Enter name of the new Calcolation";
		var tag = "input";
		var Element = document.createElement(tag);
		Element.id = "option";
		Element.setAttribute("class", "input");
		Element.name = "fileName";
		Element.type = "text";
		parent.appendChild(Element);
		var Element = document.createElement(tag);
		Element.id = "option";
		Element.setAttribute("class", "action");
		Element.type = "submit";
		Element.name = "save";
		Element.value = "Save";
		parent.appendChild(Element);
		parent.action = "calcolator.php";
		add_back();
		
	}
</script>

	
	
