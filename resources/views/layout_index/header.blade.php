<header>
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <span class="ph-number"><i class="fa fa-truck"></i> {{ __('free ship') }} </span>
                </div>
                <div class="col-md-5 ">
                    <span style="float: left;" class="ph-number"><i class="fa fa-phone"></i> {{ __('phone') }}: 0383 379 990</span>
                </div>
                <div class="col-md-4">
                    <div style="float: right; padding: 3%">
                        <a href="{!! route('user.language', ['en']) !!}">
                            <img src="{{ asset('images/icon/tienganh.png') }}" height="30px" width="30px">
                        </a>
                        <a href="{!! route('user.language', ['vi']) !!}">
                            <img src="{{ asset('images/icon/tiengviet.png') }}" height="30px" width="30px">
                        </a>
                    </div>&nbsp;
                    @if (Auth::check())
                    @if (Auth::user()->id_role == 1 || Auth::user()->id_role == 2)
                    <div class="dropdown" style="float: right;">
                        <button class="dropbtn"><i class="fa fa-user-circle"></i>&nbsp;{{ Auth::user()->full_name }} </button>
                        <div class="dropdown-content">
                            <a href="{{ route('admin') }}">{{ __('Information') }}</a>
                            <a href="{{ url('logout') }}">{{ __('logout') }}</a>
                        </div>
                    </div>
                    @else
                    <div class="dropdown"style="float: right;">
                        <button class="dropbtn" ><i class="fa fa-user-circle"></i>&nbsp;{{ Auth::user()->full_name }}</button>
                        <div class="dropdown-content">
                            <a href="{{ route('info',Auth::user()->id) }}">{{ __('Information') }}</a>
                            <a href="{{ url('logout') }}">{{ __('logout') }}</a>
                        </div>
                    </div>
                    @endif
                    @else
                    <div class="dropdown" style="float: right">
                        <a href="{{ route('login') }}"><button class="dropbtn">{{ __('login') }}</button></a>
                    </div>
                    @endif
                </div>

            </div>

        </div>



    </div>
    <div class="main-menu">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div id="menu">
                        <ul class="navbar-nav ml-auto">
                            <li class="menu_item down"><a href="#"><i class="fa fa-bars"></i> {{ __('catelory') }}</a>
                                <div class="sub_menu">
                                    <div class="sub_menu_block" style="width:75px">
                                        <ul>
                                            @for($i = 0; $i < count($product_n); $i++) <li><a href="{{ route('product_type', $types_id[$i]) }}">{{ $types_name[$i] }} ({{ $product_n[$i] }})</a>
                            </li>
                            @endfor
                        </ul>
                    </div>
                </div>
                </li>
                <li class="menu_item down"><a href="{{ route('index') }}">{{ __('hompage') }}</a> </li>
                <li class="menu_item down"><a href="{{ route('introduce') }}">{{ __('introduce') }} </a></li>
                <li class="menu_item down"><a href="{{ route('news') }}">{{ __('newws') }}</a></li>
                <li class="menu_item down"><a href="{{ route('all_book') }}">{{ __('all') }}</a>
                    <div class="sub_menu">
                        <div class="sub_menu_block" style="width:25px">
                            <ul>
                                <li><a href="{{ route('allnew') }}">{{ __("newbook") }}</a>
                                </li>
                                <li><a href="{{ route('allsale') }}">{{ __("salebook") }}</a>
                                </li>
                                <li><a href="{{  route('allhighlights')  }}">{{ __("hotbook") }}</a>
                                </li>
                            </ul>

                        </div>
                    </div>
                </li>
                <li class="menu_item down"><a href="#"><i class="fa fa-bars"></i> {{ __('company') }}</a>
                    <div class="sub_menu">
                        <div class="sub_menu_block" style="width:50px">
                            <ul>
                                @foreach ($company as $com)
                                <li><a href="{{ route('product_company', $com->id) }}">{{ $com->name }}</a>
                                </li>
                                @endforeach
                            </ul>

                        </div>
                    </div>
                </li>
                </ul>

        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-left: 5%">
            <div class="cart my-2 my-lg-0">
                <a href="{{ route('cart') }}">
                    <span><i class="fa fa-shopping-cart" aria-hidden="true"></i></span></a>
                <span class="quntity">
                    @if (Session::has('cart'))
                    {{ Session('cart')->totalQty }}@else 0
                    @endif
                </span>
            </div>
            <form class="form-inline my-2 my-lg-0" role="search" method="get" id="searchform" action="{{ route('search') }}">
                <input class="form-control mr-sm-2" type="text" value="" name="key" id="s" placeholder="Nhập từ khóa..." autocomplete="off" />
                <span class="fa fa-search"></span>
            </form>
        </div>
        </nav>
    </div>
    </div>
</header>