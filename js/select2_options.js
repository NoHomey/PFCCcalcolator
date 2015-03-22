function Select2Options() {
    this.InstanceOfClearSelect2Options = new ClearSelect2Options();
    this.DisplayAllSelect2Options = function () {
        var NewOption;;
        var Type = "option";
        var Id = "Select2";
        var AtacheToElement = document.getElementById(Id);
        Id = "Select1";
        var Element = document.getElementById(Id);
        var Key = Element.options[Element.selectedIndex].text;
        this.InstanceOfClearSelect2Options.ClearAllSelect2Options();
        for (var index in SmartChoice[Key]) {
            NewOption = document.createElement(Type);
            NewOption.text = SmartChoice[Key][index];
            AtacheToElement.add(NewOption);
        }
    }
}
