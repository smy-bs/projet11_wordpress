window.addEventListener("DOMContentLoaded", () => {
    const menu_toggle = document.querySelector(".menu-toggle");
    const navMenu = document.querySelector(".primary-menu");
    const array_line = document.querySelectorAll('.line_menu');
    const li_array = document.querySelectorAll('.menu-item');

    function isMobile() {
        return window.innerWidth <= 768;
    }

    li_array.forEach(li => {
        li.addEventListener('click', () => {
            if (isMobile()) {
                navMenu.classList.remove("show");
                array_line[1].style.opacity = 1;
                array_line[0].style.transform = 'rotate(0)';
                array_line[2].style.transform = 'rotate(0)';
            }
        });
    });

    menu_toggle.addEventListener("click", () => {
        if (isMobile()) {
            if (navMenu.classList.contains("show")) {
                navMenu.classList.remove("show");
                array_line[1].style.opacity = 1;
                array_line[0].style.transform = 'rotate(0)';
                array_line[2].style.transform = 'rotate(0)';
            } else {
                navMenu.classList.add("show");
                array_line[1].style.opacity = 0;
                array_line[0].style.transform = 'rotate(45deg) translateX(8px) translateY(8px)';
                array_line[2].style.transform = 'rotate(-45deg) translateX(6px) translateY(-4px)';
            }
        }
    });
});
