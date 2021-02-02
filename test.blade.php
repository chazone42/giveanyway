@extends('layouts.app')

@section('styles')
    <style>

        .tab {
            display: none;
        }
        button {
            background-color: #f26d7d;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            font-size: 17px;
            font-family: Raleway;
            cursor: pointer;
        }
        button:hover {
            opacity: 0.8;
        }
        #prevBtn {
            background-color: #1b4b72;
        }
        .step {
            height: 8px;
            width: 8px;
            margin: 0 2px;
            background-color: #f26d7d;
            border: none;
            border-radius: 50%;
            display: inline-block;
        }
        .step.active {
            opacity: 1;
        }
        .step.finish {
            background-color: #1b4b72;
        }
    </style>

@endsection
@section('content')
    <div class="container">
        <button id="btn1" type="button" class="btn btn-primary">dddd</button>
    </div>


@endsection

@section('scripts')
    <script>
        $("#btn1").click(function () {
            Swal.fire(
                'The Internet?',
                'That thing is still around?',
                'question'
            )
        });
    </script>
@endsection








