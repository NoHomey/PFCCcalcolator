<div class="Holder" id="Tips">
	First Choose Metric*:
	  <select required class="Select">
        <option disabled selected>
            Choose Metric
        </option>
        <option>
            Gram(g)
        </option>
        <option>
            Kilogram(kg)
        </option>
        <option>
            Pound(lb)
        </option>
        <option>
            Ounce(oz)
        </option>
    </select>.
    <br></br>
   Use:
    <select class="Select">
        	<option disabled selected>
            Choose Type
        </option>
        	<option disabled >
        	Type Options       	
        </option>
       </select> to choose the food's Type.
       <br></br>
	Use:
    <select class="Select">
        	<option disabled selected>
            Choose SubType
        </option>
        	<option disabled >
        	SubType Options       	
        </option>
       </select> to choose the food's SubType.
       <br></br>
       Use:
    <select class="Select">
        	<option disabled selected>
            Is it Cooked?
        </option>
        	<option>Raw</option>
        	<option disabled >
        	Other Options       	
        </option>
       </select> to choose is the food Raw or Cooked.
       <br></br>
       Use: <input class="Select" type="button" value="List Options"> to check All avalible options**. 
       <br></br>
       Use: <input class="Select" id="Select4" min="1" type="number" value="0"> to choose food's quantity.
       <br></br>
       Press: <input class="Plus" id="Operator" type="button" value="+"> to add the currently selected food to the calcolation.
       <br></br>
       Press: <input class="Update" id="Operator" type="button" value="?"> next to the food which you want to Update that food's qunatity.
       <br></br>
       Press: <input class="Remove" id="Operator" type="button" value="-"> next to the food which you want to REMOVE.
       <br></br>
       <input class="Out" value="Calcolation name : <?php echo $_SESSION['file_name']; ?>" disabled> Is the field where you can check the name of the current calcolation.
       <br></br>
       Use:  <input class="Update" type="button" value="Save current state of the Calcolation"> to save the current calcolation state.
       <br></br>
       Use: <input autocomplete="off" class="Remove" type="button" value="Delete this Calcolation"> to remove the current calcolation from your account.
       <br></br> 
       Use: <a class="Remove">Go Back</a> to Go Back.
       <br></br>
       <br></br> 
       Press: <a class="Remove">Logout</a> to Logout.
       <br></br>  
       * ~ The Choice is only for your own comfort and you can't rechoose different metric in calcolation with already chosen one!
        <br></br>
        ** ~ All options displayed are bassed on the foods category bassed on all other chooices you've made. 
         <br></br>
</div>
