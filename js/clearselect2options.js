function ClearSelect2Options() {
    this.InstanceOfBlankOptionKeeper = new BlankOptionKeeper();
    this.ClearAllSelect2Options = function () {
        var element = document.getElementById("Select2");
        for (var index in element.options) {
            element.options[index] = null;
        }
        this.InstanceOfBlankOptionKeeper.KeepBlankOption();
    }
}
