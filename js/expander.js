function Expander() {
    this.currentState = function (a) {
        document.getElementById("Select1").size = document.getElementById("Select2").size = document.getElementById("Select3").size = 1;
        if (a === "UnList Options") {
            document.getElementById("opt").value = "UnList Options";
            document.getElementById("Select1").size = document.getElementById("Select1").length;
            document.getElementById("Select2").size = document.getElementById("Select2").length;
            document.getElementById("Select3").size = document.getElementById("Select3").length;
        } else {
            document.getElementById("opt").value = "List Options";
        }
    }
    this.switchOpt = function () {
        if (document.getElementById("opt").value === "List Options") {
            this.currentState("UnList Options");
        } else {
            this.currentState("List Options");
        }
    }
}
