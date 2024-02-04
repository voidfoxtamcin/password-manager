let open_navbar = document.getElementById("navbar-open")
let close_navbar = document.getElementById("navbar-close")

open_navbar.addEventListener("click", function () {
    let target = document.getElementById(open_navbar.getAttribute("data-target"))
    target.classList.add("flex")
    target.classList.remove("hidden")
})

close_navbar.addEventListener("click", function () {
    let target = document.getElementById(open_navbar.getAttribute("data-target"))
    target.classList.add("hidden")
    target.classList.remove("flex")
})