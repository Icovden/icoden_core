@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
    <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#page_create">Create Page</button> <br><br>
    <div class="card">
        <table class="table">
            <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Created at</th>
            </tr>
            </thead>
            <tbody>

            @foreach($pages as $page)
                <tr>
                    <td>{{$page->title}}</td>
                    <td>{{$page->description}}</td>
                    <td>{{$page->created_at}}</td>
                    <td class="btn-td"><div class="btn-group" role="group" aria-label="User Actions">
                            <a href="http://127.0.0.1:8000/admin/auth/user/1" data-toggle="tooltip" data-placement="top" title="" class="btn btn-info" data-original-title="View">
                                <i class="fas fa-eye"></i>
                            </a>

                            <a href="http://127.0.0.1:8000/admin/auth/user/1/edit" data-toggle="tooltip" data-placement="top" title="" class="btn btn-primary" data-original-title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <div class="btn-group btn-group-sm" role="group">
                                <button id="userActions" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    More
                                </button>
                                <div class="dropdown-menu" aria-labelledby="userActions">

                                    <a href="http://127.0.0.1:8000/admin/auth/user/1/password/change" class="dropdown-item">Change Password</a>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
        @if(count($pages) == 0)
            <h2 style="text-align: center;color: #969696;font-size: 23px;padding: 13px;">Pages Data not found</h2>
        @else

        @endif
    </div>
    <script>
        CKEDITOR.replace('blog_body', {
            filebrowserUploadUrl: "{{route('admin.upload_images', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endsection
