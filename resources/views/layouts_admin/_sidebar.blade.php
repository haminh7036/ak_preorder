<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li>
                    <a class="waves-effect waves-dark" href="{{ route('home') }}">
                        <i class="mdi mdi-gauge"></i>
                        <span class="hide-menu">@lang('layouts_admin.sidebar.dashboard')</span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect waves-dark" href="{{ route('registrants.index') }}">
                        <i class="mdi mdi-account-multiple"></i>
                        <span class="hide-menu">@lang('layouts_admin.sidebar.registrants')</span>
                    </a>
                </li>

                <li>
                    <a class="waves-effect waves-dark" href="{{ route('interviewers.index') }}">
                        <i class="mdi mdi-account-card-details"></i>
                        <span class="hide-menu">@lang('layouts_admin.sidebar.interviewer')</span>
                    </a>
                </li>
                <li>

                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-gauge"></i>

                        <span class="hide-menu">

                            @lang('layouts_admin.sidebar.landing_pages.slide-image')

                        </span>
                    </a>

                    <ul aria-expanded="false" class="collapse">

                        <li><a href="{{ route('pages.index') }}">@lang('layouts_admin.sidebar.landing_pages.pages')</a></li>

                        <li>
                            <a href="{{ route('slide-images.index') }}">
                                @lang('layouts_admin.sidebar.landing_pages.slide-image')
                            </a>
                        </li>

                        <li><a href="{{route('link-videos.index')}}">@lang('layouts_admin.sidebar.landing_pages.link-video')</a></li>

                        <li>
                            <a href="{{ route('posts.index') }}">
                                Posts
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('celebrity.index') }}">
                                Người nổi tiếng
                            </a>
                        </li>
                    </ul>

                </li>
                <li>

                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-gauge"></i>

                        <span class="hide-menu">

                            Preorder

                        </span>
                    </a>

                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('pre-order-page.index') }}">Trang Preorder</a></li>
                        <li><a href="{{ route('product.index') }}">Product</a></li>
                        <li><a href="{{ route('order.index') }}">Order</a></li>
                    </ul>

                </li>

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
