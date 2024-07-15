// const url =  js_filter_js.ajax_url
// const  formData = new FormData();

// formData.append( 'action', 'single_post_ajax' );

// fetch(url,
//       {
//             method: 'POST',
//             body: formData,
//       }
// )
//       .then(response => response.text())
//       .then(data => console.log(data))

addEventListener("DOMContentLoaded", () => {
	const form_div = document.querySelector(".formulaire")
	const li_list = form_div.querySelectorAll("li")

	const list_btn_select = document.querySelectorAll(".select-btn")

	// select btn click
	list_btn_select.forEach((select_btn) => {
		select_btn.addEventListener("click", function (e) {
			e.stopPropagation()
			const scrollHeight = this.parentNode.querySelector("ul").scrollHeight
			this.style.border = "1px solid #215AFF"
			this.style.borderRadius = "8px 8px 0 0"
			this.parentNode.querySelector("ul").style.visibility = "visible"
			this.parentNode.querySelector("ul").style.height = `${scrollHeight}px`
			this.querySelector(".svg").style.opacity = 1
			this.querySelectorAll("svg")[1].style.opacity = 0
			setTimeout(() => {
				this.parentNode.querySelector("ul").style.height = "auto"
			}, 349)
		})
	})

	let format = null
	let category = null
	let date = null
	li_list.forEach((element) => {
		element.addEventListener("click", () => {
			console.log(element.innerText, element.getAttribute("data-field"))
			const url = js_filter_js.ajax_url
			const formData = new FormData()
			formData.append("action", "filter_post_ajax")
			/// ajouter des parametres (category of format)
			if (element.getAttribute("data-field") === "format") {
				format = element.innerText
				document.querySelector(".format_selected").innerText = element.innerText
			} else if (element.getAttribute("data-field") === "category") {
				category = element.innerText
				document.querySelector(".category_selected").innerText =
					element.innerText
			} else if (element.getAttribute("data-field") === "date") {
				date = element.innerText
				formData.append("date", element.innerText)
			}

			// check active li (selected element)
			const parentEl = element.parentNode
			const options_list = parentEl.querySelectorAll("li")
			options_list.forEach((li) => {
				if (li.innerText === element.innerText) {
					li.classList.add("select-active")
				} else {
					li.classList.remove("select-active")
				}
			})

			// revenir à l'état précédent du CSS
			element.parentNode.style.visibility = "invisible"
			element.parentNode.style.height = "0"
			element.parentNode.previousElementSibling.style.border =
				"1.3px solid var(--color-gris-border)"
			element.parentNode.previousElementSibling.style.borderRadius = "8px"
			console.log(element.parentNode.parentNode)
			element.parentNode.parentNode.querySelector(".svg").style.opacity = 0
			element.parentNode.parentNode.querySelectorAll("svg")[1].style.opacity = 1


			if (format) formData.append("format", format)
			if (category) formData.append("category", category)
			if (date) formData.append("date", date)

			fetch(url, {
				method: "POST",
				body: formData,
			})
				.then((response) => response.json())
				.then((data) => {
					const container = document.getElementById("photo-container")
					container.innerHTML = "" // efface tout
					console.log(data)
					if (data.success) {
						console.log(data.data)
						container.insertAdjacentHTML("beforeend", data.data.content)
					} else {
						container.innerHTML = "Error with the data ..."
					}
				})
		})
	})
})

//LoaddMore

addEventListener("DOMContentLoaded", () => {
	const loadMoreButton = document.getElementById("load-more")
	let currentPage = 1

	loadMoreButton.addEventListener("click", () => {
		currentPage++
		const url = js_filter_js.ajax_url
		const formData = new FormData()
		formData.append("action", "load_more_posts")
		formData.append("page", currentPage)

		fetch(url, {
			method: "POST",
			body: formData,
		})
			.then((response) => {
				if (!response.ok) {
					throw new Error(`HTTP error! Status: ${response.status}`)
				}
				return response.json()
			})
			.then((data) => {
				console.log(data)
				if (data.success) {
					const container = document.getElementById("photo-container")
					container.insertAdjacentHTML("beforeend", data.data.content)
					if (!data.data.has_more) {
						loadMoreButton.style.display = "none"
					}
				} else {
					console.error("Error:", data.data)
				}
			})
			.catch((error) => console.error("Fetch error:", error))
	})
})
