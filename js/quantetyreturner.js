function QuantetyReturner() {
    this.ReturnQuantety = function() {
        var Quantety = document.getElementById("Select4").value;
        var kg, oz, lb;
        kg = oz = lb = 1;
        var element = document.getElementById("Select5")
        switch (element.options[element.selectedIndex].text) {
        case "Kilogram (kg)":
            kg = 1000;
            break;
        case "Pound (lb)":
            lb = 0.0022046;
            break;
        case "Ounce (oz)":
            oz = 0.035274;
            break;
        }
        Quantety = Quantety * ((1 * kg) * (1 * oz) * (1 * lb));
        return Quantety;
    }
}
