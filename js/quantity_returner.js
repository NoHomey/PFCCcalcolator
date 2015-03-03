function QuantityReturner() {
    this.ReturnQuantity = function () {
        var Id = "Select4";
        var Quantity = document.getElementById(Id).value;
        var kg, oz, lb;
        Id = "Select5";
        var Element = document.getElementById(Id)
        kg = oz = lb = 1;
        if (Update === 1) {
            Quantity = Quantity - OldQuantity;
            OldQuantity = 0;
            Update = 0;
        }
        switch (Element.options[Element.selectedIndex].text) {
        case "Kilogram(kg)":
            kg = 1000;
            break;
        case "Pound(lb)":
            lb = 0.0022046;
            break;
        case "Ounce(oz)":
            oz = 0.035274;
            break;
        }
        Quantity = Quantity * ((1 * kg) * (1 * oz) * (1 * lb));
        return Quantity;
    }
}
