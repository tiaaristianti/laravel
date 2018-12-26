<!-- Preloader section
================================================== -->
<div class="preloader">

	<div class="sk-spinner sk-spinner-pulse"></div>

</div>


<!-- Navigation section
================================================== -->
<div class="nav-container">
    <nav class="nav-inner transparent">

        <div class="navbar">
            <div class="container">
                <div class="row">
                    <div class="brand">
                        <a href="{{url('/tampilan')}}">
                            <img src="images/logo.png">
                        </a>
                    </div>

                    <div class="navicon">
                        <div class="menu-web">
                            <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                         <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
            </li>
                            </ul>
                        </div>

                        <div class="menu-container">
                            <ul class="navmenu">
                            <div class="circle dark inline">
                                <i class="icon ion-navicon"></i>
                            </div>

                            <div class="list-menu">
                                <i class="icon ion-close-round close-iframe"></i>
                                <div class="intro-inner">
                                    <ul id="nav-menu">
                                        <li><a href="">Home</a></li>
                                        <li><a href="about.html">About</a></li>
                                        <li><a href="blog.html">Blog</a></li>
                                        <li><a href="contact.html">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>