/**
 *  Responsive main menu
 */
let iPadScreenSize = 820;
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

function toggle_display(el)
{
    if(el.style.display === 'none') {
        el.style.display = 'block';
    } else {
        el.style.display = 'none';
    }
}