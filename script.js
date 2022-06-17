function get() {
    if("content" in localStorage) {
        document.getElementById("content").innerHTML = decodeURI(localStorage.getItem("content"));
        localStorage.setItem("content", document.getElementById("save").innerHTML);
    }
}

function add() {
    localStorage.setItem("content", document.getElementById("save").innerHTML);
}