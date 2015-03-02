function OperatorSwitcher() {
	this.SwitchIt = function (value) {
		Element = document.getElementById("Operator");
		Element.value = value;
		switch (value) {
			case "+" : {
				Element.setAttribute("onclick", "return InstanceOfAdderReferencer.ReferenceToAdder(event)")
			}
			break;
			case "?" : {
				//Element.setAttribute("onclick", "return InstanceOfUpdaterReferencer.ReferenceToUpdater(event)")
			}
			break;
		}
	}
}
