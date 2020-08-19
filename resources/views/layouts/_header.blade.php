<header class="navbar-casio">
    <!-- Topbar Phone -->
    <div class="navbar-casio__topbar">

        <!-- Topbar Phone -->
        <a class="navbar-casio__topbar__phone" href="tel:0934003403">
            <em class="fa fa-phone"></em> 0934 003 403
        </a>

        <!-- Topbar Signup/Signin -->
        <button class="navbar-casio__topbar__sign">
            <i class="fa fa-sign-out" aria-hidden="true"></i>
            Đăng ký/Đăng nhập
        </button>

        <!-- Topbar Store -->
        <a class="navbar-casio__topbar__store" to="/">
            <i class="fa fa-map-marker" aria-hidden="true"></i> Cửa hàng
        </a>

        <!-- Topbar Cart -->
        <div class="navbar-casio__topbar__cart">
            <i class="fa fa-shopping-basket"></i>
            <span>0 Giỏ hàng</span>
        </div>

    </div>
    <!-- Topbar Phone -->

    <!-- Header Center -->
    <div class="navbar-casio__center">
        <div class="navbar-casio__center__brand">
            <!-- Logo Casio -->
            <a href="/">
                <img
                    class="navbar-casio__center__logo"
                    src="https://casio.anhkhue.com/uploads/logo-01_2.png"
                    alt="Logo"
                />
            </a>

            <!-- Authorization Casio -->
            <a href="#">
                <img
                    class="navbar-casio__center__author"
                    src="https://casio.anhkhue.com/uploads/logo-authourized-casio.png"
                    alt="Authorization"
                />
            </a>

            <div class="navbar-casio__center__mobile-bars">
                <span class="bars">
                    <i class="fa fa-bars"></i>
                    Menu
                </span>
            </div>
        </div>

        <form action="#" class="navbar-casio__center__search" method="POST">
        @csrf

        <!-- Please pass the data at both selec / option and the code below  -->
            <select name="cata" id="cata">
                <option value="Value">Value</option>
            </select>

            <!-- Data synchronization for 2 components (Above, Below) -->

            <div class="navbar-casio__center__select">
                <button type="button" class="navbar-casio__center__select-btn">Tất cả danh mục <i
                        class="fa fa-chevron-up"></i></button>
                <ul class="navbar-casio__center__list">
                    <li class="navbar-casio__center__option">Tất cả danh mục</li>

                    <li class="navbar-casio__center__option"><a href="#">G-Shock</a></li>
                    <li class="navbar-casio__center__option"><a href="#">G-QUARD</a></li>
                    <li class="navbar-casio__center__option"><a href="#">G-KEI</a></li>
                    <li class="navbar-casio__center__option"><a href="#">G-KEI</a></li>
                    <li class="navbar-casio__center__option"><a href="#">G-KEI</a></li>
                    <li class="navbar-casio__center__option"><a href="#">G-KEI</a></li>
                    <li class="navbar-casio__center__option"><a href="#">G-KEI</a></li>
                    <li class="navbar-casio__center__option"><a href="#">G-KEI</a></li>
                    <li class="navbar-casio__center__option"><a href="#">G-KEI</a></li>
                    <li class="navbar-casio__center__option"><a href="#">G-KEI</a></li>
                </ul>

                <div class="navbar-casio__center__box-search">
                    <input type="text" class="navbar-casio__center__search-entry" placeholder="Tên sản phẩm...">
                    <button type="submit" class="navbar-casio__center__btn-search"><i class="fa fa-search"></i></button>
                </div>
                <!-- this script to open catalog -->
                <script>
                    let open = false;
                    document.querySelector(".navbar-casio__center__select-btn").addEventListener("click", () => {
                        open = !open;
                        let navbarListCata = document.querySelector(".navbar-casio__center__list")

                        if (open) {
                            navbarListCata.classList.add("navbar-casio__center__select--open");
                        } else {
                            navbarListCata.classList.remove("navbar-casio__center__select--open");
                        }
                    })
                </script>
                <!-- this script to open catalog -->
            </div>
            <!-- Please pass the data at both selec / option and the code below  -->
        </form>
    </div>
    <!-- Header Center -->

    <!-- Header Navigation -->
    <nav class="navbar-casio__navigation">
        <ul class="lists">
            @foreach(App\Models\Menu::select('id','title','link','sort')->where('parentid',0)->where('mid',1)->where('status', 1)->orderBy('weight', 'asc')->get() as $item)
            <li>
                <a class="navbar-casio__navigation__item" href="https://casio.anhkhue.com{{$item->link}}">
                    {{$item->title}}


                </a>
                @if(strcasecmp($item->title,'Sản phẩm') == 0)
                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                    <div class="navbar-casio__navigation__submenus multiple-items">
                        <!-- Mega Menu -->
                        @foreach(\App\Models\Menu::select('id','title', 'link')->where('parentid',$item->id)->orderBy('id','asc')->get() as $productsItem)
                            <ul class="submenus">
                                <li class="active"><a href="https://casio.anhkhue.com{!!$productsItem->link!!}"><b>{{$productsItem->title}}</b></a></li>

                                @foreach(\App\Models\Menu::select('id','title', 'link')->where('parentid',$productsItem->id)->orderBy('id','asc')->limit(4)->get() as $productItem)
                                    <li><a class="text-dark" href="https://casio.anhkhue.com{!!$productItem->link!!}">{{$productItem->title}}</a></li>
                                @endforeach
                            </ul>

                        @endforeach
                    </div>
                @endif
                @if(strcasecmp($item->title,'Tin Tức') == 0)
                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                    <div class="navbar-casio__navigation__submenus single-items">
                        <ul class="submenus">
                            @foreach(\App\Models\Menu::select('title', 'link')->where('parentid',$item->id)->get() as $newsCat)
                            <li><a href="https://casio.anhkhue.com{{$newsCat->link}}"><b>{{$newsCat->title}}</b></a></li>

                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(strcasecmp($item->title,'Sản phẩm khác') == 0)
                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                    <div class="navbar-casio__navigation__submenus single-items">
                        <ul class="submenus">
                            @foreach(\App\Models\Menu::select('title','link')->where('parentid',$item->id)->get() as $newsCat)
                                <li><a href="https://casio.anhkhue.com{{$newsCat->link}}"><b>{{$newsCat->title}}</b></a></li>
                            @endforeach
                        </ul>
                    </div>

                @endif
                @if(strcasecmp($item->title,'Liên Hệ') == 0)
                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                    <div class="navbar-casio__navigation__submenus single-items">
                        <ul class="submenus">
                            @foreach(\App\Models\Menu::select('title','link')->where('parentid',$item->id)->get() as $newsCat)
                                <li><a href="https://casio.anhkhue.com{{$newsCat->link}}"><b>{{$newsCat->title}}</b></a></li>

                            @endforeach
                        </ul>
                    </div>

                @endif
            </li>
            @endforeach
            <a class="navbar-casio__topbar__phone" href="tel:0934003403">
                <em class="fa fa-phone"></em> <span style="font-size: 18px">0934 003 403</span>
            </a>
        </ul>
    </nav>

