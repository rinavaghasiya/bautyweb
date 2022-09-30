@extends('Client.header_footer')
@section('title')
Home
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
                            <span class="query-info query-success">Posts</span>
                        </div>
                        @foreach($data as $image)
                        <div class="blog-posts hfeed index-post-wrap">
                            <article class="blog-post hentry index-post post-0">
                            @php $a = explode(",",$image->item_img); @endphp
                                 @foreach($a as $b)
                                <a class="entry-image-wrap is-image" href="{{ url('pages') }}/{{ $image->id }}" title="{{ url('item_img') }}/{{ $b }} "><img src="{{ url('item_img') }}/{{ $b }}" alt="">
                                </a>@endforeach

                                <div class="entry-header">
                                    <span class="entry-category">{{$image->cname}}</span>
                                   
                                    <h2 class="entry-title"><a class="entry-title-link" href="{{ url('pages') }}/{{ $image->id }}" rel="bookmark">{{$image->title}} </a></h2>
                                    <?php $desdata= nl2br($image->description);?>
                                        <p class="entry-excerpt excerpt">
                                            {!! (Str::words($desdata,40)) !!}
                                            {{-- {!! (nl2br(e(Str::words($image->description, '25')))) !!} --}}
                                        </p>
                                    
                                    <div class="entry-meta">
                                        <span class="entry-author mi"><span class="by sp">by</span><span class="author-name">Manavprabha</span></span>
                                        <span class="entry-time mi"><span class="sp">-</span><time class="published" datetime="2021-03-22T12:57:00+05:30">{{ \Carbon\Carbon::parse ($image->created_at)->format('M d ,Y')}}</time></span>
                                    </div>
                                </div>
                            </article>
                           
                        </div>
                        @endforeach
                        <div class="pagination-bar text-center" style="float: right;">
                        <nav aria-label="Page navigation" class="d-inline-b">
                            <ul class="pagination" role="navigation">
                                <li class="page-item active">{{$data->appends(\Request::except('_token'))->render() }}</li>
                            </ul>
                        </nav>
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
                        <script async="async" data-ad-client="ca-app-pub-3940256099942544/6300978111" src="{{URL::asset('assests/client/pagead2.googlesyndication.com/pagead/js/f.txt')}}"></script>
                    </div>
                </div>

                <div class="widget PopularPosts" data-version="2" id="PopularPosts2">
                    <div class="widget-title title-wrap">
                        <h3 class="title">Popular Posts</h3>
                    </div>
                    <div class="widget-content default-items">
                    {{-- @foreach($product as $popular)
                        <div class="default-item card-style item-0">
                        @php $a = explode(",",$popular->item_img); @endphp
                            @foreach($a as $b)
                            <a class="entry-image-wrap before-mask is-image" href="{{ url('pages') }}/{{ $popular->id }}" > <img src="{{ url('item_img') }}/{{ $b }}" alt="">
                            </a>@endforeach
                            
                            <div class="entry-header entry-info">
                                <span class="entry-category">{{$popular->cname}}</span>
                                <h2 class="entry-title"><a href="{{ url('pages') }}/{{ $popular->id }}">{{$popular->title}} </a></h2>
                                <div class="entry-meta"><span class="entry-author mi"><span class="sp">by</span><span class="author-name">Felicity Yoga</span></span><span class="entry-time mi"><span class="sp">-</span><time class="published" >{{ \Carbon\Carbon::parse ($popular->created_at)->format('M d ,Y')}}</time></span>
                                </div>
                            </div>
                        </div>
                        @endforeach --}}
                        <?php $product=App\Product::orderBy('id','desc')->LIMIT(5)->get(); ?>
                        @foreach($product as $post)
                        <div class="default-item item-1">
                        @php $a = explode(",",$post->item_img); @endphp
                                 @foreach($a as $b)
                            <a class="entry-image-wrap is-image" href="{{ url('pages') }}/{{ $post->id }}"><img src="{{ url('item_img') }}/{{ $b }}" alt="">
                            </a>@endforeach
                            <div class="entry-header">
                                <h2 class="entry-title"><a href="{{ url('pages') }}/{{ $post->id }}">{{$post->title}}</a></h2>
                                <div class="entry-meta"><span class="entry-time mi"><time class="published">{{ \Carbon\Carbon::parse ($post->created_at)->format('M d ,Y')}}</time></span></div>
                            </div>
                        </div>
                        @endforeach
                      
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
                <div class="widget ReportAbuse" data-version="2" id="ReportAbuse1">
                    <h3 class="title">
                        <a class="report_abuse" href="https://www.blogger.com/go/report-abuse" rel="noopener nofollow" target="_blank">
                            Report Abuse
                        </a>
                    </h3>
                </div>
                <div class="widget FeaturedPost" data-version="2" id="FeaturedPost1">
                    <div class="widget-content">
                    <script async="async" data-ad-client="ca-app-pub-3940256099942544/6300978111" src="{{URL::asset('assests/client/pagead2.googlesyndication.com/pagead/js/f.txt')}}"></script>
                    </div>
                </div>
                <!-- <div class="widget BlogSearch" data-version="2" id="BlogSearch1">
                    <div class="widget-content search-widget">
                        <form action="http://www.FelicityYoga.in/search" class="search-form" target="_top">
                            <input ariby="Search This Blog" autocomplete="off" class="search-input" name="q" placeholder="Search This Blog" type="search" value="">
                            <button class="search-action btn" type="submit" value=""></button>
                        </form>
                    </div>
                </div> -->
               
                <div class="widget PageList" data-version="2" id="PageList1">
                    <div class="widget-title title-wrap">
                        <h3 class="title">MAIN MENU</h3>
                    </div>
                    <div class="widget-content">
                        <ul class="list-style">
                            <!-- <li>
                                <a href="http://www.FelicityYoga.in/search/label/जीवन शैली">जीवन शैली</a>
                            </li> -->
                            <li>
                                <a href="{{url('/')}}">Home</a>
                            </li>
                            <li>
                                <a href="{{url('contact')}}">Contact Us</a>
                            </li>
                            <li>
                                <a href="http://www.FelicityYoga.in/p/privacy-policy.html">Privacy Policy</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>
    </div>
</div>
@endsection