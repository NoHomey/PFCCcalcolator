function HistoryOverwriter() {
	this.Update = function() {
		var HistoryElement = document.getElementById("Number" + WhichOne);
		var ArrayOfValues = HistoryElement.value.split(' ');
		for (var index in ArrayOfValues) {
			var SelectNumber = ++index;
			var Id = "Select" + (SelectNumber).toString();
			var Select = document.getElementById(Id);
			var value = ArrayOfValues[--index];
			if (Id !== "Select4") {
				if (!InstanceOfOptionExister.OptionExist(Select, value)) {
					var newOption = document.createElement("option");
					newOption.disabled = newOption.selected = true;
					newOption.text = value;
					Select.add(newOption);
				}
			}
			else {
				Select.value = value;
			}
		}
		InstanceOfLocker.TurnOn();
	}
}
		
	
