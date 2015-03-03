function AdderReferencer() {
    this.InstanceOfAdder = new Adder;
    this.ReferenceToAdder = function (Event) {
        if (((Event.keyCode === 13) || (Event.button < 2)) || (Event === -1)) {
            if (Event === -1) {
                this.InstanceOfAdder.AddCurrentSelect(true);
            } else {
                this.InstanceOfAdder.AddCurrentSelect(false);
                if (WhichToRemove > 0) {
                    InstanceOfElementRemover.Remove(WhichToRemove);
                    WhichToRemove = 0;
                }
            }
            InstanceOfOperatorSwitcher.SwitchIt("+");
            InstanceOfLocker.TurnOff();
            return false;
        } else {
            return;
        }
    }
}
