function CurrentStateOfExpander() {
    this.CurrentState = function (State) {
        document.getElementById("Select1").size = document.getElementById("Select2").size = document.getElementById("Select3").size = 1;
        if (State === "UnList Options") {
            document.getElementById("InterfaceExpander").value = "UnList Options";
            document.getElementById("Select1").size = document.getElementById("Select1").length;
            document.getElementById("Select2").size = document.getElementById("Select2").length;
            document.getElementById("Select3").size = document.getElementById("Select3").length;
        } else {
            document.getElementById("InterfaceExpander").value = "List Options";
        }
    }
}
