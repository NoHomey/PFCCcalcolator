function Adder() {
    this.getKey = function () {
        var element = document.getElementById("Select1");
        var result = element.options[element.selectedIndex].text;
        var element = document.getElementById("Select2");
        result = result + element.options[element.selectedIndex].text;
        var element = document.getElementById("Select3");
        result = result + element.options[element.selectedIndex].text;
        return result;
    }
    this.printResult = function () {
        var proteinMesage = "Total Protein:	";
        var fatMesage = "Total Fat:	";
        var caloriesMesage = "Total Carbs:	";
        var carbsMesage = "Total Calories:	";
        document.getElementById("outP").innerHTML = proteinMesage + protn;
        document.getElementById("outF").innerHTML = fatMesage + fat;
        document.getElementById("outC").innerHTML = caloriesMesage + cals;
        document.getElementById("outCal").innerHTML = carbsMesage + carbs;
    }
    this.returnQuantety = function () {
        var quantety = document.getElementById("Select4").value;
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
        quantety = quantety * ((1 * kg) * (1 * oz) * (1 * lb));
        return quantety;
    }
    this.addCurrentSelect = function () {
        var key = this.getKey();
        var quantety = this.returnQuantety();
        protn += quantety * (DataBase[key].Protein / 100);
        fat += quantety * (DataBase[key].Fat / 100);
        carbs += quantety * (DataBase[key].Carbs / 100);
        cals += quantety * (DataBase[key].Cals / 100);
        this.printResult();
    }
    this.refToAdder = function (event) {
        if (event.keyCode === 13) {
            addToStack();
            return false;
        }
    }
}
