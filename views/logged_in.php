<!-- if you need user information, just put them into the $_SESSION variable and output them here -->
<!-- because people were asking: "index.php?logout" is just my simplified form of "index.php?logout=true" -->
<?php
session_start();
include("log_panel.php");
?>



<form class="panel" id="new_name" method="post" action="name.php" name="new_name">
<input class="input" id="option" type="submit" name="new" value="New Calcolation"/>
</form>
<form>
<input class="input" id="option" type="submit" name="old" value="Choose Calcolation" onclick=""/>
</form>
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
	
</script>

	<?php
	$calcadder = new Add_Calcolation(); //Crate table calcolations!!!!!!!1
	?>
	
