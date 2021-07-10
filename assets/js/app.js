function toggle() {
    var element = document.getElementById("navbarNavAltMarkup");
    element.classList.toggle("display");
}

var links = document.querySelectorAll(".nav-link");

links.forEach(function(link) {
    link.addEventListener("click", function() {
        toggle();
    })
})

//  prevent form resubmition
if (
    window.history
    .replaceState
) {
    window.history.replaceState(
        null,
        null,
        window.location
        .href,
    );
}

//  toggle command reciept

function toggl() {
    document.getElementById("recipt").classList.toggle("show");
}