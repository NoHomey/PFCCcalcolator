function Select2Options() {
    this.InstanceOfClearSelect2Options = new ClearSelect2Options();
    this.DisplayAllSelect2Options = function () {
        var newOption;;
        var atacheToElement = document.getElementById("Select2");
        var element = document.getElementById("Select1");
        var key = element.options[element.selectedIndex].text;
        this.InstanceOfClearSelect2Options.ClearAllSelect2Options();
        for (var index in SmartChoice[key]) {
            newOption = document.createElement("option");
            newOption.text = SmartChoice[key][index];
            atacheToElement.add(newOption);
        }
    }
}
