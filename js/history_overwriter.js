function HistoryOverwriter() {
    this.Update = function (WhichOne) {
        var Difference = "Number";
        var DifferentFrom = "Select4";
        var Button = "?";
        var Type = "option";
        var HistoryElement = document.getElementById(Difference + WhichOne);
        var ArrayOfValues = HistoryElement.value.split(' ');
        for (var Index in ArrayOfValues) {
            var SelectNumber = ++Index;
            var Id = "Select" + (SelectNumber).toString();
            var Select = document.getElementById(Id);
            var Value = ArrayOfValues[--Index];
            if (Id !== DifferentFrom) {
                if (!InstanceOfOptionExister.OptionExist(Select, Value)) {
                    var NewOption = document.createElement(Type);
                    NewOption.disabled = NewOption.selected = true;
                    NewOption.text = Value;
                    Select.add(NewOption);
                }
            } else {
                Select.value = OldQuantity = Value;
            }
        }
        InstanceOfLocker.TurnOn();
        InstanceOfOperatorSwitcher.SwitchIt(Button);
        WhichToRemove = WhichOne;
        Update = 1;
    }
}
