@extends('admin.layouts.app')

@section('head')

    <title>ادمین | کامنت</title>
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
                            <h4 class="card-title">نظرات</h4>
                            <span><a href="#" class="btn btn-success disabled">ایجاد</a></span>
                        </div>
                        <div class="card-content">
                            <div class="card-body card-dashboard">

                                <div class="">
                                    <table class="table zero-configuration">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>کاربر</th>
                                            <th>نظر</th>
                                            <th>وضعیت</th>
                                            <th>تنظیمات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($comments as $comment)
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">{{$comment->id}}</td>
                                                <td>{{$comment->user()->value('first_name') .' '. $comment->user()->value('last_name')}}</td>
                                                <td>{{$comment->comment}}</td>
                                                <td><?= $comment->approved == 0 ? '<span class="text-danger">در انتظار تایید</span>' : '<span class="text-success">تایید شده</class>' ?></td>
                                                <td>
                                                    <a href="{{route('admin.comment.show', ['id'=> $comment->id])}}"
                                                       class="btn btn-success waves-effect waves-light">نمایش</a>
                                                    @if($comment->approved == 0)
                                                        <a href="<?= route('admin.comment.approved', ['id'=>
                                                            $comment->id]) ?>" class="btn btn-warning">تائید</a>
                                                    @endif
                                                    @if($comment->approved == 1)
                                                        <a href="<?= route('admin.comment.approved', ['id'=>$comment->id]) ?>" class="btn btn-danger">لغو تایید</a>
                                                    @endif
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
