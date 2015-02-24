function HistoryKeeper() {
	this.Keeper = [];
	this.AddToHistory = function() {
		var element = document.getElementById("Select1");
		var result = element.options[element.selectedIndex].text;
		element = document.getElementById("Select2");
		result = result + ' ' + element.options[element.selectedIndex].text;
		element = document.getElementById("Select3");
		result =  result + ' ' + element.options[element.selectedIndex].text;			
		var NewElement = document.createElement("input");
		NewElement.value = result;
		NewElement.type = "button"
		NewElement.disabled = true;
		var To = document.getElementById("test");
		To.appendChild(NewElement);
		var UpdateButton = document.createElement("input");
		UpdateButton.type = "button";
		UpdateButton.value = "?"
		To.appendChild(UpdateButton);
		var RemoveButton = document.createElement("input");
		RemoveButton.type = "button";
		RemoveButton.value = "-"
		To.appendChild(RemoveButton);
	}
	
	
}
