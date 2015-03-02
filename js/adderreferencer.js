function AdderReferencer() {
this.InstanceOfAdder = new Adder;
this.ReferenceToAdder = function (event) {
        if ((event.keyCode === 13) || (event.button < 2)) {
            this.InstanceOfAdder.AddCurrentSelect();
            InstanceOfOperatorSwitcher.SwitchIt("+");
            InstanceOfLocker.TurnOff();
            return false;
        }
        else {return;}
    }
}
