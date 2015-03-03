function HistoryElement(Value, Id, Disabled, OnClickEvent) {
    var NewElement = document.createElement("input");
    var To = document.getElementById("test");
    NewElement.value = Value;
    NewElement.type = "button"
    NewElement.disabled = Disabled;
    NewElement.id = Id;
    if (OnClickEvent !== false) {
        NewElement.setAttribute("onclick", OnClickEvent);
    }
    To.appendChild(NewElement);
}
