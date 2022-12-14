function mcOrNot(that) {
    if (that.value == "mc") {
        document.getElementById("ifYesLabel").style.display = "block";
        document.getElementById("ifYesInput").style.display = "block";
    } else {
        document.getElementById("ifYesLabel").style.display = "none";
        document.getElementById("ifYesInput").style.display = "none";
    }
}