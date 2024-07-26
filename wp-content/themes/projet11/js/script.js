// a effacer ...
// jQuery(document).ready(function ($) { 

//     $(".popup-close").click(function () {
//             $(".popup-overlay").hide()
//         })
//         console.log("test")

// })


const contact_btn = document.querySelector('.contact_btn')
const popUp_container = document.querySelector('.popup-overlay')
const single_btn = document.querySelector(".single_btn")
const popuUp_content = document.querySelector('.popup-salon')
const reference = document.getElementById("reference")
if (reference) console.log(reference.value)

contact_btn.addEventListener('click', (e)=>{
    e.stopPropagation()
    openModal()
})

if (single_btn) {
	single_btn.addEventListener("click", (e) => {
		e.stopPropagation()
		openModal()
		reference ? addRefValue() : false
	})
}

function openModal() {
	popUp_container.style.display = "flex"
	if (window.screen.width < 768) {
		popuUp_content.classList.add("slideInAnim")
	} else {
		popuUp_content.classList.add("fadeInAnim")
	}
}
window.addEventListener("click", (e) => {
	if (e.target === popUp_container) {
		popUp_container.style.display = "none"
	}
})

/*  single page only  */
function addRefValue() {
	const form = document.querySelector(".wpcf7-form")
	form.querySelectorAll("input")[8].value = reference.value
}

const prev_arrow = document.querySelector(".prev_arrow")
const next_arrow = document.querySelector(".next_arrow")

if (prev_arrow) {
	prev_arrow.addEventListener("mouseenter", () => {
		document.querySelectorAll(".wp-post-image")[1].style.opacity = 1
	})
	prev_arrow.addEventListener("mouseleave", () => {
		document.querySelectorAll(".wp-post-image")[1].style.opacity = 0
	})
}

if (next_arrow) {
	next_arrow.addEventListener("mouseenter", () => {
		document.querySelectorAll(".wp-post-image")[2].style.opacity = 1
	})
	next_arrow.addEventListener("mouseleave", () => {
		document.querySelectorAll(".wp-post-image")[2].style.opacity = 0
	})
}
