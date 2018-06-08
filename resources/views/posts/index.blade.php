@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Posts CRUD</h2>
            </div>
            <div class="pull-right">
                @permission('post-create')
                <a class="btn btn-success" href="{{ route('posts.create') }}"> Create New Post</a>
                @endpermission
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>User Name</th>
            <th>Post Title</th>
            <th>Category Name</th>
            <th>Publish date</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($posts as $key => $post)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{\Illuminate\Support\Facades\Auth::user()->username}}</td>
                <td>{{ $post->post_title }}</td>
                <td>{{ \App\Category::find($post->id)->category}}</td>
                <td>{{date('M j, Y H:i',strtotime($post->updated_at))}}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('posts.show',$post->id) }}">Show</a>
                    @permission('post-edit')
                    <a class="btn btn-primary" href="{{ route('posts.edit',$post->id) }}">Edit</a>
                    @endpermission
                    @permission('post-delete')
                    {!! Form::open(['method' => 'DELETE','route' => ['posts.destroy', $post->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                    @endpermission
                </td>
            </tr>
        @endforeach
    </table>
    {!! $posts->render() !!}
@endsection