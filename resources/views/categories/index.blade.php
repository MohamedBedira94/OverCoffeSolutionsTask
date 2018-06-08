@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Categories Management</h2>
            </div>
            <div class="pull-right">
                @permission('category-create')
                <a class="btn btn-success" href="{{ route('categories.create') }}"> Create New Category</a>
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
            <th>Category Name</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($categories as $key => $category)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $category->category }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('categories.show',$category->id) }}">Show</a>
                    @permission('category-edit')
                    <a class="btn btn-primary" href="{{ route('categories.edit',$category->id) }}">Edit</a>
                    @endpermission
                    @permission('category-delete')
                    {!! Form::open(['method' => 'DELETE','route' => ['categories.destroy', $category->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                    @endpermission
                </td>
            </tr>
        @endforeach
    </table>
    {!! $categories->render() !!}
@endsection