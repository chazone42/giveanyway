@extends('layouts.app')

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


</style>

@section('content')
    <div class="container shadow-sm rounded mt-3 p-3">
        <h3>โครงการของฉัน</h3>
        <hr>
            @foreach ($myproject as $row)
                <div class="row p-2">
                @foreach ($row as $item)
                    <div class="col-sm">
                        <div class="card" style="width: 18rem;">
                            <img src="{{ url('image/'.$item->acimg) }} " class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->projectname }}</h5>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <a href="{{ url('/withdraw/'.$item->id) }}" class="btn btn-block
                                        btn-primary">ชี้แจงการถอนเงิน</a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="{{ url('/myproject/'.$item->id) }}" class="btn btn-block btn-primary">แก้ไขโครงการ</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            @endforeach
    </div>
@endsection
