function HistoryRemover() {
	this.Remove = function() {
		var HistoryElement = document.getElementById("Number" + WhichOne);
		var ArrayOfValues = HistoryElement.value.split(' ');
		OldQuantity = ArrayOfValues[3];
		HistoryElement.parentNode.removeChild(HistoryElement);
		HistoryElement = document.getElementById(WhichOne);
		HistoryElement.parentNode.removeChild(HistoryElement);
		HistoryElement = document.getElementById(WhichOne);
		HistoryElement.parentNode.removeChild(HistoryElement);
		InstanceOfAdderReferencer.ReferenceToAdder(-1);
	}
}
