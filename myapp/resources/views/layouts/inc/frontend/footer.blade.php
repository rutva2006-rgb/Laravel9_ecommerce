 <div>
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h4 class="footer-heading">{{ $appSetting->website_name ?? 'website_name'}}</h4>
                    <div class="footer-underline"></div>
                        <p>
                           Our goal is to make your shopping experience simple, secure, and enjoyable, with fast delivery and reliable service right to your doorstep.
                           Discover amazing deals, explore trusted brands, and shop with confidence every time you visit us.
                        </p>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Quick Links</h4>
                    <div class="footer-underline"></div>
                    <div class="mb-2"><a href="{{ '/' }}" class="text-white">Home</a></div>
                    <div class="mb-2"><a href="{{ '/about-us' }}" class="text-white">About Us</a></div>
                    <div class="mb-2"><a href="{{ '/contact-us' }}" class="text-white">Contact Us</a></div>
                    <div class="mb-2"><a href="{{ '/blogs' }}" class="text-white">Blogs</a></div>
                    <div class="mb-2"><a href="{{ '/' }}" class="text-white">Sitemaps</a></div>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Shop Now</h4>
                    <div class="footer-underline"></div>
                    <div class="mb-2"><a href="{{ '/collections' }}" class="text-white">Collections</a></div>
                    <div class="mb-2"><a href="{{ '/' }}" class="text-white">Trending Products</a></div>
                    <div class="mb-2"><a href="{{ '/new-arrivals' }}" class="text-white">New Arrivals Products</a></div>
                    <div class="mb-2"><a href="{{ '/featured-products' }}" class="text-white">Featured Products</a></div>
                    <div class="mb-2"><a href="{{ '/carts' }}" class="text-white">Cart</a></div>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Reach Us</h4>
                    <div class="footer-underline"></div>
                    <div class="mb-2">
                        <p>
                            <i class="fa fa-map-marker"></i>
                             {{ $appSetting->address ?? 'address'}}
                        </p>
                    </div>
                    <div class="mb-2">
                        <a href="" class="text-white">
                            <i class="fa fa-phone"></i>
                           {{ $appSetting->phone ?? 'phone 1'}}
                           {{ $appSetting->phone ?? 'phone 2'}}
                        </a>
                    </div>
                    <div class="mb-2">
                        <a href="" class="text-white">
                            <i class="fa fa-envelope"></i>
                            {{ $appSetting->email1 ?? 'email 1'}}
                            {{ $appSetting->email2 ?? 'email 2'}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <p class=""> 2025 - NewLOGO Ecommerce. All rights reserved.</p>
                </div>
                <div class="col-md-4">
                    <div class="social-media">
                        Get Connected:
                        @if($appSetting->facebook)
                            <a href="{{ $appSetting->facebook }}" target="_blank"><i class="fa fa-facebook"></i></a>
                        @endif
                        @if($appSetting->twitter)
                            <a href="{{ $appSetting->twitter }}" target="_blank"><i class="fa fa-twitter"></i></a>
                        @endif
                        @if($appSetting->instagram)
                            <a href="{{ $appSetting->instagram }}" target="_blank"><i class="fa fa-instagram"></i></a>
                        @endif
                        @if($appSetting->youtube)
                            <a href="{{ $appSetting->youtube }}" target="_blank"><i class="fa fa-youtube"></i></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
