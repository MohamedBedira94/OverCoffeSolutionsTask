@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create New Post</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back</a>
            </div>
        </div>
    </div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! Form::open(array('route' => 'posts.store','method'=>'POST')) !!}
    <div class="row">
        {!! Form::hidden('userid', $userid, array('placeholder' => 'UserID','class' => 'form-control','style')) !!}
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Post Title:</strong>
                {!! Form::text('post_title', null, array('placeholder' => 'Post Title','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Post Body:</strong>
                {!! Form::textarea('post_body', null, array('placeholder' => 'Post Body','class' => 'form-control','style'=>'height:300px')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
           <div class="form-group">
               <strong>Select Category:</strong>
       <select id="category_id" class="form-control m-bot15" name="category_id">

           @if ($categories->count())

               @foreach($categories as $category)
                   <option value="{{ $category->id }}" >

                       {{ $category->category }}

                   </option>
               @endforeach
           @endif

       </select>
               </div>
           </div>
   </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    {!! Form::close() !!}
@endsection