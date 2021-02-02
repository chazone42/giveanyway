@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="/qrcode" enctype="multipart/form-data" class="gen">
                {{ csrf_field() }}
                @foreach($qrcodes as $qrcode)
                    {!! QrCode::size(200)->generate($qrcode->value); !!}
                @endforeach
            </form>
{{--                <div class="col">--}}
{{--                    <label>ใส่จำนวน</label>--}}
{{--                    <input type="text" class="form-control" placeholder="15" id="dat">--}}
{{--                    <div id="msg">กดenter</div>--}}
{{--                </div>--}}

{{--                <div id="outputbox">--}}

{{--                </div>--}}
{{--                <div class="form-group">--}}
{{--                    <input type="submit" name="submit" value="ตกลง">--}}
{{--                </div>--}}



        </div>
    </div>


    @endsection
