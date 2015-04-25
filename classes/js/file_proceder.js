function FileProceder () {
	this.Proced = function (Foods) {
		var ArrayOfIds = ["Select1", "Select2", "Select3", "Select4", "Select5"];
		for (var Index in Foods) {
			var Values = Foods[Index].split(' ');
        		for (var Which in ArrayOfIds) {
        			if (Which < 3) {
					InstanceOfSelectOptions.DisplayAllSelectOptions(ArrayOfIds[Which]);
				}
				var Select = document.getElementById(ArrayOfIds[Which]);
				Select.value = Values[Which];
			}
			InstanceOfAdderReferencer.ReferenceToAdder(0);
		}
		var check = document.getElementById("Select5");
		if (check.value !== "Choose Metric") {
			document.getElementById("Select5").disabled = true;
		}
	}
}
