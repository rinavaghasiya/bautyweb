@extends('Client.header_footer')
@section('title')
    Home
@endsection

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="7u5iW2qW9_66JYKOxaoRNlhDe0FFNzSBjfPzXWLx9QE" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

@section('body')

    <style>
        .widget iframe,
        .widget img {
            max-width: 100%;
        }
        a img {
            border: 0;
        }
        body{
            background: #f1f1f1;
        }
    </style>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    </ol>
    <div class="carousel-inner">
        <?php $productslider=App\Product::orderBy('id','desc')->LIMIT(5)->get(); ?>
        @foreach($productslider as $key => $slider)
        <div class="carousel-item {{$key == 0 ? 'active' : '' }}">

            @php $a = explode(",",$slider->item_img); @endphp
            @foreach ($a as $b)
                <img src="{{ url('item_img') }}/{{ $b }}" class="d-block w-100"  alt="..."> 
                <h1 class="carousel_h1">{{ $slider->title }}</h1>
            @endforeach

           
        </div>
        @endforeach
    </div>
</div>


    <div class="flex-center" id="content-wrapper">
        <div class="container row-x1">
            <main id="main-wrapper">
                <div class="main section" id="main" name="Main Posts">
                    <div class="widget Blog" data-version="2" id="Blog1" >
                        <div class="blog-posts-wrap">
                            <div class="queryMessage">
                                <span class="query-info query-success">Posts</span>
                            </div>

                            @foreach ($data as $image)
                                <div class="blog-posts hfeed index-post-wrap margin-my-3">
                                    <article class="blog-post hentry index-post post-0">
                                        @php $a = explode(",",$image->item_img); @endphp
                                        @foreach ($a as $b)
                                            <a class="entry-image-wrap is-image"
                                                href="{{ url('pages') }}/{{ $image->id }}"
                                                title="{{ $image->title }}">
                                                <img src="{{ url('item_img') }}/{{ $b }}" alt="" style="border-radius: 5px;">
                                            </a>
                                        @endforeach

                                        <div class="entry-header">
                                            <span class="entry-category">{{ $image->cname }}</span>

                                            <h2 class="entry-title"><a class="entry-title-link"
                                                    href="{{ url('pages') }}/{{ $image->id }}"
                                                    rel="bookmark">{{ $image->title }} </a></h2>

                                            {{-- <p class="entry-excerpt excerpt">{{ Str::limit($image->description, 150) }}
                                            </p> --}}


                                            {{-- <p class="entry-excerpt excerpt">{{ Str::limit(nl2br(e($image->description)),120) }}</p> --}}
                                 <p class="entry-excerpt excerpt">   {!!  substr(strip_tags($image->description), 0, 500) !!} </p>


                                            {{-- <?php $desdata= nl2br($image->description);?>
                                            <p class="entry-excerpt excerpt">
                                                {!! (Str::words($desdata,40)) !!}
                                            </p> --}}


                                            <div class="entry-meta">
                                                <span class="entry-author mi"><span class="by sp">by</span><span
                                                        class="author-name">{{$image->name}}</span></span>
                                                <span class="entry-time mi"><span class="sp">-</span><time
                                                        class="published"
                                                        datetime="2021-03-22T12:57:00+05:30">{{ \Carbon\Carbon::parse($image->created_at)->diffForHumans() }}</time></span>      
                                            </div>

                                        </div>
                                    </article>
                                </div>
                            @endforeach
                            <div class="pagination-bar text-center" style="float: right;margin-bottom: 1rem;">
                                <nav aria-label="Page navigation " class="d-inline-b">
                                    <ul class="pagination" role="navigation">
                                        <li class="page-item active">
                                            {{ $data->appends(\Request::except('_token'))->render('pagination::bootstrap-4') }}
                                        </li>
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
                    <div class="widget PopularPosts" data-version="2" id="PopularPosts2">
                        <div class="widget-title title-wrap">
                            <h3 class="title">Latest Posts</h3>
                        </div>
                        <div class="widget-content default-items">

                            <?php $product=App\Product::orderBy('id','desc')->LIMIT(6)->get(); ?>
                            @foreach ($product as $post)
                                <div class="default-item item-1">
                                    @php $a = explode(",",$post->item_img); @endphp
                                    @foreach ($a as $b)
                                        <a class="entry-image-wrap is-image"
                                            href="{{ url('pages') }}/{{ $post->id }}"><img
                                                src="{{ url('item_img') }}/{{ $b }}" alt="">
                                        </a>
                                    @endforeach
                                    <div class="entry-header">
                                        <h2 class="entry-title"><a
                                                href="{{ url('pages') }}/{{ $post->id }}">{{ $post->title }}</a>
                                        </h2>
                                        <div class="entry-meta"><span class="entry-time mi"><time
                                                    class="published">{{ \Carbon\Carbon::parse($post->created_at)->format('M d ,Y') }}</time></span>
                                        </div>
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
                                @foreach ($cat as $category)
                                    <li><a class="label-name btn"
                                            href="{{ url('product') }}/{{ $category->cname }}">{{ $category->cname }}</a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                    <div class="widget ReportAbuse" data-version="2" id="ReportAbuse1">
                        <h3 class="title">
                            <a class="report_abuse" href="https://www.blogger.com/go/report-abuse" rel="noopener nofollow"
                                target="_blank">
                                Report Abuse
                            </a>
                        </h3>
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
                               
                                <li>
                                    <a href="{{ url('/') }}">Home</a>
                                </li>
                                <li>
                                    <a href="{{ url('contact') }}">Contact Us</a>
                                </li>
                                <li>
                                    <a href="#">Privacy Policy</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script> --}}

@endsection
