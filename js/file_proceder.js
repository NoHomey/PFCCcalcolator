function FileProceder () {
	this.Proced = function (Foods) {
		var ArrayOfIds = ["Select1", "Select2", "Select3", "Select4", "Select5"];
		for (var Index in Foods) {
			var Values = Foods[Index].split(' ');
        		for (var Which in ArrayOfIds) {
				var Select = document.getElementById(ArrayOfIds[Which]);
				Select.value = Values[Which];
				if (ArrayOfIds[Which] === "Select1") {
					InstanceOfSelect2Options.DisplayAllSelect2Options()
				}
			}
			InstanceOfAdderReferencer.ReferenceToAdder(0);
		}
		document.getElementById("Select5").disabled = true;
	}
}
