function HistoryKeeper() {
    this.Index = 0;
    this.InstanceOfHistoryIntializer = new HistoryIntializer();
    this.InstanceOfHistoryLastElement = new HistoryLastElement();
    this.InstanceOfHistoryElement = new HistoryElement();
    this.AddToHistory = function () {
        var Difference = "Number";
        var UpdateButton = "?";
        var RemoveButton = "-";
        var UpdateMethod = "InstanceOfHistoryOverwriter.Update(this.id)";
        var RemoveMethod = "InstanceOfHistoryRemover.Remove(this.id)";
        var Result = this.InstanceOfHistoryIntializer.HistoryIntialize();
        this.InstanceOfHistoryElement.Create(Result, (Difference + ++this.Index), "Info", false);
        this.InstanceOfHistoryElement.Create(UpdateButton, this.Index, "Update", UpdateMethod);
        this.InstanceOfHistoryElement.Create(RemoveButton, this.Index, "Remove", RemoveMethod);
        this.InstanceOfHistoryLastElement.ReAddLastElement(this.Index + 1);
    }
}
