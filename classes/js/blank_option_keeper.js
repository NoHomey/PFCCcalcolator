function BlankOptionKeeper() {
    this.KeepBlankOption = function (Id) {
        var Type = "option";
        var Text = "";
        switch (Id) {
        case "Select1":
            Text = "Choose Type";
            break;
        case "Select2":
            Text = "Choose SubType";
            break;
        case "Select3":
            Text = "Is it Cooked?";
            break;
        }
        var NewOption = document.createElement(Type);
        var AtacheToElement = document.getElementById(Id);
        NewOption.disabled = NewOption.selected = true;
        NewOption.innerHTML = Text;
        AtacheToElement.add(NewOption);
    }
}

