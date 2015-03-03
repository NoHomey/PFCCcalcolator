function ClearSelect2Options() {
    this.InstanceOfBlankOptionKeeper = new BlankOptionKeeper();
    this.ClearAllSelect2Options = function () {
        var Element = document.getElementById("Select2");
        for (var Index in Element.options) {
            Element.options[Index] = null;
        }
        this.InstanceOfBlankOptionKeeper.KeepBlankOption();
    }
}
