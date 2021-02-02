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

    .ban-title h3, small{
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

    @media (max-width: 991.98px)  {
        .left{
            width: 100%;
        }
    }


</style>


@section('content')
    {{--    <canvas id="myChart" width="400" height="400"></canvas>--}}
    <div class="banner">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="left pt-5 pr-5 pb-5">
                        <div class="ban-title">
                            <h3>ช่วยเหลือไฟไฟม้ซอยตากสินเสียหายกว่า 200 หลัง1</h3>
                        </div>
                        <div class="ban-detail d-none d-sm-block">
                            <p>ไบโอวิลล์คอร์ปวอล์กสโลว์ ล้มเหลว สแตนดาร์ดศิลปวัฒนธรรมเดโมบอยคอตต์ดีพาร์ทเมนท์
                                หลินจือ แตงโมซ้อมยุราภิรมย์แล็บ จิตเภทเลคเชอร์แมชีน โยโย่ รัมเฮอร์ริเคนเซลส์รามเทพโค้ก แอ็กชั่นบาร์บี้ยิว</p>
                        </div>
                        <div class="pt-3 ban-update">
                            <h5>ได้รับ 600,554 บาทแล้ว</h5>
                            <small>ยอดรวมเมื่อวันที่ 18/08/63</small>
                        </div>
                        <button class="but-more mt-3 pt-1 pl-4 pb-1 pr-4">อ่านเพิ่มเติม</button>
                    </div>
                    <div class="right d-none d-lg-block"  style="background-color: #f26d7d">
                        <img src="banner/banner01.jpg" height="350">
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="left pt-5 pr-5 pb-5">
                        <div class="ban-title">
                            <h3>ช่วยเหลือไฟไฟม้ซอยตากสินเสียหายกว่า 200 หลัง22</h3>
                        </div>
                        <div class="ban-detail d-none d-sm-block">
                            <p>ไบโอวิลล์คอร์ปวอล์กสโลว์ ล้มเหลว สแตนดาร์ดศิลปวัฒนธรรมเดโมบอยคอตต์ดีพาร์ทเมนท์
                                หลินจือ แตงโมซ้อมยุราภิรมย์แล็บ จิตเภทเลคเชอร์แมชีน โยโย่ รัมเฮอร์ริเคนเซลส์รามเทพโค้ก แอ็กชั่นบาร์บี้ยิว</p>
                        </div>
                        <div class="pt-3 ban-update">
                            <h5>ได้รับ 600,554 บาทแล้ว</h5>
                            <small>ยอดรวมเมื่อวันที่ 18/08/63</small>
                        </div>
                        <button class="but-more mt-3 pt-1 pl-4 pb-1 pr-4">อ่านเพิ่มเติม</button>
                    </div>
                    <div class="right d-none d-lg-block"  style="background-color: #f26d7d">
                        <img class="d-block" src="banner/banner01.jpg" height="350">
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="left pt-5 pr-5 pb-5">
                        <div class="ban-title">
                            <h3>ช่วยเหลือไฟไฟม้ซอยตากสินเสียหายกว่า 200 หลัง22</h3>
                        </div>
                        <div class="ban-detail d-none d-sm-block">
                            <p>ไบโอวิลล์คอร์ปวอล์กสโลว์ ล้มเหลว สแตนดาร์ดศิลปวัฒนธรรมเดโมบอยคอตต์ดีพาร์ทเมนท์
                                หลินจือ แตงโมซ้อมยุราภิรมย์แล็บ จิตเภทเลคเชอร์แมชีน โยโย่ รัมเฮอร์ริเคนเซลส์รามเทพโค้ก แอ็กชั่นบาร์บี้ยิว</p>
                        </div>
                        <div class="pt-3 ban-update">
                            <h5>ได้รับ 600,554 บาทแล้ว</h5>
                            <small>ยอดรวมเมื่อวันที่ 18/08/63</small>
                        </div>
                        <button class="but-more mt-3 pt-1 pl-4 pb-1 pr-4">อ่านเพิ่มเติม</button>
                    </div>
                    <div class="right d-none d-lg-block"  style="background-color: #f26d7d">
                        <img class="d-block" src="banner/banner01.jpg" height="350">
                    </div>
                </div>

            </div>

            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

    </div>

    <div class="container pt-4">
        <div class="row justify-content-center">

            <div class="btn-toolbar mb-3">
                <div class="cate">
                    <button type="button" class="btn-cate mr-3 pt-1 pl-4 pb-1 pr-4 cate-active">ทั้งหมด</button>
                    <button type="button" class="btn-cate mr-3 pt-1 pl-4 pb-1 pr-4">เยาวชน</button>
                    <button type="button" class="btn-cate mr-3 pt-1 pl-4 pb-1 pr-4">ผู้ป่วย</button>
                    <button type="button" class="btn-cate mr-3 pt-1 pl-4 pb-1 pr-4">สัตว์</button>
                    <button type="button" class="btn-cate mr-3 pt-1 pl-4 pb-1 pr-4">สิ่งแวดล้อม</button>
                    <button type="button" class="btn-cate mr-3 pt-1 pl-4 pb-1 pr-4">อื่นๆ</button>
                    <button type="button" class="btn-cate mr-3 pt-1 pl-4 pb-1 pr-4">ใกล้ปิด</button>
                    <button type="button" class="btn-cate mr-3 pt-1 pl-4 pb-1 pr-4">ยังไม่ถึง 50%</button>
                </div>
            </div>

            <div class="col-md-12">

                {{--                @if(session('success_message'))--}}
                {{--                    <div class="alert alert-success">--}}
                {{--                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
                {{--                            <span aria-hidden="true">&times;</span>--}}
                {{--                        </button>--}}
                {{--                        {{session('success_message')}}--}}
                {{--                    </div>--}}
                {{--                @endif--}}


                <div class="row justify-content-center">
                    @foreach($stepforms as $stepform)

                        <a href="{{ action('PostController@show', $stepform->id) }}" class="card-deck m-1 mb-4"
                           style="text-decoration: none; color: inherit">

                            <div class="card" style="width: 20rem;">
                                @if ($stepform->status == 2)
                                    <img class="card-img-top" src="{{ url('image/'.$stepform->pjimg) }}">
                                @elseif ($stepform->status == 3)
                                    <img class="card-img-top" src="banner/sus.png">
                                @endif

                                <div class="progress " style="border-radius: 0; height: 8px;">
                                    @if ($stepform->status == 2)
                                        <div class="progress-bar" role="progressbar" style="width: 70%;
                                height: 50px; background: #f26d7d"
                                             aria-valuenow="70"
                                             aria-valuemin="0" aria-valuemax="100"></div>
                                    @elseif ($stepform->status == 3)
                                        <div class="progress-bar" role="progressbar" style="background: #b1b1b1"
                                             aria-valuenow="70"
                                             aria-valuemin="0" aria-valuemax="100"></div>@endif


                                </div>
                                <div class="card-body">
                                    <div class="card-detail">
                                        <div class="w-50 border-bottom" style="float: left">
                                            @if ($stepform->status == 2)
                                                <p>ได้รับแล้ว<br>300,000 บาท</p>
                                            @elseif ($stepform->status == 3)
                                                <p class="text-muted">ได้รับแล้ว<br>300,000 บาท</p>@endif
                                        </div>
                                        <div class="w-50 border-bottom" style="float:right;  text-align: right;">
                                            @if ($stepform->status == 2)
                                                <p>ยอดที่ต้องการ<br>{{ $stepform->sum }} บาท</p>
                                            @elseif ($stepform->status == 3)
                                                <p class="text-muted">ยอดที่ต้องการ<br>{{ $stepform->sum }} บาท</p>@endif
                                        </div>
                                    </div>

                                    <div class="card-detail2" style="padding-top: 70px;">
                                        <h5 class="card-title">{{ $stepform->projectname }}</h5>
                                        <p class="card-text crop-text">{{ $stepform->detail }}</p>
                                    </div>
                                </div>
                                <div class="card-footer" style="color: #f26d7d; font-family: 'Mitr', sans-serif">
                                    <span class="text"> เหลือเวลาอีก 110 วัน</span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection


