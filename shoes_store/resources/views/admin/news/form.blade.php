@php
    $routeName = Request::route()->getName();
    $route = route('news.store');
    $method = "POST";
    $isEdit = false;
    $isDetail = false;
    switch ($routeName) {
        case "news.edit":
            $route = route('news.update', $news->id);
            $method = "PUT";
            $isEdit = true;
            break;
        case "news.show":
            $route = route('news.show', $news->id);
            $method = "GET";
            $isDetail = true;
            break;
    }
    $check = $isEdit || $isDetail ? true : false;

    $path = null;
    if ($check) {
        $path = Storage::disk(config('filesystems.public_disk'))->url(\App\Models\News::DIRECTORY.'/'.$news->image);
    }
@endphp
{!! Form::open(['method' => $method, 'url' => $route, 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
    <div class="box-header with-border">
        <h3 class="box-title">{{ $isEdit ? 'Edit' . ' #' . $news->id :'New' }}</h3>
        <div class="box-tools pull-right">
            <a href="{{ route('news.index') }}" class="btn btn-sm btn-default">
                <i class="fa fa-list"></i> List
            </a>
        </div>
    </div>
    @include('flash::message')
    <div class="box-body">
        @if($check)
            <input type="hidden" value="{{ $news->id }}" name="id">
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('title', 'Name:<span class="text-red">*</span>', ['class'=> 'col-sm-2 control-label'], false) !!}
                    <div class="col-sm-8">
                        {!! Form::text('name', $check ? $news->name : null, ['class' => 'form-control input-radius name '.($errors->has('name') ? 'text-danger' : ''), $isDetail ? 'readonly' : '']) !!}
                        @if ($errors->has('name'))
                            <span class="text-danger invalid-feedback">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('title', 'Title:<span class="text-red">*</span>', ['class'=> 'col-sm-2 control-label'], false) !!}
                    <div class="col-sm-8">
                        {!! Form::text('title', $check ? $news->title : null, ['class' => 'form-control input-radius title '.($errors->has('title') ? 'text-danger' : ''), $isDetail ? 'readonly' : '']) !!}
                        @if ($errors->has('title'))
                            <span class="text-danger invalid-feedback">{{ $errors->first('title') }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('title', 'Image:<span class="text-red">*</span>', ['class'=> 'col-sm-2 control-label'], false) !!}
                    <div class="col-sm-8">
                        <input id="input-pr" name="image" type="file" {{ $errors->has('name') ? 'text-danger' : '' }} {{ $isDetail ? 'readonly' : '' }}>
                        @if ($errors->has('image'))
                            <span class="text-danger invalid-feedback">{{ $errors->first('image') }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('title', 'Description:<span class="text-red">*</span>', ['class'=> 'col-sm-2 control-label'], false) !!}
                    <div class="col-sm-8">
                        {!! Form::textarea('sort_description', $check ? $news->sort_description : null, ['class' => 'form-control input-radius content '.($errors->has('sort_description') ? 'text-danger' : ''), $isDetail ? 'readonly' : '']) !!}
                        @if ($errors->has('sort_description'))
                            <span class="text-danger invalid-feedback">{{ $errors->first('sort_description') }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('title', 'Content:<span class="text-red">*</span>', ['class'=> 'col-sm-2 control-label'], false) !!}
                    <div class="col-sm-8">
                        <textarea rows="20" name="long_description" class="form-control  input-radius {{ $errors->has('long_description') ? 'text-danger' : '' }}" id="editor1" {{ $isDetail ? 'readonly' : '' }}>{{ $check ? $news->long_description : old('long_description') }}</textarea>
                        @if ($errors->has('long_description'))
                            <span class="text-danger invalid-feedback">{{ $errors->first('long_description') }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer text-center">
        <button type="submit" class="btn btn-primary" {{ $isDetail ? 'disabled' : '' }}>Save</button>
    </div>
    <!-- /.box-footer -->
{!! Form::close () !!}

@push('scripts')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'editor1', {
            filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        } );
    </script>
    <script>
        $(function() {
            function initInputFilePicture(elm, preview, fileName) {
                $(elm).fileinput({
                    uploadAsync: false,
                    minFileCount: 0,
                    maxFileCount: 1,
                    showUpload: false,
                    showRemove: false,
                    showClose: false,
                    overwriteInitial: true,
                    initialPreviewAsData: false, // allows you to set a raw markup
                    maxFileSize: '250000',
                    allowedFileExtensions: ['PNG', 'JPEG', 'GIF', 'TIFF', 'jfif', 'JPG'],
                    initialPreviewFileType: 'image', // image is the default and can be overridden in config below
                    initialPreview: preview,
                    initialPreviewConfig: [
                        {type: "image", caption: fileName, key: 1}
                    ]
                });
            };

            var checkAction = '{{ $check }}';
            console.log(checkAction);
            if (checkAction == 1) {
                var linkPic = [];
                var imageCategory = '{{ asset("$path") }}' ?? '';
                // console.log(imageCategory);
                if (imageCategory !== '') {
                    linkPic = ['<img src="'+imageCategory+'" class= "kv-preview-data file-preview-image">'];
                }

                initInputFilePicture('#input-pr', linkPic, imageCategory);
            } else {
                initInputFilePicture('#input-pr', '', '');
            }
        });
    </script>
@endpush
