function LockSwitcher() { 
    this.Switcher = function (IsLock) {
        document.getElementById("Select1").disabled =  document.getElementById("Select2").disabled =  document.getElementById("Select3").disabled = IsLock;
    }
}
