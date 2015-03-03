function ElementRemover() {
    this.Remove = function (WhichOne) {
        var HistoryElement = document.getElementById("Number" + WhichOne);
        if (HistoryElement !== null) {
            HistoryElement.parentNode.removeChild(HistoryElement);
            for (var Repeat = 0; Repeat < 2; Repeat++) {
                HistoryElement = document.getElementById(WhichOne);
                HistoryElement.parentNode.removeChild(HistoryElement);
            }
        }
    }
}
