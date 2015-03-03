function ResultUpdater() {
    this.UpdateResult = function() {
        var ProteinMessage = "Total Protein:	";
        var FatMessage = "Total Fat:	";
        var CaloriesMessage = "Total Carbs:	";
        var CarbsMessage = "Total Calories:	";
        document.getElementById("outP").innerHTML = ProteinMessage + Protein;
        document.getElementById("outF").innerHTML = FatMessage + Fat;
        document.getElementById("outC").innerHTML = CaloriesMessage + Calories;
        document.getElementById("outCal").innerHTML = CarbsMessage + Carbs;
    }
}
