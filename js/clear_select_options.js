function ClearSelectOptions() {
    this.InstanceOfBlankOptionKeeper = new BlankOptionKeeper();
    this.ClearAllSelectOptions = function (Id) {
        var Element = document.getElementById(Id);
        for (var Index in Element.options) {
            Element.options[Index] = null;
        }
        this.InstanceOfBlankOptionKeeper.KeepBlankOption(Id);
    }
}
