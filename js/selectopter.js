function SelectOpter() {
    this.clearAllOpt = function () {
        var element = document.getElementById("Select2");
        for (var index in element.options) {
            element.options[index] = null;
        }
    }
    this.displayAllOpt = function () {
        var newOption = document.createElement("option");
        var atacheToElement = document.getElementById("Select2");
        var element = document.getElementById("Select1");
        var key = element.options[element.selectedIndex].text;
        this.clearAllOpt();
        newOption.disabled = newOption.selected = true;
        atacheToElement.add(newOption);
        for (var index in SmartChoice[key]) {
            newOption = document.createElement("option");
            newOption.text = SmartChoice[key][index];
            atacheToElement.add(newOption);
        }
    }
}
