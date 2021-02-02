@extends('layouts.adminapp')

@section('content')
    <main class='container'>
        @if(count($reports) == 0)
            <div class='card mt-3 bg-warning'>
                <p class='text-center pt-3'>no infomation.</p>
            </div>
        @endif
        @foreach($reports as $report)

        <div class="card mb-3">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="col-2">ชื่อโครงการ</th>
                            <th class="col-2">ปัญหา</th>
                            <th class="col-2">ข้อความ</th>
                            <th class="col-1">ข้อมูลโครงการ</th>
                            <th class="col-1">ข้อมูลผู้ใช้</th>
                            <th class="col-2">action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$report->projectname}}</td>
                            <td><b>{{$op_report[$report->problem]}}</b></td>
                            <td class="text-danger">{{$report->remark}}</td>
                            <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="
                .bd-example-modal-lg"><i class="fa fa-eye"></i></button></td>
                            <td><button class="btn btn-success"><i class="fa fa-user"></i></button></td>
                            <td><form action="{{route('admin.report_authorize')}}" method="POST">
                                    @csrf
                                    <select name="status" id="status" class="form-control">
                                        <option value="0">--เลือก--</option>
                                        <option value="3">อยู่ในระหว่างดำเนินการตรวจสอบ</option>
                                        <option value="2">ตรวจสอบแล้ว ให้ดำเนินการต่อ</option>
                                        <option value="1">ตรวจสอบแล้ว ไม่ให้ดำเนินการต่อ</option>
                                    </select>
                                    <input type="hidden" name="project_id" value="{{ $report->project_id }}">
                                    <input type="submit" value="ยืนยัน" class='btn btn-primary form-control mt-2'>
                                </form></td>
                        </tr>

                    </tbody>
                </table>
            </div>

            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content p-4">
                        <h5>ชื่อโครงการ : {{$report->projectname}}</h5>
                        <p>รายละเอียดโครงการ : {{$report->detail}}</p>
                        <p>วัตถุประสงค์ : {{$report->object}}</p>
                        <p>เบอร์โทรศัพท์ : {{$report->tel}}</p>
                        <p>อีเมล : {{$report->email}}</p>
                        <table class="w-25">
                            <tr><p>บัญชีธนาคาร</p>
                                <th>ชื่อบัญชี</th>
                                <td>{{ $report->namebank}}</td>
                            </tr>
                            <tr>
                                <th>เลขที่บัญชี</th>
                                <td>{{ $report->bank}}</td>
                            </tr>
                            <tr>
                                <th>ธนาคาร</th>
                                <td>{{ $report->numberbank}}</td>
                            </tr>
                            <tr>
                                <th>สาขา</th>
                                <td>{{ $report->branch}}</td>
                            </tr>
                        </table>
                        {{--                                        <img src="{{asset('image/'.$report->acimg)}}" class="card-img w-50" alt="...">--}}
                    </div>
                </div>
            </div>
{{--        <div class="row no-gutters">--}}
{{--            <div class="col-md-4">--}}
{{--            <img src="{{asset('image/'.$report->eviimg)}}" class="card-img" alt="...">--}}
{{--            </div>--}}
{{--            <div class="col-md-8">--}}
{{--            <div class="card-body">--}}
{{--                <h5 class="card-title">(<red class='text-danger'>{{$op_report[$report->problem]}}</red>){{$report->projectname}}</h5>--}}
{{--                <h5 class="card-title">{{$report->projectname}}</h5>--}}
{{--                <p class="card-text">{{$report->detail}}</p>--}}
{{--                <p class="card-text"><small class="text-muted">วันที่เปิดรับบริจาค {{ $report->startat . ' - ' . $report->endat }}</small></p>--}}
{{--                <ul class="list-group list-group-flush">--}}
{{--                    <li class="list-group-item"><i class="fas fa-tty"></i> {{$report->tel}}</li>--}}
{{--                    <li class="list-group-item"><i class="fas fa-envelope-open-text"></i> {{$report->email}}</li>--}}
{{--                    <li class="list-group-item">--}}
{{--                    <div class="btn-group" role="group" aria-label="Basic example">--}}
{{--                        <form action="{{route('admin.report_authorize')}}" method="POST">--}}
{{--                            @csrf--}}
{{--                            <select name="status" id="status" class="form-control">--}}
{{--                                <option value="0">--เลือก--</option>--}}
{{--                                <option value="3">อยู่ในระหว่างดำเนินการตรวจสอบ</option>--}}
{{--                                <option value="2">ตรวจสอบแล้ว ให้ดำเนินการต่อ</option>--}}
{{--                                <option value="1">ตรวจสอบแล้ว ไม่ให้ดำเนินการต่อ</option>--}}
{{--                            </select>--}}
{{--                            <input type="hidden" name="project_id" value="{{ $report->project_id }}">--}}
{{--                            <input type="submit" value="ยืนยัน" class='btn btn-primary form-control mt-2'>--}}
{{--                        </form>--}}

{{--                    </div>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        </div>
        @endforeach
    </main>
@endsection
