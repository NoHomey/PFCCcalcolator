function Adder() {
    this.InstanceOfKeyGeter = new KeyGeter();
    this.InstaneOfQuantityReturner = new QuantityReturner();
    this.InstanceOfResultUpdater = new ResultUpdater();
    this.InstanceOfHistoryKeeper = new HistoryKeeper();
    this.AddCurrentSelect = function (Remove) {
        var Key = this.InstanceOfKeyGeter.GetKey();
        var Quantity = this.InstaneOfQuantityReturner.ReturnQuantity();
        Protein -= Quantity * (DataBase[Key].Protein / 100);
        Fat -= Quantity * (DataBase[Key].Fat / 100);
        Carbs -= Quantity * (DataBase[Key].Carbs / 100);
        Calories -= Quantity * (DataBase[Key].Cals / 100);
        this.InstanceOfResultUpdater.UpdateResult();
        if (Remove === false) {
            this.InstanceOfHistoryKeeper.AddToHistory();
        }
    }
}
