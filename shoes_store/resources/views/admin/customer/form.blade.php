@php
    $routeName = Request::route()->getName();
    $route = route('customer.store');
    $method = "POST";
    $isEdit = false;
    $isDetail = false;
    switch ($routeName) {
        case "customer.edit":
            $route = route('customer.update', $customer->id);
            $method = "PUT";
            $isEdit = true;
            break;
        case "customer.show":
            $route = route('customer.show', $customer->id);
            $method = "GET";
            $isDetail = true;
            break;
    }
    $check = $isEdit || $isDetail ? true : false;

    $path = null;
    if ($check) {
        $path = Storage::disk(config('filesystems.public_disk'))->url(\App\Models\Categories::DIRECTORY.'/'.$customer->image);
    }
@endphp
{!! Form::open(['method' => $method, 'url' => $route, 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
    <div class="box-header with-border">
        <h3 class="box-title">{{ $isEdit ? 'Edit' . ' #' . $customer->id :'New' }}</h3>
        <div class="box-tools pull-right">
            <a href="{{ route('customer.index') }}" class="btn btn-sm btn-default">
                <i class="fa fa-list"></i> List
            </a>
        </div>
    </div>
    @include('flash::message')
    <div class="box-body">
        @if($check)
        <input type="hidden" value="{{ $customer->id }}" name="id">
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('title', 'Name:<span class="text-red">*</span>', ['class'=> 'col-sm-3 control-label'], false) !!}
                    <div class="col-sm-6">
                        {!! Form::text('name', $check ? $customer->name : null, ['class' => 'form-control input-radius name '.($errors->has('name') ? 'text-danger' : ''), $isDetail ? 'readonly' : '']) !!}
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
                    {!! Form::label('title', 'Email:<span class="text-red">*</span>', ['class'=> 'col-sm-3 control-label'], false) !!}
                    <div class="col-sm-6">
                        {!! Form::text('email', $check ? $customer->email : null, ['class' => 'form-control input-radius'.($errors->has('email') ? 'text-danger' : ''), $isDetail ? 'readonly' : '']) !!}
                        @if ($errors->has('email'))
                            <span class="text-danger invalid-feedback">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('title', 'Password:<span class="text-red">*</span>', ['class'=> 'col-sm-3 control-label'], false) !!}
                    <div class="col-sm-6">
                        {!! Form::password('password', ['class' => 'form-control input-radius password '.($errors->has('password') ? 'is-invalid' : '')]) !!}
                        @if ($errors->has('password'))
                        <span class="text-danger invalid-feedback">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('title', 'Password Confirmation:<span class="text-red">*</span>', ['class'=> 'col-sm-3 control-label'], false) !!}
                    <div class="col-sm-6">
                        {!! Form::password('password_confirmation', ['class' => 'form-control input-radius password '.($errors->has('password_confirmation') ? 'is-invalid' : '')]) !!}
                        @if ($errors->has('password_confirmation'))
                        <span class="text-danger invalid-feedback">{{ $errors->first('password_confirmation') }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('title', 'Phone:', ['class'=> 'col-sm-3 control-label'], false) !!}
                    <div class="col-sm-6">
                        {!! Form::text('phone', $check ? $customer->phone : null, ['class' => 'form-control input-radius'.($errors->has('phone') ? 'text-danger' : ''), $isDetail ? 'readonly' : '']) !!}
                        @if ($errors->has('phone'))
                            <span class="text-danger invalid-feedback">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('title', 'Status:', ['class'=> 'col-sm-3 control-label'], false) !!}
                    <div class="col-sm-4">
                        <div class="radio">
                            <label class="">
                                <input type="radio" name="status" class="minimal" value="0" {{ ($check && !$customer->status) ? 'checked' : '' }}>Active
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="status" class="minimal" value="1" {{ ($check && $customer->status) ? 'checked' : '' }}>Note Active
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('title', 'Gender:', ['class'=> 'col-sm-3 control-label'], false) !!}
                    <div class="col-sm-4">
                        <div class="radio">
                            <label class="">
                                <input type="radio" name="gender" class="minimal gender" value="0" {{ ($check && !$customer->gender) ? 'checked' : '' }}>Male
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="gender" class="minimal gender" value="1" {{ ($check && $customer->gender) ? 'checked' : '' }}>Female
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('title', 'Image:<span class="text-red">*</span>', ['class'=> 'col-sm-3 control-label'], false) !!}
                    <div class="col-sm-6">
                        <input id="input-pr" name="image_path" type="file" {{ $errors->has('image_path') ? 'text-danger' : '' }} {{ $isDetail ? 'readonly' : '' }}>
                        @if ($errors->has('image_path'))
                            <span class="text-danger invalid-feedback">{{ $errors->first('image_path') }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('title', 'Birthday:', ['class'=> 'col-sm-3 control-label'], false) !!}
                    <div class="col-sm-3">
                        <div class='input-group'>
                            {!! Form::text('birthday', $check ? ($customer->birthday ? date('Y-m-d', strtotime($customer->start_date_sale)) : '') : null, ['class' => 'form-control input-radius datetimepicker start_date_sale', 'placeholder' => 'yyyy-mm-dd', $isDetail ? 'disabled' : '']) !!}
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                        @if ($errors->has('birthday'))
                            <span class="text-danger invalid-feedback">{{ $errors->first('birthday') }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('title', 'City:', ['class'=> 'col-sm-3 control-label'], false) !!}
                    <div class="col-sm-6">
                        {!! Form::text('city', $check ? $customer->city : null, ['class' => 'form-control input-radius'.($errors->has('city') ? 'text-danger' : ''), $isDetail ? 'readonly' : '']) !!}
                        @if ($errors->has('city'))
                            <span class="text-danger invalid-feedback">{{ $errors->first('city') }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('title', 'Address:', ['class'=> 'col-sm-3 control-label'], false) !!}
                    <div class="col-sm-6">
                        {!! Form::text('address', $check ? $customer->address : null, ['class' => 'form-control input-radius'.($errors->has('address') ? 'text-danger' : ''), $isDetail ? 'readonly' : '']) !!}
                        @if ($errors->has('address'))
                            <span class="text-danger invalid-feedback">{{ $errors->first('address') }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('title', 'Zip:', ['class'=> 'col-sm-3 control-label'], false) !!}
                    <div class="col-sm-6">
                        {!! Form::text('zip', $check ? $customer->zip : null, ['class' => 'form-control input-radius'.($errors->has('zip') ? 'text-danger' : ''), $isDetail ? 'readonly' : '']) !!}
                        @if ($errors->has('zip'))
                            <span class="text-danger invalid-feedback">{{ $errors->first('zip') }}</span>
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
                var imagecustomer = '{{ asset("$path") }}' ?? '';
                // console.log(imagecustomer);
                if (imagecustomer !== '') {
                    linkPic = ['<img src="'+imagecustomer+'" class= "kv-preview-data file-preview-image">'];
                }
                console.log(linkPic, imagecustomer);
                initInputFilePicture('#input-pr', linkPic, imagecustomer);
            } else {
                initInputFilePicture('#input-pr', '', '');
            }
        });
    </script>
@endpush
