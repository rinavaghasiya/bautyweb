@extends('Client.header_footer')
@section('title')
Show User
@endsection
@section('body')

<style>
    .widget iframe, .widget img {
    max-width: 100%;
}

a img {
    border: 0;
}
</style>

<div class="flex-center" id="content-wrapper">
    <div class="container row-x1">

        <main id="main-wrapper">
            <div class="main section" id="main" name="Main Posts">
                <div class="widget Blog" data-version="2" id="Blog1">
                    <div class="blog-posts-wrap">

                        <div class="queryMessage">
                           <span class="query-info query-success"> <h2>Contact Us</h2></span>
                        </div>
                        <div class="contactfill">
                            <h3>Manavprabha News Contact</h3>
                            <ul class="contactfillul">
                                <li class="contactfillli"><i class="fa-solid fa-house"></i> AB-111,Sarita Darshan Society,Diamond Hospital,Nana Varachha Road, Surat,395006.</li>
                                <li class="contactfillli"><i class="fa-solid fa-envelope"></i> manavprabhanews9968@gmail.com</li>
                                <li class="contactfillli"><i class="fa-solid fa-phone"></i> 9904023468</li>
                            </ul>
                        </div>


                    </div>
                    <script type="text/javascript">
                        var exportify = {
                            noTitle: "No title",
                            viewAll: "View all",
                            postAuthor: true,
                            postAuthorLabel: "by",
                            postDate: true,
                            postDateLabel: "-",
                            postLabels: true
                        }
                    </script>
                </div>
            </div>
        </main>

        <aside id="sidebar-wrapper">
            <div class="sidebar gnews-free-widget-ready section" id="sidebar" name="Sidebar">
                <div class="widget HTML" data-version="2" id="HTML9">
                    <div class="widget-content">
                        <script async="async" data-ad-client="ca-pub-7992862911707391" src="{{URL::asset('assests/client/pagead2.googlesyndication.com/pagead/js/f.txt')}}"></script>
                    </div>
                </div>


                <div class="widget Label" data-version="2" id="Label2">
                    <div class="widget-title title-wrap">
                        <h3 class="title">Main Tags</h3>
                    </div>
                    <div class="widget-content cloud-label">
                        <ul class="cloud-style">

                        <?php $cat = App\Category::get(); ?>
                        @foreach($cat as $category)
                        <li><a class="label-name btn" href="{{url('product')}}/{{$category->cname}}">{{$category->cname}}</a></li>
                        @endforeach

                        </ul>
                    </div>
                </div>

                <div class="widget FeaturedPost" data-version="2" id="FeaturedPost1">
                    <div class="widget-content">

                    </div>
                </div>

                <div class="widget PageList" data-version="2" id="PageList1">
                    <div class="widget-title title-wrap">
                        <h3 class="title">MAIN MENU</h3>
                    </div>
                    <div class="widget-content">
                        <ul class="list-style">

                            <li>
                                <a href="{{url('/')}}">Home</a>
                            </li>
                            <li>
                                <a href="{{url('contact')}}">Contact Us</a>
                            </li>
                            {{-- <li>
                                <a href="http://www.felicityyoga.in/p/privacy-policy.html">Privacy Policy</a>
                            </li> --}}
                        </ul>
                    </div>
                </div>
            </div>
        </aside>
    </div>
</div>
@endsection
