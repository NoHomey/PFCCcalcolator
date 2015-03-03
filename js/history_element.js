function HistoryElement(Value, Id, Disabled, OnClickEvent) {
    var Type = "input";
    var Parent = "History";
    var SubType = "button";
    var Event = "onclick";
    var NewElement = document.createElement(Type);
    var To = document.getElementById(Parent);
    NewElement.value = Value;
    NewElement.type = SubType
    NewElement.disabled = Disabled;
    NewElement.id = Id;
    if (OnClickEvent !== false) {
        NewElement.setAttribute(Event, OnClickEvent);
    }
    To.appendChild(NewElement);
}
