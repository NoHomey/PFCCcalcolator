function HistoryRemover() {
    this.Remove = function (WhichOne) {
        var Difference = "Number";
        OldQuantity = document.getElementById(Difference + WhichOne).value.split(' ')[3];
        InstanceOfElementRemover.RemoveElement(WhichOne);
        InstanceOfAdderReferencer.ReferenceToAdder(-1);
    }
}
