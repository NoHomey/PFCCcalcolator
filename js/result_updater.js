function ResultUpdater() {
    this.Multiplier = 1;
    this.UpdateResult = function () {
        var ArrayOfIds = ["outP", "outF", "outC", "outCal"];
        var ArrayOfMassages = ["Total Protein:	", "Total Fat:	", "Total Carbs:	", "Total Calories:	"];
        var ArrayOfValues = ["Protein", "Fat", "Carbs", "Calories"];
        var Id = "Select5";
        var Element = document.getElementById(Id);
        Element.disabled = true;
        var CurrentValue = Element.options[Element.selectedIndex].text;
        switch (CurrentValue) {
        case "Kilogram(kg)":
            this.Multiplier = 1000.0;
            break;
        case "Pound(lb)":
            this.Multiplier == 0.0022046;
            break;
        case "Ounce(oz)":
            this.Multiplier = 0.035274;
            break;
        }
        for (var Index in ArrayOfIds) {
            document.getElementById(ArrayOfIds[Index]).innerHTML = ArrayOfMassages[Index] + InstanceOfIngredients[ArrayOfValues[Index]].toFixed(4) + ' ' + CurrentValue;
        }
    }
}
