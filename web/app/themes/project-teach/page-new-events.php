<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        nav img, nav button {
            display:none;
        }
        * {
            box-sizing: border-box;
            margin:0;
        }
        body {
            background-color: #999;
            margin:0;
            position:relative;
            z-index:-5;
            height:100vh;
        }
        nav {
            height:auto;
        }
        .top-header {
            width:100%;
            background-color:#333;
            height:100px
        }
        .bottom-header {
            position:relative;
        }
        #js-search-desktop {
            padding:20px;
        }
        .nav-wrapper {
            width:100%;
            background-color:#3e3e93;
            /* height:60px; */
            display:flex;
            align-items: center;
            padding:15px;
        }

        .search-button {
            margin-left:auto;
        }
        .child-links {
            position: relative;
            background:#f2f2f2;
            max-height:0;
            overflow: hidden;
            transition: all .3s;
        }
        .child-links.open {
            /* HAVE TO SET NUMBER PER UL */
            max-height:136px;
        }
        nav, .search {
            position: absolute;
            width:100%;
            transition: all .3s;
            transform:translateY(-100%);
            display:flex;
            align-items:center;
            justify-content: center;
        }
        .search {
            background-color:lightgray;
        }
        ul {
            background-color:lightgray;
            padding:0;
            width: 100%;
            list-style:none;
            display:flex;
            justify-content: center;
            align-items:center;
            text-align: center;
            height:100%;
            flex-direction:column;
        }
        ul li {
            width:100%;
            padding:8px 0;
        }
        ul li:first-child {
            margin-left:0;
        }
        ul li:last-child {
            margin-right:0;
        }
        .dropdowns {
            width:100%;
            /* height:60px; */
            position:absolute;
            bottom:0;
            z-index:-1;
        }
        .dropdowns .open {
            /* min-height:60px; */
            transform:translateY(0);
        }
        input {
            margin:10px;
        }
        @media (min-width:600px) {
            .search { z-index:-3; }
            .nav-wrapper { display:none; }
            .dropdowns { position:relative; }
            nav { transform:translateY(0); height:60px }
            .dropdowns .search.open { transform:translateY(60px); }
            ul {flex-direction:row}
            .child-links {
                position: absolute;
                width: 100%;
                left: 0;
                top: 100%;
                transition: all .3s;
                transform:translateY(-100%);
                z-index: -3;
            }
            nav img, nav button {
                display:block;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="top-header"></div>
        <div class="bottom-header">

            <div class="nav-wrapper">
                <button id="js-hamburger" class="hamburger-button">=</button>
                <button id="js-search-mobile" class="search-button">search</button>
            </div>

            <div class="dropdowns">
                <nav>
                    <img src="https://via.placeholder.com/45/45">
                    <ul>
                        <li class="has-children">nav-item 1
                            <ul class="child-links">
                                <li>1-submenu-item-1</li>
                                <li>1-submenu-item-2</li>
                                <li>1-submenu-item-3</li>
                                <li>1-submenu-item-4</li>
                            </ul>
                        </li>
                        <li class="has-children">nav-item 2
                            <ul class="child-links">
                                <li>2-submenu-item-1</li>
                                <li>2-submenu-item-2</li>
                                <li>2-submenu-item-3</li>
                            </ul>
                        </li>
                        <li class="has-children">nav-item 3
                            <ul class="child-links">
                                <li>3-submenu-item-1</li>
                                <li>3-submenu-item-2</li>
                                <li>3-submenu-item-3</li>
                                <li>3-submenu-item-4</li>
                            </ul>
                        </li>
                        <li class="has-children">nav-item 4
                            <ul class="child-links">
                                <li>4-submenu-item-1</li>
                                <li>4-submenu-item-2</li>
                                <li>4-submenu-item-3</li>
                                <li>4-submenu-item-4</li>
                            </ul>
                        </li>
                        <li>nav-item 5</li>
                    </ul>
                    <button id="js-search-desktop" class="search-button">search</button>
                </nav>
                <div class="search">
                    <form action="#">
                        <input type="text" placeholder="Search.." name="search">
                        <button type="submit">submit</button>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <script>
    window.addEventListener('load', function () {
            
        hamburger = document.getElementById('js-hamburger')
        search = document.getElementById('js-search-mobile')
        searchDesktop = document.getElementById('js-search-desktop')
        searchDropdown = document.querySelector('.search')
        hamburgerDropdown = document.querySelector('nav')
        header = document.querySelector('header')
        dropdowns = document.querySelector('.dropdowns')
        navLists = document.querySelectorAll('header li')
        childLinks = document.querySelectorAll('header li > ul')

        // console.log(navLists.length)

        navLists.forEach(navItem => {
            // if (navItem.children.length > 0 ) {
            //     console.log(navItem.children[0])
            //     navItem.children[0].classList.remove("open");
            // }
            navItem.addEventListener('click', function(e) {
                searchDropdown.classList.remove('open')
                navLists.forEach(navItem => {
                    if (navItem.children.length > 0) {
                        console.log(navItem.children[0])
                        navItem.children[0].classList.remove("open");
                    }
                })
                if (e.target.children.length > 0) {
                    console.log(e.target.children)
                    e.target.children[0].classList.toggle("open");
                }
            })
        });

        
        document.body.addEventListener('click', function(e) {
            // console.log(e.target.closest())
            if (e.target === hamburger) {
                console.log("Case - 1")
                hamburgerDropdown.classList.toggle('open')
                searchDropdown.classList.remove('open')
                childLinks.forEach(childLink => {
                    childLink.classList.remove('open')
                });
            } else if (e.target === search) {
                console.log("Case - 2")
                searchDropdown.classList.toggle('open')
                hamburgerDropdown.classList.remove('open')
                childLinks.forEach(childLink => {
                    childLink.classList.remove('open')
                });
            } else if (e.target === searchDesktop) {
                console.log("Case - 3")
                searchDropdown.classList.toggle('open')
                hamburgerDropdown.classList.remove('open')
                childLinks.forEach(childLink => {
                    childLink.classList.remove('open')
                });
            } 
            else if (e.target.closest('div') === dropdowns || e.target.closest('div') === searchDropdown) {
                return
            }
            else {
                searchDropdown.classList.remove('open')
                hamburgerDropdown.classList.remove('open')
                hamburgerDropdown.classList.remove('open')
                childLinks.forEach(childLink => {
                    childLink.classList.remove('open')
                });
            }
        })
    });
    </script>
</body>
</html>