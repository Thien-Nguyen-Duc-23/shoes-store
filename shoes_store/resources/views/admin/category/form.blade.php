@php
    $routeName = Request::route()->getName();
    $route = route('category.store');
    $method = "POST";
    $isEdit = false;
    $isDetail = false;
    switch ($routeName) {
        case "category.edit":
            $route = route('category.update', $category->id);
            $method = "PUT";
            $isEdit = true;
            break;
        case "category.show":
            $route = route('category.show', $category->id);
            $method = "GET";
            $isDetail = true;
            break;
    }
    $check = $isEdit || $isDetail ? true : false;

    $path = null;
    if ($check) {
        $path = Storage::disk(config('filesystems.public_disk'))->url(\App\Models\Categories::DIRECTORY.'/'.$category->image);
    }
@endphp
{!! Form::open(['method' => $method, 'url' => $route, 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
    <div class="box-header with-border">
        <h3 class="box-title">{{ $isEdit ? 'Edit' . ' #' . $category->id :'New' }}</h3>
        <div class="box-tools pull-right">
            <a href="{{ route('category.index') }}" class="btn btn-sm btn-default">
                <i class="fa fa-list"></i> List
            </a>
        </div>
    </div>
    @include('flash::message')
    <div class="box-body">
        @if($check)
        <input type="hidden" value="{{ $category->id }}" name="id">
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('title', 'Parent:', ['class'=> 'col-sm-3 control-label'], false) !!}
                    <div class="col-sm-8">
                        {{ Form::select('parent_id', $parentId,  $check ? $category->parent_id : null, ['class' => 'form-control select2 input-radius', 'style: withd:100%', $isDetail ? 'disabled' : '']) }}
                        @if ($errors->has('parent_id'))
                            <span class="text-danger" role="alert">
                                {{ $errors->first('parent_id') }}
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('title', 'Name:<span class="text-red">*</span>', ['class'=> 'col-sm-3 control-label'], false) !!}
                    <div class="col-sm-8">
                        {!! Form::text('name', $check ? $category->name : null, ['class' => 'form-control input-radius name '.($errors->has('name') ? 'text-danger' : ''), $isDetail ? 'readonly' : '']) !!}
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
                    {!! Form::label('title', 'Image:<span class="text-red">*</span>', ['class'=> 'col-sm-3 control-label'], false) !!}
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
                    {!! Form::label('title', 'Description:<span class="text-red">*</span>', ['class'=> 'col-sm-3 control-label'], false) !!}
                    <div class="col-sm-8">
                        {!! Form::textarea('description', $check ? $category->description : null, ['class' => 'form-control input-radius content '.($errors->has('description') ? 'text-danger' : ''), $isDetail ? 'readonly' : '']) !!}
                        @if ($errors->has('description'))
                            <span class="text-danger invalid-feedback">{{ $errors->first('description') }}</span>
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
                console.log(linkPic, imageCategory);
                initInputFilePicture('#input-pr', linkPic, imageCategory);
            } else {
                initInputFilePicture('#input-pr', '', '');
            }
        });
    </script>
@endpush
