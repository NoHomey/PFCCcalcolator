function HistoryKeeper() {
    this.Index = 0;
    this.InstanceOfHistoryIntializer = new HistoryIntializer()
    this.AddToHistory = function () {
        var Difference = "Number";
        var UpdateButton = "?";
        var RemoveButton = "-";
        var UpdateMethod = "InstanceOfHistoryOverwriter.Update(this.id)";
        var RemoveMethod = "InstanceOfHistoryRemover.Remove(this.id)";
        var Result = this.InstanceOfHistoryIntializer.HistoryIntialize();
        new HistoryElement(Result, (Difference + ++this.Index), true, false);
        new HistoryElement(UpdateButton, this.Index, false, UpdateMethod);
        new HistoryElement(RemoveButton, this.Index, false, RemoveMethod);
    }
}
