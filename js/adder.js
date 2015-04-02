function Adder() {
    this.InstanceOfKeyGeter = new KeyGeter();
    this.InstaneOfQuantityReturner = new QuantityReturner();
    this.InstanceOfHistoryKeeper = new HistoryKeeper();
    this.AddCurrentSelect = function (Remove) {
        var Key = this.InstanceOfKeyGeter.GetKey();
        var Quantity = this.InstaneOfQuantityReturner.ReturnQuantity();
        if (Remove === true) {
            Quantity = -Quantity;
        }
        InstanceOfIngredients.Protein += (Quantity * InstanceOfResultUpdater.Multiplier)  * (DataBase[Key].Protein / 100);
        InstanceOfIngredients.Fat += (Quantity * InstanceOfResultUpdater.Multiplier) * (DataBase[Key].Fat / 100);
        InstanceOfIngredients.Carbs += (Quantity * InstanceOfResultUpdater.Multiplier) * (DataBase[Key].Carbs / 100);
        InstanceOfIngredients.Calories += (Quantity * InstanceOfResultUpdater.Multiplier) * (DataBase[Key].Cals / 100);
        InstanceOfResultUpdater.UpdateResult();
        document.getElementById("checkmark").style.display = "none";
        if (Remove === false) {
            this.InstanceOfHistoryKeeper.AddToHistory();
        }
    }
}
