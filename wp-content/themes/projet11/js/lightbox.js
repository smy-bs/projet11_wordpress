
let fullscreenArray = null
let showLightBox = false;
let arrayIndex = 0;

let lightbox = null

var lightboxRef = document.querySelector(".lightbox__ref");
var lightboxCat = document.querySelector(".lightbox__cat");

function updateDom(index){
    return index
}

// 라이트박스 표시 함수
function checkLightBox(lightbox) {
    if (!showLightBox) {
        lightbox.style.display = 'flex';
        showLightBox = true;
    }
}

function updateDom(index) {
    const imgThumbnail = document.getElementById("imgThumbnail");
    const imgElement = fullscreenArray[index].previousElementSibling;
    //console.log(imgThumbnail, imgElement);
    imgThumbnail.src = imgElement.src;
    lightboxRef.textContent = imgElement.getAttribute('data-ref');
    lightboxCat.textContent = imgElement.getAttribute('data-cat');
      
}


document.addEventListener("DOMContentLoaded", function() {
    // 모든 'fullscreen' 요소 선택
    fullscreenArray = document.querySelectorAll(".fullscreen");

    // 라이트박스 요소 선택
    lightbox = document.querySelector(".lightbox");
    const lightboxClose = document.querySelector(".lightbox__close");
    const imgThumbnail = document.getElementById("imgThumbnail");
    const lightboxNext = document.querySelector(".lightbox__next");
    const lightboxPrev = document.querySelector(".lightbox__prev");

    if (!lightbox || 
        !lightboxClose || 
        !imgThumbnail || 
        !lightboxNext || 
        !lightboxPrev || 
        !lightboxRef || 
        !lightboxCat) {
        console.error("Lightbox elements not found");
        return;
    }


    //console.log(fullscreenArray);
    // 각 'fullscreen' 요소에 클릭 이벤트 리스너 추가
    fullscreenArray.forEach((fullBtn, i) => {
    
        fullBtn.addEventListener("click", () => {
            arrayIndex = i;
            updateDom(arrayIndex);
            checkLightBox(lightbox);
        });
    });

    // 라이트박스 닫기 이벤트 리스너 추가
    lightboxClose.addEventListener("click", () => {
        lightbox.style.display = 'none';
        showLightBox = false;
    });

    // 다음 이미지로 이동
    lightboxNext.addEventListener("click", () => {
        addImageIndex();
    });

    // 이전 이미지로 이동
    lightboxPrev.addEventListener("click", () => {
        removeImageIndex();
    });

    window.addEventListener("click", (e) => {
		if (e.target === lightbox) {
			lightbox.style.display = "none"
			showLightBox = false
		}
	})
    
    // 키보드 이벤트 리스너 추가
    window.addEventListener("keydown", (e) => {
        // ESC 키를 눌렀을 때
        if (showLightBox && e.code === "Escape") {
            lightbox.style.display = "none";
            showLightBox = false;
            return;
        }
        // 오른쪽 화살표 키를 눌렀을 때
        if (showLightBox && e.code === "ArrowRight") {
            return addImageIndex();
        }
        // 왼쪽 화살표 키를 눌렀을 때
        if (showLightBox && e.code === "ArrowLeft") {
            return removeImageIndex();
        }
    });

    // 라이트박스 DOM 업데이트 함수

    // function updateDom(index) {
    //     const imgElement = fullscreenArray[index].previousElementSibling;
    //     imgThumbnail.src = imgElement.src;
    //    lightboxRef.textContent = imgElement.getAttribute('data-ref');
    //     lightboxCat.textContent = imgElement.getAttribute('data-cat');
      	
    // }


    // 다음 이미지로 이동 함수
    function addImageIndex() {
        if (arrayIndex === fullscreenArray.length - 1) {
            arrayIndex = 0
        }else{
            arrayIndex++;
        }
        updateDom(arrayIndex);
    }

    // 이전 이미지로 이동 함수
    function removeImageIndex() {
        if (arrayIndex === 0) {
            arrayIndex = fullscreenArray.length -1;
        }else{
            arrayIndex--
        }
        updateDom(arrayIndex);
    }
});
