/*=============== SHOW MENU ===============*/
const navMenu = document.getElementById('nav-menu'),
      navToogle = document.getElementById('nav-toggle'),
      navClose = document.getElementById('nav-close')

// Menu Show
if(navToogle){
    navToogle.addEventListener('click', () =>{
        navMenu.classList.add('show-menu')
    })
}

if(navClose){
    navClose.addEventListener('click',()=>{
        navMenu.classList.remove('show-menu')
    })
}
/*=============== REMOVE MENU MOBILE ===============*/

const navLink = document.querySelectorAll('.nav__link')

const linkAction = () =>{
    const navMenu = document.getElementById('nav-menu')
    navMenu.classList.remove('show-menu')
}
navLink.forEach(n => n.addEventListener('click', linkAction))

/*=============== CHANGE BACKGROUND HEADER ===============*/

const bgHeader = () => {
    const header = document.getElementById('header');
    const buttons = document.querySelectorAll('.nav__button');

    if (window.scrollY >= 50) {
        header.classList.add('bg-header');
        buttons.forEach(button => button.classList.add('sec__nav__btn'));
    } else {
        header.classList.remove('bg-header');
        buttons.forEach(button => button.classList.remove('sec__nav__btn'));
    }
};

window.addEventListener('scroll', bgHeader);
bgHeader();


/*=============== SWIPER SERVICES ===============*/
const swiperServices = new Swiper('.services__swiper', {
    loop:true,
    grabCursor : true,
    spaceBetween: 24,
    slidesPerView: 'auto',
    navigation:{
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
})

/*=============== SHOW SIDE BAR ===============*/


const sidebar = document.getElementById('admin-sidebar'),
      sidebarToggle = document.getElementById('sidebar-toggle'),
      sidebarClose = document.getElementById('sidebar-close');

if(sidebarToggle){
    sidebarToggle.addEventListener('click', () => {
        sidebar.classList.add('show-sidebar');
    });
}

if(sidebarClose){
    sidebarClose.addEventListener('click', () => {
        sidebar.classList.remove('show-sidebar');
    });
}

// Profile 2 version

    document.getElementById('edit-profile-btn').addEventListener('click', function() {
        document.getElementById('profile-form').style.display = 'block';
        document.getElementById('password-form').style.display = 'none';
    });

    document.getElementById('edit-password-btn').addEventListener('click', function() {
        document.getElementById('profile-form').style.display = 'none';
        document.getElementById('password-form').style.display = 'block';
    });




    // Affichage des service

    document.addEventListener('DOMContentLoaded', () => {
    const addBtn = document.getElementById('add-btn');
    const cardAdd = document.getElementById('card-add');
    const tableResponsive = document.getElementById('table-responsive');

        if (addBtn && cardAdd && tableResponsive) {
            cardAdd.style.display = 'none';

            addBtn.addEventListener('click', () => {
            cardAdd.style.display = 'block';
            tableResponsive.style.display = 'none';
            addBtn.style.display = 'none';
            });
        }
    });


    function toggleVisibility(inputId, iconId) {
        const input = document.getElementById(inputId);
        const icon = document.getElementById(iconId);

        const isHidden = input.type === 'password';
        input.type = isHidden ? 'text' : 'password';

        icon.classList.toggle('ri-eye-line', !isHidden);
        icon.classList.toggle('ri-eye-off-line', isHidden);
    }


