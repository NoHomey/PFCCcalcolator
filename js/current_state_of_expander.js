function CurrentStateOfExpander() {
    this.CurrentState = function (State) {
        var ArrayOfIds = ["Select1", "Select2", "Select3", "Select5"];
        for (var Index in ArrayOfIds) {
            document.getElementById(ArrayOfIds[Index]).size = 1;
        }
        if (State === "UnList Options") {
            document.getElementById("InterfaceExpander").value = "UnList Options";
            for (var Index in ArrayOfIds) {
                document.getElementById(ArrayOfIds[Index]).size = document.getElementById(ArrayOfIds[Index]).length;
            }
        } else {
            document.getElementById("InterfaceExpander").value = "List Options";
        }
    }
}
