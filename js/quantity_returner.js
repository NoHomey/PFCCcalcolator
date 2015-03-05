function QuantityReturner() {
    this.ReturnQuantity = function () {
        var Id = "Select4";
        var Quantity = document.getElementById(Id).value;
        if (Update === 1) {
            Quantity = Quantity - OldQuantity;
            OldQuantity = 0;
            Update = 0;
        }
        return Quantity;
    }
}
