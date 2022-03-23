// TODO
// Refactor this complete file

let iPadScreenSize = 820;
let smoothScroll = document.getElementById('smooth-jump');

/**
 * Functions to run if document is loaded
 */
window.onload = function() {
    let slider = document.getElementById('slider');
    if(slider) {
        responsive_slider();
    }
    if(window.innerWidth <= iPadScreenSize) {
        add_listitem_classes();
        hide_submenus();
        open_submenu();
    }
    if(smoothScroll) {
        jump_to();
    }
}

/**
 *  Responsive main menu
 */
let mainMenu = document.getElementById('menu-main-menu');
let toggleMenu = document.getElementById('toggle-menu');
let openMenu = document.getElementById('open-menu');
let closeMenu = document.getElementById('close-menu');

if(mainMenu) {
    // Onload Document
    document.addEventListener("DOMContentLoaded", function(){
        get_mobile_menu();
        window.addEventListener('resize',get_mobile_menu);
    });

    function get_mobile_menu()
    {
        if (window.innerWidth <= 820) {
            mainMenu.classList.add('mobile-menu');
            openMenu.style.display = 'block';
            closeMenu.style.display = 'none';
            mainMenu.style.display = 'none';

            toggleMenu.addEventListener('click', function() {
                toggle_display(mainMenu);
                toggle_display(openMenu);
                toggle_display(closeMenu);
            });
        } else {
            mainMenu.classList.remove('mobile-menu');
            mainMenu.style.display = 'block';
        }
    }

    function add_listitem_classes()
    {
        let liWithChildren = mainMenu.getElementsByClassName('has-children');
        let html = '<span class="open-submenu"><i class="fa fa-plus"></i></span>';
        for(let i=0; i < liWithChildren.length; i++){
            liWithChildren[i].insertAdjacentHTML('beforeend', html);
        }
    }
    function hide_submenus()
    {
        let submenus = document.getElementsByClassName('submenu');
        for(let i=0; i < submenus.length; i++){
            submenus[i].style.display = 'none';
        }
    }
    function open_submenu()
    {
        let parent = document.getElementsByClassName('has-children');
        for(let i=0; i < parent.length; i++){
            let current = parent[i].querySelector('.open-submenu');
            current.addEventListener('click', function() {
                let submenu = parent[i].querySelector('.submenu');
                toggle_display(submenu);
            });
        }
    }
}

/**
 * Search form
 */
let searchForm = document.getElementById('search-form');
let searchButton = document.getElementById('search-button');

if(searchForm) {
    searchForm.addEventListener('keyup', enable_search_button);
    searchButton.disabled = true;

    function enable_search_button()
    {
        let searchFormValue = this.value;
        let countSearchFormValue = searchFormValue.length;
        document.getElementById('search-button').disabled = countSearchFormValue === 0;
    }
}

/**
 * Toggle display
 * @param el
 */
function toggle_display(el)
{
    if(el.style.display === 'none') {
        el.style.display = 'block';
    } else {
        el.style.display = 'none';
    }
}

/**
 * Slider
 */
let responsive_slider = function()
{
    let slider = document.getElementById('slider');
    let sliderWidth = slider.offsetWidth;
    let slideList = document.getElementById('slideWrap');
    let count = 1;
    let items = slideList.querySelectorAll('div').length;
    let prev = document.getElementById('prev');
    let next = document.getElementById('next');

    window.addEventListener('resize', function() {
        sliderWidth = slider.offsetWidth;
    });

    let listItem = slideList.querySelectorAll('div');
    for(let i=0; i < listItem.length; i++){
        listItem[i].style.width = sliderWidth + 'px';
    }

    let prevSlide = function() {
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

    let nextSlide = function() {
        if(count < items) {
            slideList.style.left = '-' + count * sliderWidth + 'px';
            count++;
        }
        else if(count === items) {
            slideList.style.left = '0px';
            count = 1;
        }
    };

    next.addEventListener('click', function() {
        nextSlide();
    });

    prev.addEventListener('click', function() {
        prevSlide();
    });

    setInterval(function() {
        nextSlide()
    }, 8000);
};

/**
 * Jump to a given ID
 */
let jump_to = function()
{
    let jumpTo = smoothScroll.getAttribute('data-jump-to');
    smoothScroll.addEventListener('click', function() {
        let url = location.href;
        location.href = '#'+jumpTo;
        history.replaceState(null,null,url);
    });
}