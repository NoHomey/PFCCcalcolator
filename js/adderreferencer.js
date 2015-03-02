function AdderReferencer() {
this.InstanceOfAdder = new Adder;
this.ReferenceToAdder = function (event) {
        if (((event.keyCode === 13) || (event.button < 2)) || (event === -1)) {
            if (event === -1) {
                this.InstanceOfAdder.AddCurrentSelect(true);
            }
            else {
                this.InstanceOfAdder.AddCurrentSelect(false);
            }            
            InstanceOfOperatorSwitcher.SwitchIt("+");
            InstanceOfLocker.TurnOff();
            return false;
        }
        else {return;}
    }
}
