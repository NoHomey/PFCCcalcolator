function HistoryLastElement() {
    this.ReAddLastElement = function (Position) {
        var LastElement = document.getElementsByClassName("LastElement");
        var Id = "Number" + Position;
        LastElement[0].setAttribute("id", Id);
    }
}

