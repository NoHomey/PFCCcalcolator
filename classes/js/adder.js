function Adder() {
    this.InstanceOfKeysGeter = new KeysGeter();
    this.InstaneOfQuantityReturner = new QuantityReturner();
    this.InstanceOfHistoryKeeper = new HistoryKeeper();
    this.AddCurrentSelect = function (Remove) {
        var Keys = this.InstanceOfKeysGeter.GetKeys();
        var Quantity = this.InstaneOfQuantityReturner.ReturnQuantity();
        if (Remove === true) {
            Quantity = -Quantity;
        }
        InstanceOfIngredients.Protein += (Quantity * InstanceOfResultUpdater.Multiplier)  * (Data[Keys[0]][Keys[1]][Keys[2]].Protein / 100);
        InstanceOfIngredients.Fat += (Quantity * InstanceOfResultUpdater.Multiplier) * (Data[Keys[0]][Keys[1]][Keys[2]].Fat / 100);
        InstanceOfIngredients.Carbs += (Quantity * InstanceOfResultUpdater.Multiplier) * (Data[Keys[0]][Keys[1]][Keys[2]].Carbs / 100);
        InstanceOfIngredients.Calories += (Quantity * InstanceOfResultUpdater.Multiplier) * (Data[Keys[0]][Keys[1]][Keys[2]].Cals / 100);
        InstanceOfResultUpdater.UpdateResult();
        document.getElementById("checkmark").style.display = "none";
        if (Remove === false) {
            this.InstanceOfHistoryKeeper.AddToHistory();
        }
    }
}
