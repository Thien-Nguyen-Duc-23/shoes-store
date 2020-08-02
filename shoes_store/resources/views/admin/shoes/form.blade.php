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

    // dd($check, $shoesSizes, $shoesColors);
    $path = null;
    $pathArray = [];
    if ($check) {
        $path = Storage::disk(config('filesystems.public_disk'))->url(\App\Models\Shoes::DIRECTORY.'/'.$shoes->image);
        // $pathShoesImages = $oldShoesImages;
        foreach ($oldShoesImages as $key => $oldShoesImage) {
            if (\Storage::disk('public')->exists(\App\Models\ShoesImages::DIRECTORY.'/'.$oldShoesImage)) {
                $pathArray[$key] = Storage::disk(config('filesystems.public_disk'))->url(\App\Models\ShoesImages::DIRECTORY.'/'.$oldShoesImage);
            }
        }
    }
    // dd($pathArray);
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
                        {!! Form::select('colors[]', $colors, $check ? $shoesColors : null, ['class' => 'js-select2 form-control', 'multiple' => 'multiple', 'style: withd:100%', $isDetail ? 'disabled' : '']) !!}
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
                        {!! Form::select('sizes[]', $sizes, $check ? $shoesSizes : null, ['class' => 'js-select2 form-control', 'multiple' => 'multiple','style: withd:100%', $isDetail ? 'disabled' : '']) !!}
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
                        {!! Form::textarea('sort_description', $check ? $shoes->sort_description : null, ['class' => 'form-control input-radius content '.($errors->has('sort_description') ? 'text-danger' : ''), $isDetail ? 'readonly' : '']) !!}
                        <span class="help-block">
                            <i class="fa fa-info-circle"></i> Maximum 300 characters
                        </span>
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
                    {!! Form::label('title', 'Avatar:<span class="text-red">*</span>', ['class'=> 'col-sm-2 control-label'], false) !!}
                    <div class="col-sm-8">
                        {{-- {{ Form::file('image', null, $check ? $shoes->image : null, ['class' => 'form-control input-radius input-pr '.($errors->has('image') ? 'text-danger' : ''), $isDetail ? 'readonly' : '']) }} --}}
                        {{-- {!! Form::file('image', $check ? $shoes->image : null, ['class' => 'form-control input-radius input-pr '.($errors->has('image') ? 'text-danger' : ''), $isDetail ? 'readonly' : '']) !!} --}}
                        <input id="input-pr" value="{{ $check ? $shoes->image : old('image') }}" name="image" type="file" {{ $errors->has('name') ? 'text-danger' : '' }} {{ $isDetail ? 'readonly' : '' }}>
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
                    {!! Form::label('title', 'Images:<span class="text-red">*</span>', ['class'=> 'col-sm-2 control-label'], false) !!}
                    <div class="col-sm-8">
                        <input id="shoes-image" multiple="true" name="shoesImages[]" type="file" {{ $errors->has('shoesImages') ? 'text-danger' : '' }} {{ $isDetail ? 'readonly' : '' }}>
                        {{-- <input name="old_shoes_image" type="file" class="hidden"  value="{{ $check ? $oldShoesImages : null }}"> --}}
                        {{-- @php
                            dd($oldShoesImages);    
                        @endphp --}}
                        @if ($errors->has('shoesImages'))
                            <span class="text-danger invalid-feedback">{{ $errors->first('shoesImages') }}</span>
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
                            {!! Form::text('price_cost', $check ? $shoes->price_cost : null, ['class' => 'form-control input-radius'.($errors->has('price_cost') ? 'text-danger' : ''), $isDetail ? 'readonly' : '']) !!}
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
                            {!! Form::text('price', $check ? $shoes->price : null, ['class' => 'form-control input-radius'.($errors->has('price') ? 'text-danger' : ''), $isDetail ? 'readonly' : '']) !!}
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
                    {!! Form::label('title', 'Sale:', ['class'=> 'col-sm-2 control-label'], false) !!}
                    <div class="col-sm-6">
                        {!! Form::checkbox('is_sale', null, $check ? $shoes->is_sale : 0, ['class' => 'checkbox-switch is_sale '.($errors->has('is_sale') ? 'text-danger' : ''), $isDetail ? 'readonly' : '']) !!}
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
                    {!! Form::label('title', 'Price Sale:', ['class'=> 'col-sm-2 control-label'], false) !!}
                    <div class="col-sm-2">
                        <div class='input-group'>
                            {!! Form::number('price_sale', $check ? $shoes->price_sale : null, ['class' => 'form-control input-radius price_sale number '.($errors->has('price_sale') ? 'text-danger' : ''), $isDetail ? 'readonly' : '']) !!}
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
                    {!! Form::label('title', 'Start Date Sale:', ['class'=> 'col-sm-2 control-label'], false) !!}
                    <div class="col-sm-2">
                        <div class='input-group'>
                            {!! Form::text('start_date_sale', $check ? ($shoes->start_date_sale ? date('Y-m-d', strtotime($shoes->start_date_sale)) : '') : null, ['class' => 'form-control input-radius datetimepicker start_date_sale', 'placeholder' => 'yyyy-mm-dd', $isDetail ? 'disabled' : '']) !!}
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
                    {!! Form::label('title', 'End Date Sale:', ['class'=> 'col-sm-2 control-label'], false) !!}
                    <div class="col-sm-2">
                        <div class='input-group'>
                            {!! Form::text('end_date_sale', $check ? ($shoes->end_date_sale ? date('Y-m-d', strtotime($shoes->end_date_sale)) : '') : null, ['class' => 'form-control input-radius datetimepicker end_date_sale', 'placeholder' => 'yyyy-mm-dd', $isDetail ? 'disabled ' : '']) !!}
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
                        <textarea rows="20" name="long_description" class="form-control  input-radius {{ $errors->has('long_description') ? 'text-danger' : '' }}" id="editor1" {{ $isDetail ? 'readonly' : '' }}>{{ $check ? $shoes->long_description : old('long_description') }}</textarea>
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
            var isDetail = '{{ $isDetail }}';
            if (!isDetail) {
                var isSale = $('.is_sale').val();
                switchIsPlan(isSale );
            }

            $('.is_sale').on('switchChange.bootstrapSwitch', function (event, state) {
                if (state === true) {
                    $('.is_sale').val(1);
                    $('.price_sale').prop('disabled', false);
                    $('.start_date_sale').prop('disabled', false);
                    $('.end_date_sale').prop('disabled', false);
                } else {
                    $('.is_sale').val(0);
                    $('.price_sale').prop('disabled', true);
                    $('.start_date_sale').prop('disabled', true);
                    $('.end_date_sale').prop('disabled', true);
                }
            });

            $('input.checkbox-switch').bootstrapSwitch();

            $('.datetimepicker').datepicker({
                format: 'yyyy-mm-dd',
            });

            $(".js-select2").select2({
                placeholder: " Please select ",
                closeOnSelect : false
            });

            function initInputFilePicture(elm, preview, fileName, minFile, maxFile) {
                $(elm).fileinput({
                    uploadAsync: false,
                    minFileCount: minFile,
                    maxFileCount: maxFile,
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

                initInputFilePicture('#input-pr', linkPic, imageshoes, 0, 1);

                var shoesImage = [];
                var pathArray =  @json($pathArray) ?? "";
                $.each(pathArray , function(key, value) {
                    shoesImage.push('<img src="'+value+'" class= "kv-preview-data file-preview-image active-"'+key+'"">');
                });

                initInputFilePicture('#shoes-image', shoesImage, '', 0, 10);
                
            } else {
                initInputFilePicture('#input-pr', '', '', 0, 1);
                initInputFilePicture('#shoes-image', '', '', 0, 10);
            }
        });

        function switchIsPlan(isSale) {
            if (isSale === '0') {
                $('.price_sale').prop('disabled', true);
                $('.start_date_sale').prop('disabled', true);
                $('.end_date_sale').prop('disabled', true);
            } else if(isSale == '1') {
                $('.price_sale').prop('disabled', false);
                $('.start_date_sale').prop('disabled', false);
                $('.end_date_sale').prop('disabled', false);
            }
        }
    </script>
@endpush
