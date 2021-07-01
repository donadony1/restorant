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