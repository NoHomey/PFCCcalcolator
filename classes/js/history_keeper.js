function HistoryKeeper() {
    this.Index = 0;
    this.InstanceOfHistoryIntializer = new HistoryIntializer();
    this.InstanceOfHistoryLastElement = new HistoryLastElement();
    this.AddToHistory = function () {
        var Difference = "Number";
        var UpdateButton = "?";
        var RemoveButton = "-";
        var UpdateMethod = "InstanceOfHistoryOverwriter.Update(this.id)";
        var RemoveMethod = "InstanceOfHistoryRemover.Remove(this.id)";
        var Result = this.InstanceOfHistoryIntializer.HistoryIntialize();
        new HistoryElement(Result, (Difference + ++this.Index), "Holder", false);
        new HistoryElement(UpdateButton, this.Index, "Update", UpdateMethod);
        new HistoryElement(RemoveButton, this.Index, "Remove", RemoveMethod);
        this.InstanceOfHistoryLastElement.ReAddLastElement(this.Index + 1);
    }
}
