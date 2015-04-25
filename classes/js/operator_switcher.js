function OperatorSwitcher() {
    this.SwitchIt = function (Value, Class) {
        Id = "Operator";
        Element = document.getElementById(Id);
        Element.value = Value;
        Element.setAttribute("class", Class);
    }
}
