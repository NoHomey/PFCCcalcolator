function AdderReferencer() {
this.InstanceOfAdder = new Adder;
this.ReferenceToAdder = function (event) {
        if (event.keyCode === 13) {
            this.InstanceOfAdder.AddCurrentSelect();
            return false;
        }
        else if (event.button < 2) {
            this.InstanceOfAdder.AddCurrentSelect();
            return false;
        }
        else {return;}
    }
}
