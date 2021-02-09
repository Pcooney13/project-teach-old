window.addEventListener('load', function () {
    //Modal
    const modalBG = document.getElementById('modal-bg');
    const cookieModal = document.getElementById('cookie-modal');
    const closeModal = document.getElementById('close-modal-button');
    //Notice Banner
    const closeBanner = document.getElementById('close-button');
    const bannerWrapper = document.getElementById('banner-wrapper');
    const navbar = document.getElementById("myLinks");
    const headerWrap = document.getElementById('header-wrap');
    // Mobile Menu
    const hamburger = document.getElementById("hamburger");
    const search = document.getElementById("search");
    const desktopSearch = document.getElementById("desktop-search");
    const searchDropdown = document.getElementById('search-dropdown');
    // Offset Height Info
    const navlogo = document.getElementById("nav-logo");
    let offsetAmount;
    let distanceToCheck= 0;
    //RATING SCALES POSITION:STICKY
    const ratingKey = document.getElementById('rating-key');
    const ratingCategory = document.querySelectorAll('.classification-box');
    const adminBar = document.getElementById('wpadminbar');
    const header = document.querySelector('header');


    
    function setStickyPositions() {
        //if admin bar is present offset this height
        adminBar ? offsetAmount = adminBar.offsetHeight : offsetAmount = 0;
        //first thing to check is imporntant notice banner
        if (bannerWrapper) {
            bannerWrapper ? offsetAmount += bannerWrapper.offsetHeight : offsetAmount;
            navbar.style.top = offsetAmount + "px";
            closeBanner.addEventListener('click', function () {
                bannerWrapper.style.height = 0;
                setStickyPositions();
            });
        }
        console.log(offsetAmount);
        offsetAmount += navbar.offsetHeight;
        console.log("header: " + header.offsetHeight);
        console.log(offsetAmount);
        if (ratingKey) {
            ratingKey.style.top = offsetAmount + 'px';
            for (var i=0; i<ratingCategory.length; i++) {
                ratingCategory[i].style.top = offsetAmount + 'px';
            }
        }
        //then nav menu
        //then anything on page
        
        
    }
    setStickyPositions();
    // BANNER | closing the banner at the top of the page

    window.addEventListener('scroll', function(ev) {
        var distanceFromTop = navbar.getBoundingClientRect().top;
        if (distanceFromTop <= distanceToCheck) {
            navlogo.style.opacity = 1;
        } else {
            navlogo.style.opacity = 0;
        }
    });

    // //RATING SCALES POSITION:STICKY
    // function ratingScalesPositioning() {
    //     console.log("running rsp");
    //     console.log(headerWrap.offsetHeight);
    //     if (ratingKey) {
    //         ratingKey.style.top = headerWrap.offsetHeight + 'px';
    //         for (var i=0; i<ratingCategory.length; i++) {
    //             ratingCategory[i].style.top = headerWrap.offsetHeight + 'px';
    //         }
    //     }
    // }
    // ratingScalesPositioning();


    // MODAL CONTROLS
    if (closeModal) {
        closeModal.addEventListener('click', function () {
            modalBG.style.display = 'none';
            cookieModal.style.display = 'none';
        });
    }
    // HAMBURGER MENU DROPDOWN | MOBILE | Toggle hamburger icon animation and dropdown
    hamburger.addEventListener('click', function () {
        // close search and set icon to default
        search.classList.remove('is-active');
        searchDropdown.style.transform = "translateY(-100%)";
        // set to active
        if (hamburger.classList.contains('is-active')) {
            navbar.style.transform = "translateY(-100%)";
            hamburger.classList.remove('is-active');
        // set to default
        } else {
            navbar.style.transform = "translateY(0)";
            hamburger.classList.add('is-active');
        }
    });
    // SEARCH TOGGLE DROPDOWN | MOBILE  | Toggle spyglass icon animation and dropdown
    search.addEventListener('click', function () {
        // close dropdown and set icon to default
        navbar.style.transform = "translateY(-100%)";
        hamburger.classList.remove('is-active');
        // set to active
        if (search.classList.contains('is-active')) {
            searchDropdown.style.transform = "translateY(-100%)";
            search.classList.remove('is-active');
        // set to default
        } else {
            searchDropdown.style.transform = "translateY(0)";
            search.classList.add('is-active');
        }
    });
    // SEARCH TOGGLE DROPDOWN | DESKTOP | Toggle spyglass icon animation and dropdown
    desktopSearch.addEventListener('click', function () {
        // close dropdown and set icon to default
        hamburger.classList.remove('is-active');
        // set to active
        if (desktopSearch.classList.contains('is-active')) {
            searchDropdown.style.transform = "translateY(-100%)";
            desktopSearch.classList.remove('is-active');
        // set to default
        } else {
            searchDropdown.style.transform = "translateY(0)";
            desktopSearch.classList.add('is-active');
        }
    });
});