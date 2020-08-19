@extends('layouts_admin.admin')

@section('content')
    @include('layouts_admin._breadcrumbs')

    <div class="card">
        <div class="card-body">
            <form class="form-horizontal" action="{{route('pre-order-page.edit',$page->id)}}" role="form">

            <h2 class="card-title">{{$page->name_page}}</h2>
            <hr>
            <h2 class="card-title">
                Iframe
            </h2>
            <hr>
            @if(!empty($page->iframe))
                {!! $page->iframe !!}
            @else
                <b class="text-purple" >Iframe hiện tại đang trống</b>
            @endif
            <h2 class="mt-3 card-title">
                Nội dung
            </h2>
            <hr>
                <div class="card">
                    <div class="card-body">
                        @if(!empty($page->bodyhtml))
                            {!! $page->bodyhtml !!}
                        @else
                            <b class="text-purple" >Nội dung hiện tại đang trống</b>
                        @endif
                    </div>
                </div>
            <div class="form-actions mt-4 w-100 float-right">

                <div class="row">

                    <div class="col-md-6">

                        <div class="row">

                            <div class="col-md-offset-3 col-md-9">

                                <button type="submit" class="btn btn-info"><i class="fa fa-pencil"></i> Edit
                                </button>

                                <a href="{{url()->previous()}}" class="btn btn-inverse">Cancel</a>


                            </div>

                        </div>

                    </div>

                    <div class="col-md-6"></div>

                </div>

            </div>

            </form>


        </div>
    </div>

@endsection
