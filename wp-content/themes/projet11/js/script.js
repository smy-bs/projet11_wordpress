// a effacer ...
// jQuery(document).ready(function ($) { 

//     $(".popup-close").click(function () {
//             $(".popup-overlay").hide()
//         })
//         console.log("test")

// })


const contact_btn = document.querySelector('.contact_btn')
const popUp_container = document.querySelector('.popup-overlay')

const popuUp_content = document.querySelector('.popup-salon')

contact_btn.addEventListener('click', (e)=>{
    e.stopPropagation()
    console.log(window.screen.width);
    popUp_container.style.display = "flex"
    if(window.screen.width < 768){

        popuUp_content.classList.add('slideInAnim')
    }else{
        popuUp_content.classList.add('fadeInAnim')
    }
})


window.addEventListener("click", (e)=>{
    if(e.target === popUp_container){
        popUp_container.style.display = "none"
    }
})

