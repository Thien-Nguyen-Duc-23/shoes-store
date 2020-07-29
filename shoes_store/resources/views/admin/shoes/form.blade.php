@push('styles')
<style>
    .select2-container {
        min-width: 100%;
    }

    .select2-results__option {
        padding-right: 20px;
        vertical-align: middle;
    }
    .select2-results__option:before {
        content: "";
        display: inline-block;
        position: relative;
        height: 20px;
        width: 20px;
        border: 1px solid #d2d6de;
        margin-right: 20px;
        vertical-align: middle;
    }
    .select2-results__option[aria-selected=true]:before {
        background-color: #3c8dbc;
        border-style: 1px solid;
    }

</style>
@endpush
@php
    $routeName = Request::route()->getName();
    $route = route('shoes.store');
    $method = "POST";
    $isEdit = false;
    $isDetail = false;
    switch ($routeName) {
        case "shoes.edit":
            $route = route('shoes.update', $shoes->id);
            $method = "PUT";
            $isEdit = true;
            break;
        case "shoes.show":
            $route = route('shoes.show', $shoes->id);
            $method = "GET";
            $isDetail = true;
            break;
    }
    $check = $isEdit || $isDetail ? true : false;

    $path = null;
    if ($check) {
        $path = Storage::disk(config('filesystems.public_disk'))->url(\App\Models\Shoes::DIRECTORY.'/'.$shoes->image);
    }
