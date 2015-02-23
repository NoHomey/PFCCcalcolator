function Expander() {
    this.InstanceOfCurrentStateOfExpander = new CurrentStateOfExpander();
    this.Expand = function () {
        if (document.getElementById("InterfaceExpander").value === "List Options") {
            this.InstanceOfCurrentStateOfExpander.CurrentState("UnList Options");
        } else {
            this.InstanceOfCurrentStateOfExpander.CurrentState("List Options");
        }
    }
}
