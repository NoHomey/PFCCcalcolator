function HistoryKeeper() {
    this.Index = 0;
    this.InstanceOfHistoryIntializer = new HistoryIntializer()
    this.AddToHistory = function () {
        new HistoryElement(this.InstanceOfHistoryIntializer.HistoryIntialize(), "Number" + ++this.Index, true, false);
        new HistoryElement("?", this.Index, false, "InstanceOfHistoryOverwriter.Update(this.id)");
        new HistoryElement("-", this.Index, false, "InstanceOfHistoryRemover.Remove(this.id)");
    }
}
