function LockSwitcher() { 
    this.Switcher = function (IsLock) {
        document.getElementById("Select1").disabled =  document.getElementById("Select2").disabled =  document.getElementById("Select3").disabled =  document.getElementById("Select5").disabled = IsLock;
        var HistoryPanel = document.getElementById("test").elements;
        for(var index in HistoryPanel) {
        	HistoryPanel[index].disabled = IsLock;
        }
        	
    }
}
