function ElementRemover() {
    this.RemoveElement = function (WhichOne) {
        var Difference = "Number";
        var HistoryElement = document.getElementById(Difference + WhichOne);
        if (HistoryElement !== null) {
            HistoryElement.parentNode.removeChild(HistoryElement);
            for (var Repeat = 0; Repeat < 2; Repeat++) {
                HistoryElement = document.getElementById(WhichOne);
                HistoryElement.parentNode.removeChild(HistoryElement);
            }
        }
    }
}
