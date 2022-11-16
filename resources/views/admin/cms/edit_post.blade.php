@extends('layouts.admin')
{{-- <link href="{{ asset('assets/css/taginput.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/bstaginput.css') }}" rel="stylesheet"> --}}
@section('page-header-right')
    <a href="{{route('create_post')}}" class="btn btn-success mr-3" data-toggle="tooltip" title="{{__a('create_new_post')}}"> <i class="la la-plus-circle"></i> {{__a('create_new_post')}} </a>

    <a href="{{route('posts')}}" class="btn btn-info" data-toggle="tooltip" title="{{__a('all_posts')}}"> <i class="la la-list"></i> {{__a('all_posts')}} </a>

@endsection

@section('content')

    <div class="row">
        <div class="col-sm-12">

            <form action="" method="post" id="createPostForm" enctype="multipart/form-data">
                @csrf

                <div class="form-group row {{ $errors->has('title')? 'has-error':'' }}">
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="title" value="{{ old('title')?old('title'): $post->title }}" name="title" placeholder="{{__a('title')}}">
                        {!! $errors->has('title')? '<p class="help-block">'.$errors->first('title').'</p>':'' !!}
                    </div>
                </div>

                <div class="form-group row {{ $errors->has('post_content')? 'has-error':'' }}">
                    <div class="col-sm-12">
                        <textarea name="post_content" id="post_content" class="form-control">{!!  old('post_content')? old('post_content'): $post->post_content !!}</textarea>
                        {!! $errors->has('post_content')? '<p class="help-block">'.$errors->first('post_content').'</p>':'' !!}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="tags" data-role="tagsinput" value="{{ old('tags')? old('tags'): $post->tags }}" name="tags" placeholder="Tags"> 
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <textarea placeholder="Meta Description" name="meta_description" id="meta_description" class="form-control" rows="3">{{ old('meta_description')? old('meta_description'): $post->meta_description }}</textarea>
                    </div>
                </div>
                <div class="form-group row {{ $errors->has('blog_category_id')? 'has-error':'' }}">
                    <div class="col-sm-3">
                        <select class="form-control" name="blog_category_id">
                            <option value="">--Select Category--</option>
                            @foreach ($categories as $category)
                            <option {{ ($category->id==$post->blog_category_id)?'selected':'' }} value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                        {!! $errors->has('blog_category_id')? '<p class="help-block">'.$errors->first('blog_category_id').'</p>':'' !!}
                    </div>
                </div> 

                <div class="form-group row">
                    <div class="col-sm-12">
                        {!! image_upload_form('feature_image', $post->feature_image) !!}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3">
                        <select class="form-control" name="status">
                            <option {{ ($post->status==1)?'selected':'' }} value="1">Publish</option>
                            <option {{ ($post->status==2)?'selected':'' }} value="2">Unpublish</option>
                            <option {{ ($post->status==0)?'selected':'' }} value="0">Draft</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-9">
                        <button type="submit" class="btn btn-primary">{{__a('update_post')}}</button>
                        <a target="_blank" href="{{route('post', $post->slug)}}" class="btn btn-danger">Preview</a>
                        <input type="hidden" name="post_id" value="{{ $post->id }}" />
                    </div>
                </div>
            </form>

        </div>

    </div>

@endsection

@section('page-js')
    <script src="{{ asset('assets/plugins/ckeditor/ckeditor.js') }}"></script>
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace( 'post_content' );
    </script>
@endsection
