function ElementRemover() {
	this.Remove = function(WhichOne) {
		var HistoryElement = document.getElementById("Number" + WhichOne);
		if (HistoryElement !== null) {
			HistoryElement.parentNode.removeChild(HistoryElement);
			HistoryElement = document.getElementById(WhichOne);
			HistoryElement.parentNode.removeChild(HistoryElement);
			HistoryElement = document.getElementById(WhichOne);
			HistoryElement.parentNode.removeChild(HistoryElement);
		}
	}
}
