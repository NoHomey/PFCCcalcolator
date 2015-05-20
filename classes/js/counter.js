function Counter() {
    this.Count = function () {
        var c = 0;
        for (var Index1 in Data) {
            for (var Index2 in Data[Index1]) {
                for (var Index3 in Data[Index1][Index2]) {
                    c++;
                }
            }
        }
        document.getElementById("Info").value = "Currently supported foods: " + c;
    }
}
