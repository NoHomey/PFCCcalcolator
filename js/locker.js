function Locker() {
    this.lockSw = function (a) {
        document.getElementById("Select1").disabled =  document.getElementById("Select2").disabled =  document.getElementById("Select3").disabled = a;
    }
    this.turnOn = function () {
        lockSw(true);
    }
    this.turnOff = function () {
        lockSw(false);
    }
}