<!-- Aside navigation -->
    <aside class="navbar-casio__aside-navigation">
        <ul class="lists lists-mobile">
            @foreach(App\Models\Menu::select('id','title','link','sort')->where('parentid',0)->where('mid',1)->where('status', 1)->orderBy('weight', 'asc')->get() as $item)
            <li>
                <a class="navbar-casio__navigation__item" href="
                @if($item->link == '#')
                    {{$item->link}}
                @else
                    https://casio.anhkhue.com{{$item->link}}
                @endif

                    ">
                    {{$item->title}}
                </a>
                @if(strcasecmp($item->title,'Liên Hệ') == 0)
                    <i class="fa fa-angle-down text-dark" aria-hidden="true"></i>
                    <div class="navbar-casio__navigation__submenus single-items">
                        <ul class="submenus">
                            @foreach(\App\Models\Menu::select('title','link')->where('parentid',$item->id)->get() as $newsCat)
                                <li><a href="https://casio.anhkhue.com{{$newsCat->link}}"><b>{{$newsCat->title}}</b></a></li>
                            @endforeach
                        </ul>
                    </div>

                @endif
                @if(strcasecmp($item->title,'Sản phẩm') == 0)
                    <i class="fa fa-angle-down text-dark" aria-hidden="true"></i>
                    <div class="navbar-casio__navigation__submenus multiple-items">
                        <!-- Mega Menu -->
                        @foreach(\App\Models\Menu::select('id','title', 'link')->where('parentid',$item->id)->orderBy('id','asc')->get() as $productsItem)
                            <ul class="submenus">
                                <li class="active"><a href="https://casio.anhkhue.com{!!$productsItem->link!!}"><b>{{$productsItem->title}}</b></a></li>
                                @foreach(\App\Models\Menu::select('id','title', 'link')->where('parentid',$productsItem->id)->orderBy('id','asc')->limit(4)->get() as $productItem)
                                    <li><a class="text-dark" href="https://casio.anhkhue.com{!!$productItem->link!!}">{{$productItem->title}}</a></li>
                                @endforeach
                            </ul>

                        @endforeach
                    </div>
                @endif
                @if(strcasecmp($item->title,'Sản phẩm khác') == 0)
                    <i class="fa fa-angle-down text-dark" aria-hidden="true"></i>
                    <div class="navbar-casio__navigation__submenus single-items">
                        <ul class="submenus">
                            @foreach(\App\Models\Menu::select('title','link')->where('parentid',$item->id)->get() as $newsCat)
                                <li><a href="https://casio.anhkhue.com{{$newsCat->link}}"><b>{{$newsCat->title}}</b></a></li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </li>

            @endforeach

        </ul>
    </aside>
    <!-- Aside navigation -->
