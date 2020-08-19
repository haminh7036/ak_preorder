@extends('layouts_admin.admin')
@section('content')
    @include('layouts_admin._breadcrumbs')
    <div class="container-fluid">
        <div class="animated fadeIn">
            {!! Form::open(['url' => route('store_interviewer'),'method'=>'POST','enctype'=>"multipart/form-data"]) !!}
            <div class="card">
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-lg-6 {{ $errors->has('name') ? 'has-danger' : ''}}">
                            <label for="name" class="col-sm-12 col-form-label">
                                @lang('validation.attributes.name')
                                <span class="text-danger"> *</span>
                            </label>
                            <div class="col-sm-12">
                                {!! Form::text('name', null, ['class' => 'form-control', 'maxlength' => '100']) !!}
                                {!! $errors->first('name', '<p class="text-danger">:message</p>')!!}
                            </div>
                        </div>
                        <div class="col-lg-6 {{ $errors->has('address') ? 'has-danger' : ''}}">
                            <label for="email" class="col-sm-12 col-form-label">
                                @lang('validation.attributes.address')
                                <span class="text-danger"> *</span>
                            </label>
                            <div class="col-sm-12">
                                {!! Form::text('address', null, ['class' => 'form-control']) !!}
                                {!! $errors->first('address', '<p class="text-danger">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-12 {{ $errors->has('content') ? 'has-danger' : ''}}">
                            <label for="password" class="col-sm-12 col-form-label">
                                @lang('validation.attributes.content')
                                <span class="text-danger"> *</span>
                            </label>
                            <div class="col-sm-12">
                                {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
                                {!! $errors->first('content', '<p class="text-danger">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-lg-12 {{ $errors->has('avatar') ? 'has-danger' : ''}}">
                            <label for="password" class="col-sm-12 col-form-label">
                                @lang('validation.attributes.avatar')
                                <span class="text-danger"> *</span>
                            </label>
                            <div class="col-sm-12">
                                {!! Form::file('avatar', null, ['class' => 'form-control']) !!}
                                {!! $errors->first('avatar', '<p class="text-danger">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    {!! Form::submit(__('validation.buttons.create'), ['class' => 'btn btn-success']) !!}
                    <a href="{{url('interviewers')}}" class="btn btn-secondary">
                        @lang('validation.buttons.cancel')
                    </a>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

