<header id="header">

    <div id="topbar">
        <div class="container">
            <div class="social-links">
                <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
            </div>
        </div>
    </div>

    <div class="container">

        <div class="logo float-left">
            <!-- Uncomment below if you prefer to use an image logo -->
            <h1 class="text-light"><a href="#intro" class="scrollto"><span>Rapid</span></a></h1>
            <!-- <a href="#header" class="scrollto"><img src="img/logo.png" alt="" class="img-fluid"></a> -->
        </div>

        <nav class="main-nav float-right d-none d-lg-block">
            <ul>
                @if(!Auth::guest())
                    <li>
                        <a>
                            خوش آمدید کاربر
                            <span style="color: red">{{auth()->user()->name}}</span>
                        </a>
                    </li>
                @endif
                <li class="active"><a href="{{route('index')}}">خانه</a></li>
                <li><a href="#about">درباره ما</a></li>
                <li><a href="{{route('front.articles')}}">مطالب</a></li>
                <li><a href="#services">خدمات</a></li>
                <li><a href="#portfolio">نمونه کارها</a></li>
                <li><a href="#team">تیم</a></li>
                <li class="drop-down"><a>عضویت در سایت</a>
                    <ul>
                        @if(Auth::guest())
                            <li><a href="{{route('register')}}">ثبت نام</a></li>
                            <li><a href="{{route('login')}}">ورود</a></li>
                        @endif
                        @if(!Auth::guest())
                            <li>
                                <form action="{{route('logout')}}" method="post">
                                    @csrf
                                    <a style="cursor:pointer;" onclick="submitForm()">خروج</a>
                                </form>
                            </li>
                            <script>
                                function submitForm() {
                                    $('form').submit();
                                }
                            </script>
                            <li><a href="{{route('ProfileUser',auth()->user()->id)}}">پروفایل کاربری</a></li>
                            @if(Auth::user()->role==1)
                                <li><a href="{{route('admin.users')}}">پنل مدریت</a></li>
                                <l><a style="color: red">((مدیر سایت))</a></l>
                            @endif
                        @endif
                    </ul>
                </li>
                <li><a href="#footer">ارتباط با ما</a></li>
            </ul>
        </nav><!-- .main-nav -->

    </div>
</header><!-- #header -->
