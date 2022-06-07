const isMobile = window.matchMedia("only screen and (max-width: 820px)").matches;

/**
 * Functions to run if document is loaded
 */
window.onload = () => {
    if(slider) {
        responsive_slider();
    }
    if(smoothScroll) {
        jump_to();
    }
    if(mainMenu && isMobile) {
        mobile_menu();
    }
}

/**
 *  Responsive main menu
 */
const mainMenu = document.getElementById('menu-mainmenu');
const toggleMenu = document.getElementById('toggle-menu');
const openMenu = document.getElementById('open-menu');
const closeMenu = document.getElementById('close-menu');
const listItemsWithChildren = mainMenu.getElementsByClassName('has-children');
const mobile_menu = () => {
    init_mobile_menu();
    li_with_child_icon();
    toggle_mobile_menu();
    toggle_childmenu();
}
const init_mobile_menu = () => {
    mainMenu.classList.add('mobile-menu');
    mainMenu.style.display = 'none';
    openMenu.style.display = 'block';
    closeMenu.style.display = 'none';
}
const toggle_mobile_menu = () => {
    toggleMenu.querySelectorAll('span').forEach((item) => {
        item.addEventListener('click', () => {
            toggle_display(mainMenu);
            toggle_display(openMenu);
            toggle_display(closeMenu);
        });
    });
}
const li_with_child_icon = () => {
    if(listItemsWithChildren) {
        Array.from(listItemsWithChildren).forEach(listItem => {
            listItem.insertAdjacentHTML('afterbegin', '<i class="open-submenu fa fa-plus">&nbsp;</i>');
        });
    }
}
const toggle_childmenu = () => {
    if(listItemsWithChildren) {
        Array.from(listItemsWithChildren).forEach(listItem => {
            listItem.addEventListener('click', () => {
                let nearestSubmenu = listItem.querySelector('.submenu');
                toggle_display(nearestSubmenu);
            });
        });
    }
}

/**
 * Search form
 */
const searchForm = document.getElementById('search-form');
const searchButton = document.getElementById('search-button');
if(searchForm) {
    searchForm.addEventListener('keyup', enable_search_button);
    searchButton.disabled = true;

    function enable_search_button() {
        let searchFormValue = this.value;
        let countSearchFormValue = searchFormValue.length;
        document.getElementById('search-button').disabled = countSearchFormValue === 0;
    }
}

/**
 * Toggle display
 * @param el
 */
const toggle_display = (el) => {
    if(el.style.display === 'none') {
        el.style.display = 'block';
    } else {
        el.style.display = 'none';
    }
}

/**
 * Slider
 */
const slider = document.getElementById('slider');
const responsive_slider = () => {
    const slider = document.getElementById('slider');
    let sliderWidth = slider.offsetWidth;
    const slideList = document.getElementById('slideWrap');
    let count = 1;
    let items = slideList.querySelectorAll('div').length;
    const prev = document.getElementById('prev');
    const next = document.getElementById('next');

    window.addEventListener('resize', () => {
        sliderWidth = slider.offsetWidth;
    });

    const listItem = slideList.querySelectorAll('div');
    for(let i=0; i < listItem.length; i++){
        listItem[i].style.width = sliderWidth + 'px';
    }

    const prevSlide = () => {
        if(count > 1) {
            count = count - 2;
            slideList.style.left = '-' + count * sliderWidth + 'px';
            count++;
        }
        else if(count === 1) {
            count = items - 1;
            slideList.style.left = '-' + count * sliderWidth + 'px';
            count++;
        }
    };

    const nextSlide = () => {
        if(count < items) {
            slideList.style.left = '-' + count * sliderWidth + 'px';
            count++;
        }
        else if(count === items) {
            slideList.style.left = '0px';
            count = 1;
        }
    };

    next.addEventListener('click', () => {
        nextSlide();
    });

    prev.addEventListener('click', () => {
        prevSlide();
    });

    setInterval(() => {
        nextSlide()
    }, 8000);
};

/**
 * Jump to a given ID
 */
const smoothScroll = document.getElementById('smooth-jump');
const jump_to = () => {
    const jumpTo = smoothScroll.getAttribute('data-jump-to');
    smoothScroll.addEventListener('click', () => {
        let url = location.href;
        location.href = '#'+jumpTo;
        history.replaceState(null,null,url);
    });
}