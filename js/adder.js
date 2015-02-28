function Adder() {
    this.InstanceOfKeyGeter = new KeyGeter();
    this.InstaneOfQuantetyReturner = new QuantetyReturner();
    this.InstanceOfResultUpdater = new ResultUpdater();
    this.InstanceOfHistoryKeeper = new HistoryKeeper();
    this.AddCurrentSelect = function () {
        var Key = this.InstanceOfKeyGeter.GetKey();
        var Quantety = this.InstaneOfQuantetyReturner.ReturnQuantety();
        Protein += Quantety * (DataBase[Key].Protein / 100);
        Fat += Quantety * (DataBase[Key].Fat / 100);
        Carbs += Quantety * (DataBase[Key].Carbs / 100);
        Calories += Quantety * (DataBase[Key].Cals / 100);
        this.InstanceOfResultUpdater.UpdateResult();
        this.InstanceOfHistoryKeeper.AddToHistory();
    }
}
