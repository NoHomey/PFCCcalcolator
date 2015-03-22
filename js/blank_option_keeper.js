function BlankOptionKeeper() {
    this.KeepBlankOption = function () {
        var Type = "option";
        var Id = "Select2";
        var Text = "SubType";
        var NewOption = document.createElement(Type);
        var AtacheToElement = document.getElementById(Id);
        NewOption.disabled = NewOption.selected = true;
        NewOption.innerHTML = Text;
        AtacheToElement.add(NewOption);
    }
}
