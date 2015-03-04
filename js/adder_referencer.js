function AdderReferencer() {
    this.InstanceOfAdder = new Adder;
    this.ReferenceToAdder = function (Event) {
        var Button = "+";
        var Class = "Plus";
        if (((Event.keyCode === 13) || (Event.button < 2)) || (Event === -1)) {
            if (Event === -1) {
                this.InstanceOfAdder.AddCurrentSelect(true);
            } else {
                this.InstanceOfAdder.AddCurrentSelect(false);
                if (WhichToRemove > 0) {
                    InstanceOfElementRemover.RemoveElement(WhichToRemove);
                    WhichToRemove = 0;
                }
            }
            InstanceOfOperatorSwitcher.SwitchIt(Button, Class);
            InstanceOfLocker.TurnOff();
            return false;
        } else {
            return;
        }
    }
}
