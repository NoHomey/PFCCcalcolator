protn = 0;
fat = 0;
carbs = 0;
cals = 0;
SmartChoice = {
    Fruit: ["Apple", "Orange", "Bannana"],
    Vegetable: ["Potato", "Tomato", "Onion"],
    Egg: ["Chicken", "Turkey", "Duck"],
    Milk: ["Cow", "Goat"]
};
DataBase = {
    FruitAppleRaw: {
        Protein: 37.2,
        Fat: 4.3,
        Carbs: 29.3,
        Cals: 100
    },
    EggChickenFried: {
        Protein: 7.2,
        Fat: 42.3,
        Carbs: 19.3,
        Cals: 100
    },
    MilkCowBoiled: {
        Protein: 7.2,
        Fat: 7.3,
        Carbs: 9.3,
        Cals: 100
    }
};

function LockAll(a) {
    document.getElementById("Select1").disabled = a;
    document.getElementById("Select2").disabled = a;
    document.getElementById("Select3").disabled = a;
}

function ExpandAll(a) {
    document.getElementById("Select1").size = 1;
    document.getElementById("Select2").size = 1;
    document.getElementById("Select3").size = 1;
    if (a === "UnList Options") {
        document.getElementById("opt").value = "UnList Options";
        document.getElementById("Select1").size = document.getElementById("Select1").length;
        document.getElementById("Select2").size = document.getElementById("Select2").length;
        document.getElementById("Select3").size = document.getElementById("Select3").length;
    } else {
        document.getElementById("opt").value = "List Options";
    }
}

function onEachClick() {
    if (document.getElementById("opt").value === "List Options") {
        ExpandAll("UnList Options");
    } else {
        ExpandAll("List Options");
    }
}

function getKey() {
    var a = "";
    var b = document.getElementById("Select1");
    a = b.options[b.selectedIndex].text;
    var b = document.getElementById("Select2");
    a = a + b.options[b.selectedIndex].text;
    var b = document.getElementById("Select3");
    a = a + b.options[b.selectedIndex].text;
    return a;
}

function printResult() {
    var a = "Total Protein:	";
    var b = "Total Fat:	";
    var d = "Total Carbs:	";
    var c = "Total Calories:	";
    document.getElementById("outP").innerHTML = a + protn;
    document.getElementById("outF").innerHTML = b + fat;
    document.getElementById("outC").innerHTML = d + carbs;
    document.getElementById("outCal").innerHTML = c + cals;
}

function addToStack() {
    var Qua = document.getElementById("Select4").value;
    var kg = 1;
    var oz = 1;
    var lb = 1;
    var e = document.getElementById("Select5");
    if (e.options[e.selectedIndex].text === "Kilogram (kg)") {kg = 1000;}
    if (e.options[e.selectedIndex].text === "Pound (lb)") {lb = 0.0022046;}
    if (e.options[e.selectedIndex].text === "Ounce (oz)") {oz = 0.035274;}
    Qua = Qua * ((1 * kg) * (1 * oz) * (1 * lb)); 
    var a = getKey();
    protn += Qua * (DataBase[a].Protein / 100);
    fat += Qua * (DataBase[a].Fat / 100);
    carbs += Qua * (DataBase[a].Carbs / 100);
    cals += Qua * (DataBase[a].Cals / 100);
    printResult();
}

function refToAddToStack(e) {
    if (e.keyCode === 13) {
        addToStack();
        return false;
    }
}

function clearAllOpt() {
    var a = document.getElementById("Select2");
    var b;
    for (b in a.options) {
        a.options[b] = null;
    }
}

function dysplayChoices() {
    var d;
    var a = document.getElementById("Select2");
    var e = document.getElementById("Select1");
    var c = e.options[e.selectedIndex].text;
    clearAllOpt();
    d = document.createElement("option");
    d.disabled = true;
    d.selected = true;
    a.add(d);
    for (var b in SmartChoice[c]) {
        d = document.createElement("option");
        d.text = SmartChoice[c][b];
        a.add(d);
    }
};