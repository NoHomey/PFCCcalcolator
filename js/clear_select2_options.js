function ClearSelect2Options() {
    this.InstanceOfBlankOptionKeeper = new BlankOptionKeeper();
    this.ClearAllSelect2Options = function () {
        var Id = "Select2";
        var Element = document.getElementById(Id);
        for (var Index in Element.options) {
            Element.options[Index] = null;
        }
        this.InstanceOfBlankOptionKeeper.KeepBlankOption();
    }
}
