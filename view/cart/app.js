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


var cartIcon = document.querySelector('.cart_icon');

function toggle() {
    document.getElementById("recipt").classList.toggle("show");
}