</header>
<script>
    let $vanillaJS = document.querySelector.bind(document);
    let $$vanillaJS = document.querySelectorAll.bind(document);
    // handle scroll menu
    window.addEventListener("scroll", () => {
        let casioNavbar = $vanillaJS(".navbar-casio");
        if (casioNavbar.clientHeight < window.pageYOffset) {
            // sticky
            casioNavbar.classList.add("navbar-casio--sticky")
        } else {
            // no sticky
            casioNavbar.classList.remove("navbar-casio--sticky")
        }
    })

    // handle open navigation mobile
    window.addEventListener("DOMContentLoaded", () => {
        let aside = {active: false};
        let bars = $vanillaJS(".navbar-casio__center__mobile-bars");
        let aside_navigation_mobile = $vanillaJS(".navbar-casio__aside-navigation");
        let aside_list_mobile = $vanillaJS(".lists-mobile");

        // active overlay, navigation mobile
        function activeItemAside(status_active) {
            if (status_active) {
                aside_navigation_mobile.classList.add("navbar-casio__aside--overlay");
                aside_list_mobile.classList.add("navbar-casio__aside--active");
            } else {
                aside_navigation_mobile.classList.remove("navbar-casio__aside--overlay");
                aside_list_mobile.classList.remove("navbar-casio__aside--active");
            }
        }

        bars.addEventListener("click", () => {
            aside.active = !aside.active; // !active
            activeItemAside(aside.active);
        })

        // layer overlay, to click to turn off active
        aside_navigation_mobile.addEventListener("click", (e) => {
            // not constain this className
            if (e.target.classList.contains("navbar-casio__aside--overlay")) {
                aside.active = !aside.active; // !active
                activeItemAside(aside.active);
            }
        })
    })
</script>