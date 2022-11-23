const hamburgerButton = document.querySelector (".nav_toggler")
const hamburgerButton1 = document.querySelector (".nav_toggler1")
const navigation = document.querySelector (".nav1")
const navigation2 = document.querySelector (".nav2")

hamburgerButton.addEventListener("click",toggleNav)
hamburgerButton1.addEventListener("click",toggleNav1)

function toggleNav() {

    hamburgerButton.classList.toggle("active")
    navigation.classList.toggle("active")
}

function toggleNav1() {

    hamburgerButton1.classList.toggle("active")
    navigation2.classList.toggle("active")
    
}