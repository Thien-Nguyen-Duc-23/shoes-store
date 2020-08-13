@php
    $routeName = Request::route()->getName();
    $route = route('banner.store');
    $method = "POST";
    $isEdit = false;
    $isDetail = false;
    switch ($routeName) {
        case "banner.edit":
            $route = route('banner.update', $banner->id);
            $method = "PUT";
            $isEdit = true;
            break;
        case "banner.show":
            $route = route('banner.show', $banner->id);
            $method = "GET";
            $isDetail = true;
            break;
    }
    $check = $isEdit || $isDetail ? true : false;

    $path = null;
    if ($check) {
        $path = Storage::disk(config('filesystems.public_disk'))->url(\App\Models\Banners::DIRECTORY.'/'.$banner->image);
    }
@endphp
{!! Form::open(['method' => $method, 'url' => $route, 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
    <div class="box-header with-border">
        <h3 class="box-title">{{ $isEdit ? 'Edit' . ' #' . $banner->id : ($check ? 'Detail' . ' #' . $banner->id : 'New') }}</h3>
    </div>
    @include('flash::message')
    <div class="box-body">
        @if($check)
        <input type="hidden" value="{{ $banner->id }}" name="id">
        <input name="old_image" hidden type="text" value="{{ $check ? $banner->image : null }}">
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('title', 'Name:<span class="text-red">*</span>', ['class'=> 'col-sm-3 control-label'], false) !!}
                    <div class="col-sm-8">
                        {!! Form::text('name', $check ? $banner->name : null, ['class' => 'form-control input-radius name '.($errors->has('name') ? 'text-danger' : ''), $isDetail ? 'readonly' : '']) !!}
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
                        <input id="input-pr" name="image" type="file" value="{{ $check ? $banner->image : old('image') }}" {{ $errors->has('name') ? 'text-danger' : '' }} {{ $isDetail ? 'readonly' : '' }}>

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
                    {!! Form::label('title', 'URL:<span class="text-red">*</span>', ['class'=> 'col-sm-3 control-label'], false) !!}
                    <div class="col-sm-8">
                        {!! Form::text('url', $check ? $banner->url : null, ['class' => 'form-control input-radius url '.($errors->has('url') ? 'text-danger' : ''), $isDetail ? 'readonly' : '']) !!}
                        @if ($errors->has('url'))
                            <span class="text-danger invalid-feedback">{{ $errors->first('url') }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('title', 'Status:', ['class'=> 'col-sm-3 control-label'], false) !!}
                    <div class="col-sm-8">
                        {!! Form::checkbox('status', null, $check ? $banner->status : 0, ['class' => 'checkbox-switch status '.($errors->has('status') ? 'text-danger' : ''), $isDetail ? 'readonly' : '']) !!}
                        @if ($errors->has('status'))
                            <span class="text-danger invalid-feedback">{{ $errors->first('status') }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer text-center">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
    <!-- /.box-footer -->
{!! Form::close () !!}

@push('scripts')
    <script>
        $(function() {
            $('input.checkbox-switch').bootstrapSwitch();

            function initInputFilePicture(elm, preview, fileName, min, max) {
                console.log(min, max);
                $(elm).fileinput({
                    uploadAsync: true,
                    minFileCount: min,
                    maxFileCount: max,
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
                
                $('.kv-file-remove').addClass('hide');
            };

            var checkAction = '{{ $check }}';
            if (checkAction == 1) {
                var linkPic = [];
                var imagebanner = '{{ asset("$path") }}' ?? '';
                if (imagebanner !== '') {
                    linkPic = ['<img src="'+imagebanner+'" class= "kv-preview-data file-preview-image">'];
                }
                initInputFilePicture('#input-pr', linkPic, imagebanner, 0, 1);
            } else {
                initInputFilePicture('#input-pr', '', '', 0, 1);
            }
        });
    </script>
@endpush
