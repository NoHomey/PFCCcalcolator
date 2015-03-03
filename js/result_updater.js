function ResultUpdater() {
    this.UpdateResult = function () {
        var ArrayOfIds = ["outP", "outF", "outC", "outCal"];
        var ArrayOfMassages = ["Total Protein:	", "Total Fat:	", "Total Carbs:	", "Total Calories:	"];
        var ArrayOfValues = ["Protein", "Fat", "Carbs", "Calories"];
        for (var Index in ArrayOfIds) {
            document.getElementById(ArrayOfIds[Index]).innerHTML = ArrayOfMassages[Index] + InstanceOfIngredients[ArrayOfValues[Index]];
        }
    }
}
