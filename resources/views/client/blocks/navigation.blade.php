   <div class="site-wrap">
       <div class="site-mobile-menu site-navbar-target">
           <div class="site-mobile-menu-header">
               <div class="site-mobile-menu-close mt-3">
                   <span class="icon-close2 js-menu-toggle"></span>
               </div>
           </div>
           <div class="site-mobile-menu-body"></div>
       </div> <!-- .site-mobile-menu -->
       <!-- NAVBAR -->
       <header class="site-navbar mt-3">
           <div class="container-fluid">
               <div class="row align-items-center">
                   <div class="site-logo col-6"><a href="{{ route('client.index') }}">JobBoard</a></div>

                   <nav class="mx-auto site-navigation">
                       <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
                           <li><a href="{{ route('client.index') }}" class="nav-link active">Home</a></li>
                           <li><a href="{{ route('client.about') }}">About</a></li>
                           <li class="has-children">
                               <a href="{{ route('client.service') }}">Pages</a>
                               <ul class="dropdown">
                                   <li><a href="{{ route('client.service') }}">Services</a></li>
                                   <li><a href="{{ route('client.service_single') }}">Service Single</a></li>
                                   <li><a href="{{ route('client.blog_single') }}">Blog Single</a></li>
                                   <li><a href="{{ route('client.portfolio') }}">Portfolio</a></li>
                                   <li><a href="{{ route('client.portfolio_single') }}">Portfolio Single</a></li>
                                   <li><a href="{{ route('client.testimonials') }}">Testimonials</a></li>
                                   <li><a href="{{ route('client.faq') }}">Frequently Ask Questions</a></li>
                                   <li><a href="{{ route('client.gallery') }}">Gallery</a></li>
                               </ul>
                           </li>
                           <li><a href="{{ route('client.blog') }}">Blog</a></li>
                           <li><a href="{{ route('client.contact') }}">Contact</a></li>
                           @if (Auth::check() && Auth::user()->role == 'employer')
                               <li class="d-lg-none"><a href="{{ route('client.post_job') }}"><span
                                           class="mr-2">+</span>Post a Job</a>
                               </li>
                           @else
                           @endif

                           @if (!Auth::check())
                               <li class="d-lg-none"><a href="{{ route('login') }}">Log In</a></li>
                           @endif
                       </ul>
                   </nav>

                   <div class="right-cta-menu text-right d-flex align-items-center col-6 justify-content-end">
                       @if (Auth::check())
                           @if (Auth::user()->role == 'employer')
                               <a href="{{ route('client.post_job') }}"
                                   class="btn btn-outline-white border-width-2 mr-3d-none d-lg-inline-block">
                                   <span class="mr-2 icon-add"></span>Post a Job
                               </a>
                               @elseif (Auth::user()->role == 'admin')
                                   <a href="{{ route('admin.job-chart') }}"
                                   class="btn btn-outline-white border-width-2 mr-3d-none d-lg-inline-block">
                                   <span class="mr-2"></span>Admin
                               </a>
                           @endif
                           <div class="dropdown show">
                               <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                   id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                   aria-expanded="false">
                                   Chào, {{ Auth::user()->name }} <i class="fa fa-caret-down" aria-hidden="true"></i>
                               </a>
                               <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                   <form action="{{ route('logout') }}" method="POST">
                                       @csrf
                                       <button type="submit" class="dropdown-item">Log Out</button>
                                   </form>
                                   <a class="dropdown-item" href="{{ route('client.profile') }}">Profile</a>
                                   @if (Auth::user()->role == 'candidate')
                                       <a class="dropdown-item" href="{{ route('client.favorites') }}">Favorites</a>
                                   @endif
                               </div>
                           </div>
                       @else
                           <a href="{{ route('client.post_job') }}"
                               class="btn btn-outline-white border-width-2 mr-3 {{ Auth::check() ? 'd-none d-lg-inline-block' : 'd-none' }}">
                               <span class="mr-2 icon-add"></span>Post a Job
                           </a>
                           <a href="{{ route('login') }}"
                               class="btn btn-primary border-width-2 d-none d-lg-inline-block">
                               <span class="mr-2 icon-lock_outline"></span>Log In
                           </a>
                       @endif

                       <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3">
                           <span class="icon-menu h3 m-0 p-0 mt-2"></span>
                       </a>
                   </div>
               </div>
           </div>
       </header>
