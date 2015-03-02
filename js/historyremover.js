function HistoryRemover() {
	this.Remove = function(WhichOne) {
		OldQuantity = document.getElementById("Number" + WhichOne).value.split(' ')[3];
		InstanceOfElementRemover.Remove(WhichOne);
		InstanceOfAdderReferencer.ReferenceToAdder(-1);
	}
}
