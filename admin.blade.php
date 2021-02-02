@extends('layouts.adminapp')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            @if(session('message'))
                <div class="alert alert-success">
                    {{session('message')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="card">
                <div class="card-header">{{ __('User') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Email</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <th>{{ $user->name }}</th>
                                    <th>{{ $user->email }}</th>
{{--                                    <th>@if($user->status==0) Inactive @else Active @endif</th>--}}
{{--                                    <th><a href="{{route('status', ['id' => $user->id]) }}">--}}
{{--                                            @if($user->status ==1)--}}
{{--                                                Inactive--}}
{{--                                            @else Active--}}
{{--                                            @endif</a></th>--}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div class="container pt-4">
            <div class="row justify-content-center">
                <div class="col-md-12">

        <div class="card">
            <div class="card-header">{{ __('ลงทะเบียน') }}</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                    <table class="table">
                        <thead>
                        <tr>
                            <td>Name</td>
                            <td>Enail</td>
                            <td>Status</td>
                            <td>Action</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($enrolls as $enroll)
                            <tr>
                                <th>{{ $enroll->firstname }}</th>
                                <th>{{ $enroll->lastname }}</th>
{{--                                <th>@if($enroll->status==0) Inactive @else Active @endif</th>--}}
{{--                                <th><a href="{{route('status', ['id' => $enroll->id]) }}">@if($enroll->status ==1)--}}
{{--                                            Inactive @else Active @endif</a></th>--}}
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                 </div>
            </div>
        </div>
    </div>
        </div>
    </div>
</div>

@endsection
