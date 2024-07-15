

document.addEventListener("DOMContentLoaded", () => {
    // 모든 'fullscreen' 요소 선택
    const fullscreenArray = document.querySelectorAll(".fullscreen");

    // 라이트박스 요소 선택
    const lightbox = document.querySelector(".lightbox");
    const lightboxClose = document.querySelector(".lightbox__close");
    const imgThumbnail = document.getElementById("imgThumbnail");
    const lightboxNext = document.querySelector(".lightbox__next");
    const lightboxPrev = document.querySelector(".lightbox__prev");
    const lightboxRef = document.querySelector(".lightbox__ref");
    const lightboxCat = document.querySelector(".lightbox__cat");

    if (!lightbox || !lightboxClose || !imgThumbnail || !lightboxNext || !lightboxPrev || !lightboxRef || !lightboxCat) {
        console.error("Lightbox elements not found");
        return;
    }

    let showLightBox = false;
    let arrayIndex = null;

    // 각 'fullscreen' 요소에 클릭 이벤트 리스너 추가
    fullscreenArray.forEach((fullBtn, i) => {
        fullBtn.addEventListener("click", () => {
            arrayIndex = i;
            updateDom(arrayIndex);
            checkLightBox();
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

    function updateDom(index) {
        const imgElement = fullscreenArray[index].previousElementSibling;
        imgThumbnail.src = imgElement.src;
       lightboxRef.textContent = imgElement.getAttribute('data-ref');
        lightboxCat.textContent = imgElement.getAttribute('data-cat');
      	
    }

    // 라이트박스 표시 함수
    function checkLightBox() {
        if (!showLightBox) {
            lightbox.style.display = 'flex';
            showLightBox = true;
        }
    }

    // 다음 이미지로 이동 함수
    function addImageIndex() {
        if (arrayIndex < fullscreenArray.length - 1) {
            arrayIndex++;
            updateDom(arrayIndex);
        }
    }

    // 이전 이미지로 이동 함수
    function removeImageIndex() {
        if (arrayIndex > 0) {
            arrayIndex--;
            updateDom(arrayIndex);
        }
    }
});
