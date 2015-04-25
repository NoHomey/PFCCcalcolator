function Expander() {
    this.InstanceOfCurrentStateOfExpander = new CurrentStateOfExpander();
    this.Expand = function () {
        var Id = "InterfaceExpander";
        var Option1 = "List Options";
        var Option2 = "UnList Options"
        if (document.getElementById(Id).value === Option1) {
            this.InstanceOfCurrentStateOfExpander.CurrentState(Option2);
        } else {
            this.InstanceOfCurrentStateOfExpander.CurrentState(Option1);
        }
    }
}
