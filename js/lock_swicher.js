function LockSwitcher() { 
    this.Switcher = function (IsLock) {
    	var ArrayOfIds = ["Select1", "Select2", "Select3", "Select5"];
        for (var Index in ArrayOfIds) {
        	document.getElementById(ArrayOfIds[Index]).disabled = IsLock;
        }
        var HistoryPanel = document.getElementById("test").elements;
        for(var index in HistoryPanel) {
        	HistoryPanel[index].disabled = IsLock;
        }
        	
    }
}
