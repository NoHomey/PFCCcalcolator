function HistoryOverwriter(WhichOne) {
	this.HistoryElement = document.getElementById("Number" + WhichOne);
	this.ArrayOfValues = this.HistoryElement.value.split(' ');
	this.Update = function() {
		for (var index in this.ArrayOfValues) {
			InstanceOfLocker.TurnOn();
			var SelectNumber = ++index;
			var Id = "Select" + (SelectNumber).toString();
			var Select = document.getElementById(Id);
			var value = this.ArrayOfValues[--index];
			var newOption = document.createElement("option");
			newOption.disabled = newOption.selected = true;
			newOption.text = value;
			Select.add(newOption);
		}
	}
}
		
	
