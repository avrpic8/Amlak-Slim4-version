@extends('admin.layouts.app')

@section('head')

    <title>ادمین | پست ها</title>
@endsection

@section('content')

    <div class="content-header row">
    </div>

    <div class="content-body">
        <!-- Zero configuration table -->
        <section id="basic-datatable">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">اخبار</h4>
                            <span><a href="{{route('admin.post.create')}}" class="btn btn-success">ایجاد</a></span>
                        </div>
                        <div class="card-content">
                            <div class="card-body card-dashboard">

                                <div class="">
                                    <table class="table zero-configuration">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>عنوان</th>
                                            <th>دسته</th>
                                            <th>نویسنده</th>
                                            <th>تصویر</th>
                                            <th style="min-width: 16rem; text-align: left;">تنظیمات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($posts as $post)
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">{{$post->id}}</td>
                                                <td>{{$post->title}}</td>
                                                <td>{{$post->category()->value('name')}}</td>
                                                <td>{{$post->user()->value('first_name') . ' ' . $post->user()->value
                                                ('last_name')}}</td>
                                                <td><img style="width: 90px;"
                                                         src="{{asset($post->image)}}" alt="">
                                                </td>
                                                <td style="min-width: 16rem; text-align: left;">
                                                    <a href="{{route('admin.post.edit', ['id'=> $post->id])}}"
                                                       class="btn btn-info waves-effect waves-light">ویرایش</a>
                                                    <form class="d-inline"
                                                          action="{{route('admin.post.delete', ['id'=> $post->id])}}"
                                                          method="post">
                                                        <input type="hidden" name="_method" value="delete">
                                                        <button type="submit"
                                                                class="btn btn-danger waves-effect waves-light">حذف
                                                        </button>
                                                    </form>
                                                    <form class="d-inline"
                                                          action="{{route('admin.post.status', ['id'=> $post->id])}}"
                                                          method="post">
                                                        <button type="submit"
                                                                class="btn waves-effect waves-light {{$post->status ? 'btn-success' : 'btn-warning'}}">
                                                            {{$post->status ? 'فعال' : 'غیرفعال'}}
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--/ Zero configuration table -->
    </div>

@endsection