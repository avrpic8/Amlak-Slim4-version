@extends('app.layout.app')

@section('head')
    <title>پست </title>
@endsection

@section('content')

    <div class="hero-wrap" style="background-image: url({{asset('images/bg_1.jpg')}});">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span
                                class="mr-2"><a href="{{route('home.index')}}">خانه</a></span> <span class="mr-2"><a
                                    href="{{route('home.all.posts')}}">بلاگ </a></span>
                        <span>{{$post->title}}</span></p>
                    <h1 class="mb-3 bread">بلاگ</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section ftco-degree-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 ftco-animate">
                    <h2 class="mb-3">{{$post->title}}</h2>
                    <img src="{{asset($post->image)}}" class="img-fluid mb-4">
                    <p>{{html_entity_decode($post->body)}}</p>
                    <div class="pt-5 mt-5">
                        <h3 class="mb-5">نظرات</h3>
                        <div class="comment-widgets m-b-20">
                            <?php foreach ($comments as $comment){?>
                                <div class="d-flex flex-row comment-row">
                                    <div class="p-2">
                                        <span class="round"><img src="{{asset($comment->user()->value('avatar'))}}" alt="user" width="50">
                                        </span>
                                    </div>
                                    <div class="comment-text w-100">
                                        <h5>{{$comment->user()->value('first_name').' '.$comment->user()->value('last_name')}}</h5>
                                        <div class="comment-footer"> <span class="date"><?=\Morilog\Jalali\Jalalian::forge($comment->created_at)->format('%B %d، %Y')?></span></div>
                                        <p class="m-b-5 m-t-10">{{$comment->comment}}</p>
                                    </div>
                                </div>
                            <?php }?>
                        </div>
                        <!-- END comment-list -->

                        <?php if(\System\Auth\Auth::checkLogin()){ ?>
                            <div class="comment-form-wrap pt-5">
                                <h3 class="mb-5">درج نظر</h3>
                                <form action="{{route('home.post.comment', ['id'=>$post->id])}}" class="p-5 bg-light" method="post">
                                    <div class="form-group">
                                        <label for="message">پیام</label>
                                        <textarea name="comment" id="message" cols="30" rows="10"
                                                  class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="ارسال نطر" class="btn py-3 px-4 btn-primary">
                                    </div>

                                </form>
                            </div>
                        <?php }else{?>
                            <div class="alert alert-danger mt-5">
                                <p class="m-0">برای درج نظر باید ابتدا وارد حساب خود شوید</p>
                            </div>
                        <?php }?>
                    </div>
                </div> <!-- .col-md-8 -->
                <div class="col-lg-4 sidebar ftco-animate">

                    <div class="sidebar-box ftco-animate">
                        <div class="categories">
                            <h3>دسته بندی ها</h3>
                            @foreach($categories as $category)
                                <li>
                                    <a href="{{route('home.category', ['id'=>$category->id])}}">{{$category->name}}
                                        <span>{{count($category->ads()->get())}}</span>
                                    </a>
                                </li>
                            @endforeach
                        </div>
                    </div>

                    <div class="sidebar-box ftco-animate">
                        <h3>اخرین بلاگ ها</h3>
                        <?php foreach($posts as $post) { ?>
                            <div class="block-21 mb-4 d-flex">
                                <a class="blog-img mr-4" style="background-image: url('<?= asset($post->image) ?>');"></a>
                                <div class="text">
                                    <h3 class="heading"><a href="#"><?= $post->title ?></a></h3>
                                    <div class="meta">
                                        <div><a href="#"><span class="icon-calendar"></span><?= \Morilog\Jalali\Jalalian::forge($post->created_at)->format('%B %d، %Y')?></a></div>
                                        <div><a href="#"><span class="icon-person"></span> <?= $post->user()->value('first_name') . ' ' . $post->user()->value('last_name') ?></a></div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
