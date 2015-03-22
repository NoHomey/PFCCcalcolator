function LockSwitcher() {
    this.Switcher = function (IsLock) {
        var ArrayOfIds = ["Select1", "Select2", "Select3", "Select5"];
        var Id = "History"
        for (var Index in ArrayOfIds) {
            document.getElementById(ArrayOfIds[Index]).disabled = IsLock;
        }
        var HistoryPanel = document.getElementById(Id).elements;
        for (var Index in HistoryPanel) {
            HistoryPanel[Index].disabled = IsLock;
        }
    }
}
