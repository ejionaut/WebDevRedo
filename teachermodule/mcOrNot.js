
function mcOrNot(that) {
    if (that.value == "mc") {
        document.getElementById("ifYesLabel").style.display = "block";
        document.getElementById("ifYesInput").style.display = "block";
        document.getElementById("ifYesInput").setAttribute("required", "");
        document.getElementById("ifYesInput").removeAttribute("disabled");
    } else if (that.value = "tf"){
        document.getElementById("ifYesInput").value = "true,false";
    }
    else {
        document.getElementById("ifYesInput").value = "";
        document.getElementById("ifYesInput").setAttribute("disabled", "");
        document.getElementById("ifYesInput").setAttribute("value", "");
        document.getElementById("ifYesInput").removeAttribute("required");
    }
}