@extends('layouts.admin')
{{-- <link href="{{ asset('assets/css/taginput.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/bstaginput.css') }}" rel="stylesheet"> --}}

@section('page-header-right')
    <a href="{{route('categoryAll')}}" class="btn btn-info" data-toggle="tooltip" title="All Blog Category"> <i class="la la-list"></i> All Blog Category </a>
@endsection

@section('content')

    <div class="row">
        <div class="col-sm-12">

            <form action="{{ route('categoryDataPost') }}" method="post" id="" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="category_id" value="{{ (!empty($category->id))?$category->id:'' }}"/>
                <div class="form-group row {{ $errors->has('title')? 'has-error':'' }}">
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="title" value="{{ (!empty($category->id))?$category->title:old('title') }}" name="title" placeholder="{{__a('title')}}">
                        {!! $errors->has('title')? '<p class="help-block">'.$errors->first('title').'</p>':'' !!}
                    </div>
                </div>

                <div class="form-group row {{ $errors->has('description')? 'has-error':'' }}">
                    <div class="col-sm-12">
                        <textarea name="description" id="description" class="form-control" rows="6">{{ (!empty($category->description))?$category->description:old('description') }}</textarea>
                        {!! $errors->has('description')? '<p class="help-block">'.$errors->first('description').'</p>':'' !!}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-9">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>

        </div>

    </div>


@endsection

@section('page-js')
    <script src="{{ asset('assets/plugins/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'post_content' );
    </script>
@endsection
