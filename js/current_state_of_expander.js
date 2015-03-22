function CurrentStateOfExpander() {
    this.CurrentState = function (State) {
        var ArrayOfIds = ["Select1", "Select2", "Select3", "Select5"];
        var Id = "InterfaceExpander";
        var Value = "List Options";
        for (var Index in ArrayOfIds) {
            document.getElementById(ArrayOfIds[Index]).size = 1;
        }
        if (State === "UnList Options") {
            Value = "UnList Options";
            for (var Index in ArrayOfIds) {
                document.getElementById(ArrayOfIds[Index]).size = document.getElementById(ArrayOfIds[Index]).length;
            }
        }
        document.getElementById(Id).value = Value;
    }
}
