function Locker() {
    this.InstanceOfLockSwitcher = new LockSwitcher;
    this.TurnOn = function () {
        this.InstanceOfLockSwitcher.Switcher(true);
    }
    this.TurnOff = function () {
        this.InstanceOfLockSwitcher.Switcher(false);
    }
}
