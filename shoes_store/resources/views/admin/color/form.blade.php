@php
    $isEdit = isset($color->id) && $color->id > 0 ? 1 : 0
@endphp
{!! Form::open(['method' => 'POST', 'url' => $isEdit ? route("color.update", $color->id) : route("color.store"), 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
    @if($isEdit)
    @method('PUT')
    @endif
    <div class="box-header with-border">
        <h3 class="box-title">{{ $isEdit ? 'Edit' . ' #' . $color->id :'New' }}</h3>
    </div>
    {{-- @include('flash::message') --}}
    <div class="box-body">
        @if($isEdit)
        <input type="hidden" value="{{ $color->id }}" name="id">
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('title', 'Name:<span class="text-red">*</span>', ['class'=> 'col-sm-3 control-label'], false) !!}
                    <div class="col-sm-8">
                        {!! Form::text('name', $isEdit ? $color->name : null, ['class' => 'form-control input-radius name '.($errors->has('name') ? 'is-invalid' : '')]) !!}
                        @if ($errors->has('name'))
                        <span class="text-danger invalid-feedback">{{ $errors->first('name') }}</span>
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
