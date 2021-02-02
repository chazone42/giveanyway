@extends('layouts.app')

@section('styles')
@parent
<link rel="stylesheet" href="{{ asset('dropzone-5.7.0\dist\dropzone.css') }}">
<style>
    .card-detail{
        font-family: 'Mitr', sans-serif;
    }
    .card-detail2 h5{
        font-family: 'Mitr', sans-serif;
    }
    .card-detail2 p{
        font-family: 'Taviraj', sans-serif;
    }
    .crop-text {
        -webkit-line-clamp: 3;
        overflow : hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-box-orient: vertical;
    }
    .card:hover{
        border: 1px solid #f26d7d;
    }

    .ban-title h3{
        font-family: 'Mitr', sans-serif;
        color: white;
    }
    .ban-detail p{
        font-family: 'Taviraj', sans-serif;
        color: white;
    }
    .ban-update h5{
        color: white;
        font-family: 'Mitr', sans-serif;
    }
    .but-more{
        color: black;
        background-color: white;
        border-radius: 3px;
        font-family: 'Mitr', sans-serif;
        font-size: 14px;
        border: none;
    }
    .left{
        width: 40%;
        float: left;
        background-color: #223964;
        padding-left: 80px;
    }
    .right{
        width: 60%;
        float: right
    }
    .btn-cate{
        color: grey;
        background-color: white;
        border-radius: 3px;
        font-family: 'Mitr', sans-serif;
        font-size: 14px;
        border: none;
        transition: 0.3s;
    }
    .btn-cate:hover{
        color: white;
        background-color: #f26d7d;
        border-radius: 3px;
        font-family: 'Mitr', sans-serif;
        font-size: 14px;
        border: none;
    }
    .cate-active{
        background-color: #f26d7d;
        color: white;
    }
</style>
@endsection

@section('content')
    <div class="container shadow-sm rounded mt-3 p-3">
        <div class="row">
            <div class="col">
                <h3>รายการถอนเงิน</h3>
            </div>
        </div>
        <form action="{{ route('save_withdraw') }}" method="POST">
            @csrf
            @foreach ($donate as $item)
                <div class="row flex mx-auto mt-5 mb-3" style="width:40rem">
                    @foreach ($item as $thing)
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="donate" id="donate_{{ $thing['id'] }}" value="{{ $thing['sum'] }}">
                                <label class="form-check-label" for="donate_{{ $thing['id'] }}">
                                    {{ $thing['sum'] }}
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>  
            @endforeach
            
            <div class="row flex mx-auto mb-3" style="width:25rem">
                <div class="col">
                    <label>เลือกรูปภาพ</label>
                    <div class="border rounded bg-light p-4" id='attrachments'>
                        <p class='text-muted'>Drop Files here or click me!</p>
                    </div>
                </div>
            </div>
            <div class="row flex mx-auto" style="width:40rem">
                <div class="col">
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">รายละเอียดเพิ่มเติม</label>
                        <textarea class="form-control" name='des' id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                </div>
            </div>
            <div class="row flex mx-auto" style="width:40rem">
                <div class="col text-right">
                    <input type="hidden" name="project_id" value="{{ $project_id }}">
                    <input type="submit" value='ยืนยัน' class="btn btn-primary">
                </div>
            </div>
        </form>
        
    </div>
@endsection

@section('scripts')
@parent
<script src="{{ asset('dropzone-5.7.0\dist\dropzone.js') }}"></script>
<script>
    var attrachments = new Dropzone("#attrachments", { url: "/UploadImage", method: 'POST', maxFiles:1,
    init: function () {
        this.on("sending", function (file, xhr, data) {
            data.append('_token', "{{ csrf_token() }}");
            data.append('eleid', "attrachments");
            $('#attrachments').after("<input type='hidden' name='file_attrachments[]' value='"+file.name+"'>");
        })
    }
    });
</script>
@endsection