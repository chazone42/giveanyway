@extends('layouts.app')

<style>
    * {
        box-sizing: border-box;
    }

    .center-cropped {
        width: 540px;
        height: 420px;
        overflow:hidden;
        border-radius: 5px;
    }
    .center-cropped img {
        height: 100%;
        min-width: 100%;
        left: 50%;
        position: relative;
        transform: translateX(-50%);
    }
    .title{
        font-family: 'Mitr', sans-serif;
    }
    .text-detail{
        font-family: 'Taviraj', sans-serif;
    }
    .text-normal{
        font-family: 'Mitr', sans-serif;
    }
    .f{
        font-size: 30px;
        color: #b7b7b7;
    }
    .text-contxt{
        font-family: 'Mitr', sans-serif;
        font-size: 14px;
        color: #b7b7b7;
    }
    div.sticky {
        position: -webkit-sticky;
        position: sticky;
    }
    .stick-txt{
        padding: 20px 5px 20px 20px;
        border-radius: 3px;
        border-color: #f26d7d;
        border-style: solid;
    }

    .card-pie{
        width: 360px;
        height: 230px;
        background-color: white;
        border-radius: 3px;
        border-color: #f26d7d;
        border-style: solid;
        box-shadow: 0px 0px 16px -1px rgba(0,0,0,0.24);
    }
    .txt-title h4{
        color: #f26d7d;
        font-family: 'Mitr', sans-serif;
    }
    .cont-box{
        height: 500px;
        border-radius: 3px;
        border-color: #b7b7b7;
        border-style: solid;
    }
    button.stick-but-txt{
        background-color: #f26d7d;
        text-align:center;
        color: white;
        font-size: 18px;
        font-family: 'Mitr', sans-serif;
    }
    .plantxt h5{
        color: black;
        font-family: 'Mitr', sans-serif;
    }
    .plantxt p {
        color: black;
        font-family: 'Taviraj', sans-serif;
    }
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    th, td {
        padding: 15px;
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
    .image-box{
        float: left;
        width: 50%;
    }
    .image-box-sm{
        width: 100%;
    }
    .image-box-r{
        float: right;
        width: 50%;
    }
    .detail-box{
        width: 75%;
    }
    .sticky-box{
        width: 20%;
        padding-left: 2%;
    }
    @media  (max-width: 991.98px)  {
        .image-box{
            width: 98%;
        }
        .image-box-sm{
            width: 25%;
        }
        .image-box-r{
            width: 100%;
        }
        div.sticky {
            position: relative;
        }
        .detail-box{
            width: 100%;
        }
        .sticky-box{
            width: 100%;
        }
    }
</style>

@section('content')


    <div class="bg-white">
        <div class="container pt-4 pb-5">
            <div class="row justify-content-center">
                <div class="col-12">
                    @foreach($stepforms as $stepform)

                        <div class="row">
                            <div class="image-box">
                                <img src="{{ url('image/'.$gallery[0]->imageName) }}" class="img-fluid rounded">
                                <div class='row mt-2 image-box-sm'>
                                    @foreach ($gallery as $item)
                                        <div class='col-lg-2'>
                                            <a href="{{ url('image/'.$item->imageName) }}" data-toggle="modal" data-name="{{ $item->imageName }}" class="col-md-4">
                                                <img src="{{ url('image/'.$item->imageName) }}" class="img-fluid">
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="image-box-r">
                                @if($stepform->status == 3)
                                    <div class="alert alert-danger" role="alert" style="font-family: 'Mitr', sans-serif;">
                                        <h4 class="alert-heading" style="font-family: 'Mitr', sans-serif;">โครงการนี้อยู่ระหว่างตรวจสอบ ไม่สามารถร่วมบริจาคได้</h4>
                                        <p>เนื่องจากไก้รับรายงานจากผูใช้จำนวนหนึ่ง
                                            จึงต้องทำการตรวจสอบเพิ่อความปลอดภัยในการบริจาคของทุกท่าน</p>

                                    </div>
                                @endif
                                <h3 class="title">{{ $stepform->projectname }}
                                </h3>
                                <p class="text-detail">{{ $stepform->detail }}</p>

                                <div class="align-text-bottom mt-4 text-normal">
                                    <p>วัตถุประสงค์ {{ $stepform->object }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="row pt-2">
                            <div class="text-contxt">
                                <span class="f"><i class="fa fa-phone-square w"></i></span> {{ $stepform->tel }}<br>
                                <span class="f"><i class="fa fa-envelope-square"></i></span> {{ $stepform->email }}
                            </div>
                        </div>

                        <div class="row pt-4">
                            <div class="detail-box">
                                <div class="txt-title" style="color: #f26d7d">
                                    <h4 style="font-family: 'Mitr', sans-serif">รายละเอียด</h4>
                                </div>
                                <div class="mt-5">
                                    <div class="w-100" style="color: #f26d7d; float: left;">
                                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill"
                                                   href="#pills-home" role="tab" aria-controls="pills-home"
                                                   aria-selected="true">การใช้เงิน</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill"
                                                   href="#pills-profile" role="tab" aria-controls="pills-profile"
                                                   aria-selected="false">แผนการใช้เงิน</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="pills-contact-tab" data-toggle="pill"
                                                   href="#pills-contact" role="tab" aria-controls="pills-contact"
                                                   aria-selected="false">Message</a>
                                            </li>
                                        </ul>
                                        <div class="row">
                                            <div class="tab-content border rounded w-100" id="pills-tabContent">
                                                <div class="tab-pane fade show active p-3" id="pills-home"
                                                     role="tabpanel"
                                                     aria-labelledby="pills-home-tab">
                                                    @foreach ($statement as $item)
                                                        <div class="row">
                                                        <div class="w-75 float-left pt-2 pl-4">
                                                            <h5 style="color: black; font-family: 'Mitr', sans-serif">{{ $item['date'] }}</h5>
                                                            <p class="text-break" style="color: black; font-family: 'Taviraj', sans-serif">{{ $item['des'] }}</p>
                                                        </div>
                                                        <div class="w-25 float-right pt-2 pr-3">
                                                            <div class="out float-right">
                                                                <dt class="d-inline" style="font-family: 'Mitr', sans-serif;color: black;">เงินออก</dt>
                                                                <dd class="d-inline pt-1 pl-2 pr-2 pb-1 border rounded"
                                                                    style=";font-family: 'Mitr', sans-serif; color:
                                                                    black">{{
                                                                    $item['sum'] }} ฿</dd>
                                                            </div>
                                                        </div>
                                                        </div>
                                                        <div class="row">
                                                            <button type="button" class="btn btn-light"
                                                                    data-toggle="modal" data-target="#evii">
                                                                <i class="fa fa-thumbs-down"></i> ฉันคิดว่าหลักฐานทีนำมาชี้แจงไม่เหมาะสม</button>
                                                        </div>
                                                    @endforeach
                                                </div>

                                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                                    <div class="w-100 p-4">
                                                        <table class='table'>
                                                            <thead>
                                                            <tr>
                                                                <th class='col'>รายการ</th>
                                                                <th class='col'>จำนวนเงิน</th>
                                                            </tr>
                                                            </thead>
                                                            @foreach ($plan as $item)
                                                                <tr>
                                                                    <td>
                                                                        {{$item->list}}
                                                                    </td>
                                                                    <td>
                                                                        {{$item->qty}}
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </table>

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="evii" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"
                                                    id="exampleModalLongTitle">รายงานหลักฐานไม่น่าเชื่อถือ</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="evireport1"
                                                           class="custom-control-input" value='1'>
                                                    <label
                                                        class="custom-control-label">หลักฐานที่นำมาชี้แจงไม่มีอยู่จริง</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="evireport2"
                                                           class="custom-control-input" value='2'>
                                                    <label
                                                        class="custom-control-label">หลักฐานที่นำมาชี้แจงไม่ตงกับยอดเงินที่ใช้</label>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">ยกเลิก</button>
                                                <button type="button" class="btn btn-primary">เสร็จสิ้น</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> {{-- col-9--}}

                            <div class="sticky-box">
                                <div class="sticky">
                                    <div class="stick-txt">
                                        <p class="text-normal">ได้รับแล้ว</p>
                                        <h4 class="title" style="color: #f26d7d">85,133 บาท</h4>
                                        <p class="text-normal">ยอดที่ต้องการ<br>
                                            {{ $stepform->sum }} บาท</p>
                                        <p class="text-normal">สิ้นสุดวันที่<br>
                                            23 ธันวาคม 2563</p>
                                    </div>
                                    <button type="button"
                                            class="btn mt-2 w-100 stick-but-txt"
                                            data-toggle="modal"
                                            data-target="#exampleModalCenter1"
                                            @if ($stepform->status == 3)
                                            disabled
                                        @endif
                                    >
                                        ร่วมบริจาค
                                    </button>
                                    <button type="button" class="btn mt-2 w-100 bg-secondary stick-but-txt"
                                            data-toggle="modal" data-target="#report_module">
                                        รายงานความไม่เหมาะสม
                                    </button>
                                    <div>
                                        <p>@if ($stepform->status == 3)
                                                ขณะนี้มีการรายงานโครงการ 1 ครั้ง</p>@endif
                                    </div>


                                </div>
                                <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">บริจาคให้กับ <br>{{ $stepform->projectname }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{ route('donate', ['id' => $stepform->id]) }}">
                                                    @csrf
                                                    <div class="input-group mb-3">
                                                        <input type="text" name="input-baht" class="form-control" placeholder="จำนวนเงินบริจาค" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                        <span class="input-group-text" id="basic-addon2">บาท</span>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                                        <input type='submit' class="btn btn-primary" value="ยืนยัน">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="report_module" tabindex="-1"
                                     role="dialog" aria-labelledby="report_module" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">รายงานความไม่เหมาะสม</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('report') }}" method="POST">
                                                    @csrf
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="mreport1" name="mreport" class="custom-control-input" value='1'>
                                                        <label class="custom-control-label"
                                                               for="mreport1">รายงานโครงการไม่เหมาะสม</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="mreport2" name="mreport" class="custom-control-input" value='2'>
                                                        <label class="custom-control-label"
                                                               for="mreport2">รายงานผู้ใช้ไม่เหมาะสม</label>
                                                    </div>
                                                    <div class="form-group mt-2">
                                                        <label for="remark_report">รายละเอียดเพิ่มเติม</label>
                                                        <textarea class="form-control" name="remark_report" rows="3"></textarea>
                                                    </div>
                                                    <div class="row mt-4">
                                                        <div class="col">
                                                            <input type="reset" class="btn btn-danger form-control" value="cancel">
                                                        </div>
                                                        <div class="col">
                                                            <input type="hidden" name="project_id" value={{ $stepform->id }}>
                                                            <input type="submit" class="btn btn-primary form-control" value="confirm">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            @endforeach
                        </div>
                </div>
            </div>
        </div>
        <div id='popup-img' class="modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="modalClose()">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script>
        $(document).ready(function(){
            $('a[data-toggle="modal"]').click(function (event){
                event.preventDefault();
                var title = $(this).data('name');
                var source = $(this).attr('href');
                $('#popup-img').find(".modal-title").text(title);
                $('#popup-img').find(".modal-body").html('<center><img src="'+source+'" class="image-fluid w-75' +
                    '"/></center>');
                $('#popup-img').modal('show');
            });
        });
        function modalClose(){
            $('#popup-img').modal('hide');
        }

        new Chart(document.getElementById("doughnut-chart"), {
            type: 'doughnut',
            data: {
                datasets: [
                    {
                        backgroundColor: ["#f26d7d", "#223964"],
                        data: [2478,5267],
                    }
                ],
                // labels: ["Africa", "Asia"],
            },
            options: {
            }
        });

        var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["2015-01", "2015-02", "2015-03", "2015-04", "2015-05", "2015-06", "2015-07", "2015-08", "2015-09", "2015-10", "2015-11", "2015-12"],
                datasets: [{
                    data: [16, 19, 3, 5, 2, 3, 20, 3, 5, 6, 2, 1],
                    backgroundColor: "#cccccc",
                    hoverBackgroundColor:"#223964",
                    borderColor: "#f26d7d",
                    weight:"7",
                    borderWidth: 0
                }]
            },
            options: {
                responsive: false,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

    </script>
@endsection
