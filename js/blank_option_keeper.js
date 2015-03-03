function BlankOptionKeeper() {
    this.KeepBlankOption = function () {
        var NewOption = document.createElement("option");
        var AtacheToElement = document.getElementById("Select2");
        NewOption.disabled = NewOption.selected = true;
        AtacheToElement.add(NewOption);
    }
}
