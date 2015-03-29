<?php
session_start();
?>
<html>

<head>
    <?php include("linker.php");?>
</head>

<body>
	<form id="user" class="Out">
			<span class="User"><?php echo $_SESSION['user_name']; ?></span>
			<a id="logout" class="Remove" href="index.php?logout">Logout</a>
	</form>
	<div id="MainObject" class="Holder">
	    	<div id="OutPut" class="Out">
			<strong id="outP">#1 Choose Metrics, refresh the page if you want to switch Metrics!</strong>
			<br>
			<strong id="outF">#2 Choose Type, SubType.</strong>
			<br>
			<strong id="outC">#3 Is it Cooked or Raw?</strong>
			<br>
			<strong id="outCal">#4 Insert Quantity and press + and the food will appear under the result window. Repeat steps 2 and 3 as many times as you want. As long as you have added foods you can change their Quantity with the green button marked with ? next to the food or Remove them with the red button marked with - . Warning!!! If you want to switch to other Metric Refresh the page, choosing one will switch in Calcolator Mode!</strong>
			<br>
		 </div>
	    <form onkeypress="return InstanceOfAdderReferencer.ReferenceToAdder(event)">
	    <select id="Select5" class="Select" onchange="InstanceOfResultUpdater.UpdateResult();">
	            <option disabled selected>Choose Metric</option>
		    <option>Gram(g)</option>
		    <option>Kilogram(kg)</option>
		    <option>Pound(lb)</option>
		    <option>Ounce(oz)</option>
		</select>
		<select id="Select1" class="Select" onchange="InstanceOfSelect2Options.DisplayAllSelect2Options()">
		    <option disabled selected>Type</option>
		    <option>Fruit</option>
		    <option>Vegetable</option>
		    <option>Egg</option>
		    <option>Milk</option>
		</select>
		<select id="Select2" class="Select">
		    <option disabled selected>SubType</option>
		</select>
		<select id="Select3" class="Select">
		    <option disabled selected>Cooked?</option>
		    <option>Raw</option>
		    <option>Fried</option>
		    <option>Boiled</option>
		    <option>Baked</option>
		</select>
		<input id="Select4" class="Select" type="number" min="1" value="0"/>
		<input id="Operator" class="Plus" type="button" onclick="return InstanceOfAdderReferencer.ReferenceToAdder(event)" value="+"/>
		<br></br>
		<input id="InterfaceExpander" class="Select" type="button" onclick="InstanceOfExpander.Expand()" value="List Options"/>
	    </form >
	   </div>
	    <div id="calcolation_name" class="Out">Calcolation name  : <?php echo $_SESSION['file_name']; ?></div>
	    <form id="History" method="post" name="file_content">
	    	<input type="submit" name="file_save" value="Save current state of the Calcolation" class="Update">
	    	<input type="submit" name="file_delete" value="Delete this Calcolation" class="Remove">
	    	<br></br>
	    </form>
</body>

</html>
