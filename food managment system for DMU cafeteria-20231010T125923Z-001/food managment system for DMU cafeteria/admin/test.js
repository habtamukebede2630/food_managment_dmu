var toggleBtn = document.querySelector(".toggle-btn")
var list = document.querySelector(".list")

// list

toggleBtn.addEventListener('click',function(){
    list.classList.toggle("side-bar-remove")

    list.style.backgroundColor = "red"
})