@endphp
{!! Form::open(['method' => $method, 'url' => $route, 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
    <div class="box-header with-border">
        <h3 class="box-title">{{ $isEdit ? 'Edit' . ' #' . $shoes->id : 'New' }}</h3>
    </div>
    @include('flash::message')
    <div class="box-body">
        @if($check)
            <input type="hidden" value="{{ $shoes->id }}" name="id">
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('title', 'Name:<span class="text-red">*</span>', ['class'=> 'col-sm-2 control-label'], false) !!}
                    <div class="col-sm-8">
                        {!! Form::text('name', $check ? $shoes->name : null, ['class' => 'form-control input-radius name '.($errors->has('name') ? 'text-danger' : ''), $isDetail ? 'readonly' : '']) !!}
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
                    {!! Form::label('title', 'SKU:<span class="text-red">*</span>', ['class'=> 'col-sm-2 control-label'], false) !!}
                    <div class="col-sm-8">
                        {!! Form::text('sku', $check ? $shoes->sku : null, ['class' => 'form-control input-radius name '.($errors->has('sku') ? 'text-danger' : ''), $isDetail ? 'readonly' : '']) !!}
                        <span class="help-block">
                            Only characters in the group: "A-Z", "a-z", "0-9" and "-_" 
                        </span>
                        @if ($errors->has('sku'))
                            <span class="text-danger invalid-feedback">{{ $errors->first('sku') }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('title', 'Category:<span class="text-red">*</span>', ['class'=> 'col-sm-2 control-label'], false) !!}
                    <div class="col-sm-8">
                        {{ Form::select('category_id', $categories,  $check ? $shoes->category_id : null, ['class' => 'form-control select2 input-radius', 'style: withd:100%', $isDetail ? 'disabled' : '']) }}
                        @if ($errors->has('category_id'))
                            <span class="text-danger" role="alert">
                                {{ $errors->first('category_id') }}
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('title', 'Colors:<span class="text-red">*</span>', ['class'=> 'col-sm-2 control-label'], false) !!}
                    <div class="col-sm-8">
                        {!! Form::select('colors[]', $colors, $check ? $shoes->category_id : null, ['class' => 'js-select2 form-control', 'multiple' => 'multiple','style: withd:100%', $isDetail ? 'disabled' : '']) !!}
                        @if ($errors->has('colors'))
                            <span class="text-danger" role="alert">
                                {{ $errors->first('colors') }}
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('title', 'Sizes:<span class="text-red">*</span>', ['class'=> 'col-sm-2 control-label'], false) !!}
                    <div class="col-sm-8">
                        {!! Form::select('sizes[]', $sizes, $check ? $shoes->category_id : null, ['class' => 'js-select2 form-control', 'multiple' => 'multiple','style: withd:100%', $isDetail ? 'disabled' : '']) !!}
                        @if ($errors->has('sizes'))
                            <span class="text-danger" role="alert">
                                {{ $errors->first('sizes') }}
                            </span>
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
                        {!! Form::textarea('description', $check ? $shoes->description : null, ['class' => 'form-control input-radius content '.($errors->has('description') ? 'text-danger' : ''), $isDetail ? 'readonly' : '']) !!}
                        <span class="help-block">
                            <i class="fa fa-info-circle"></i> Maximum 300 characters
                        </span>
                        @if ($errors->has('description'))
                            <span class="text-danger invalid-feedback">{{ $errors->first('description') }}</span>
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
                    {!! Form::label('title', 'Price Cost:<span class="text-red">*</span>', ['class'=> 'col-sm-2 control-label'], false) !!}
                    <div class="col-sm-2">
                        <div class='input-group'>
                            {!! Form::number('price_cost', $check ? $shoes->price_cost : null, ['class' => 'form-control input-radius number '.($errors->has('price_cost') ? 'text-danger' : ''), $isDetail ? 'readonly' : '']) !!}
                            <span class="input-group-addon">$</span>
                        </div>
                        @if ($errors->has('price_cost'))
                            <span class="text-danger invalid-feedback">{{ $errors->first('price_cost') }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('title', 'Price Out:<span class="text-red">*</span>', ['class'=> 'col-sm-2 control-label'], false) !!}
                    <div class="col-sm-2">
                        <div class='input-group'>
                            {!! Form::number('price', $check ? $shoes->price : null, ['class' => 'form-control input-radius number '.($errors->has('price') ? 'text-danger' : ''), $isDetail ? 'readonly' : '']) !!}
                            <span class="input-group-addon">$</span>
                        </div>
                        @if ($errors->has('price'))
                            <span class="text-danger invalid-feedback">{{ $errors->first('price') }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('title', 'Sale:<span class="text-red">*</span>', ['class'=> 'col-sm-2 control-label'], false) !!}
                    <div class="col-sm-6">
                        {!! Form::checkbox('is_sale', 0, $check ? $shoes->is_sale : null, ['class' => 'checkbox-switch '.($errors->has('is_sale') ? 'text-danger' : ''), $isDetail ? 'readonly' : '']) !!}
                        @if ($errors->has('is_sale'))
                            <span class="text-danger invalid-feedback">{{ $errors->first('is_sale') }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('title', 'Price Sale:<span class="text-red">*</span>', ['class'=> 'col-sm-2 control-label'], false) !!}
                    <div class="col-sm-2">
                        <div class='input-group'>
                            {!! Form::number('price_sale', $check ? $shoes->price_sale : null, ['class' => 'form-control input-radius number '.($errors->has('price_sale') ? 'text-danger' : ''), $isDetail ? 'readonly' : '']) !!}
                            <span class="input-group-addon">$</span>
                        </div>
                        @if ($errors->has('price_sale'))
                            <span class="text-danger invalid-feedback">{{ $errors->first('price_sale') }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('title', 'Start Date Sale:<span class="text-red">*</span>', ['class'=> 'col-sm-2 control-label'], false) !!}
                    <div class="col-sm-2">
                        <div class='input-group'>
                            {!! Form::text('start_date_sale', $check ? ($shoes->start_date_sale ? date('Y/m/d H:i', strtotime($shoes->start_date_sale)) : '') : null, ['class' => 'form-control input-radius datetimepicker', 'placeholder' => 'yyyy-mm-dd']) !!}
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                        @if ($errors->has('start_date_sale'))
                            <span class="text-danger invalid-feedback">{{ $errors->first('start_date_sale') }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('title', 'End Date Sale:<span class="text-red">*</span>', ['class'=> 'col-sm-2 control-label'], false) !!}
                    <div class="col-sm-2">
                        <div class='input-group'>
                            {!! Form::text('end_date_sale', $check ? ($shoes->end_date_sale ? date('Y/m/d H:i', strtotime($shoes->end_date_sale)) : '') : null, ['class' => 'form-control input-radius datetimepicker', 'placeholder' => 'yyyy-mm-dd']) !!}
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                        @if ($errors->has('end_date_sale'))
                            <span class="text-danger invalid-feedback">{{ $errors->first('end_date_sale') }}</span>
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
                        <textarea rows="20" name="long_description" value="{{ $check ? $shoes->long_description : old('long_description')}}" class="form-control  input-radius {{ $errors->has('long_description') ? 'text-danger' : '' }}" id="editor1" {{ $isDetail ? 'readonly' : '' }}></textarea>
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
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
    <!-- /.box-footer -->
{!! Form::close () !!}

@push('scripts')
    <script>
        $(function() {
            $('input.checkbox-switch').bootstrapSwitch();
            $('.datetimepicker').datepicker({
                format: 'yyyy-mm-dd',
            });

            $(".js-select2").select2({
                placeholder: " Please select ",
                closeOnSelect : false
            });

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
            if (checkAction == 1) {
                var linkPic = [];
                var imageshoes = '{{ asset("$path") }}' ?? '';
                if (imageshoes !== '') {
                    linkPic = ['<img src="'+imageshoes+'" class= "kv-preview-data file-preview-image">'];
                }
                console.log(linkPic, imageshoes);
                initInputFilePicture('#input-pr', linkPic, imageshoes);
            } else {
                initInputFilePicture('#input-pr', '', '');
            }
        });
    </script>
@endpush
