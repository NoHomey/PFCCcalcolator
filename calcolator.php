<?php
session_start();
?>
<html>

<head>
     <script src="js/ingredients.js"></script>
     <script src="js/history_element.js"></script>
     <script src="js/element_remover.js"></script>
     <script src="js/history_remover.js"></script>
     <script src="js/operator_switcher.js"></script>
     <script src="js/option_exister.js"></script>
     <script src="js/history_overwriter.js"></script>
     <script src="js/history_initializer.js"></script>
     <script src="js/history_keeper.js"></script>
     <script src="js/adder_referencer.js"></script>
     <script src="js/result_updater.js"></script>
     <script src="js/quantity_returner.js"></script>
     <script src="js/key_geter.js"></script>
     <script src="js/blank_option_keeper.js"></script>
     <script src="js/clear_select2_options.js"></script>
     <script src="js/lock_swicher.js"></script>
     <script src="js/current_state_of_expander.js"></script>
     <script src="js/expander.js"></script>
     <script src="js/smart_choice.js"></script>
     <script src ="js/data_base.js"></script>
     <script src="js/locker.js"></script>
     <script src="js/select2_options.js"></script>
     <script src="js/adder.js"></script>
     <script src="js/main.js"></script>
     <link rel="stylesheet" type="text/css" href="css/main.css">
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
	</div>
	    </form >
	    <br></br>
	    <form id="History">
	    </form>
</body>

</html>
