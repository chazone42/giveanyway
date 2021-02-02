@extends('layouts.adminapp')

@section('content')
    <main class='container'>
        @if(count($projects) == 0)
            <div class='card mt-3 bg-warning'>
                <p class='text-center pt-3'>ยังไม่มีการเสนอโครงการ</p>
            </div>
        @endif
        @foreach($projects as $project)

        <div class="card mb-3">
            <form action="{{route('admin.projectAuthorize')}}" method="POST">
                @csrf
            <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ชื่อโครงการ</th>
                    <th scope="col">จุดประสงค์</th>
                    <th scope="col">ระยะเวลา</th>
                    <th scope="col">ยอดรวม</th>
                    <th scope="col">ข้อมูลบัญชี</th>
                    <th scope="col">แผนการใช้เงิน</th>
                    <th scope="col">ข้อมูลโครงการ</th>
                    <th scope="col">ข้อมูลผู้ใช้</th>
                    <th scope="col">สถานะ</th>
                    <th scope="col">action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{$project->projectname}}</td>
                    <td>{{$project->object}}</td>
                    <td>{{ $project->startat}} <br> ถึง {{ $project->endat }}</td>
                    <td>{{ $project->sum}} บาท</td>
                    <td>ชื่อบัญชี : {{ $project->namebank}} <br> เลขที่บัญชี : {{ $project->bank}} <br> ธนาคาร : {{
                    $project->numberbank}} <br> สาขา : {{ $project->branch}}</td>
                    <td>
                        ค่าต้นไม้ 20000<br>
                        ค่าแรงงาน 6000
{{--                    @foreach ($plan as $item)--}}
{{--                        {{$item->list}}--}}
{{--                        {{$item->qty}}--}}
{{--                    @endforeach--}}
                    </td>
                    <td>
                        <button type="button" class="btn btn-warning mt-2" data-toggle="modal" data-target="
                        .bd-example-modal-xl"><i class="fa fa-eye"></i>
                        </button>
                    </td>
                    <td><button class="btn btn-success mt-2"><i class="fa fa-user"></i></button></td>
                    <td><ul class="list-group list-group-flush">
                            @foreach ($op_status as $key => $item)
                                <li class="list-group">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="status" value='{{ $key }}'
                                               @if ($project->status == $key)
                                               checked
                                            @endif>
                                        <label class="form-check-label" for="status">{{ $item }}</label>
                                    </div>
                                </li>
                            @endforeach
                        </ul></td>
                    <td><div class="btn" role="group" aria-label="Basic example">
                            <input type="hidden" name="id" value="{{ $project->id }}">
                            <input type="submit" value="ยืนยัน" class='btn btn-primary form-control'>
                        </div></td>
                </tr>

                </tbody>
            </table>
            </div>

            </form>
            <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog"
                 aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="container-fluid m-3">
                            <div class="row">
                                <h5 class="col-md-12">รายละเอียดโครงการ</h5>
                                <div class="col-md-4">
                                    <img src="{{asset('image/'.$project->acimg)}}" class="card-img" alt="...">
                                </div>
                                <div class="col-md-8">
                                    ชื่อโครงการ : {{$project->projectname}} <br>
                                    รายละเอียด : {{$project->detail}} <br>
                                    จุดประสงค์ : {{$project->object}} <br>
                                </div>
                            </div>

                            <div class="row pt-4">
                                <h5 class="col-md-12">บัญชีธนาคาร</h5>
                                <div class="col-md-4">
                                    <img src="{{asset('image/'.$project->acimg)}}" class="card-img" alt="...">
                                </div>
                                <div class="col-md-8">
                                    ชื่อบัญชี : {{ $project->namebank}} <br> เลขที่บัญชี : {{ $project->bank}} <br>
                                    ธนาคาร : {{$project->numberbank}} <br> สาขา : {{ $project->branch}}
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
{{--        <div class="row no-gutters">--}}
{{--            <div class="col-md-4">--}}
{{--            <img src="{{asset('image/'.$project->acimg)}}" class="card-img" alt="...">--}}
{{--            </div>--}}
{{--            <div class="col-md-8">--}}
{{--                <div class="card-body">--}}
{{--                    <form action="{{route('admin.projectAuthorize')}}" method="POST">--}}
{{--                        @csrf--}}
{{--                    <h5 class="card-title">{{$project->projectname}}</h5>--}}
{{--                    <p class="card-text">{{$project->object}}</p>--}}
{{--                    <p class="card-text"><small class="text-muted">ระยะเวลาบริจาค {{ $project->startat . ' ถึง ' .--}}
{{--                $project->endat}}</small></p>--}}
{{--                    <p class="card-text">ยอดเงินที่ต้องการ : <b>{{ $project->sum}}</b> </p>--}}
{{--                    <h5 class="w-25">บัญชีธนาคาร</h5>--}}
{{--                    <table class="w-25">--}}
{{--                        <tr>--}}
{{--                            <th>ชื่อบัญชี</th>--}}
{{--                            <td>{{ $project->namebank}}</td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <th>เลขที่บัญชี</th>--}}
{{--                            <td>{{ $project->bank}}</td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <th>ธนาคาร</th>--}}
{{--                            <td>{{ $project->numberbank}}</td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <th>สาขา</th>--}}
{{--                            <td>{{ $project->branch}}</td>--}}
{{--                        </tr>--}}
{{--                    </table>--}}

{{--                        <ul class="list-group list-group-flush">--}}
{{--                        @foreach ($op_status as $key => $item)--}}
{{--                            <li class="list-group-item">--}}
{{--                                <div class="form-check">--}}
{{--                                    <input type="radio" class="form-check-input" name="status" value='{{ $key }}'--}}
{{--                                    @if ($project->status == $key)--}}
{{--                                        checked--}}
{{--                                    @endif--}}
{{--                                    >--}}
{{--                                    <label class="form-check-label" for="status">{{ $item }}</label>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        @endforeach--}}
{{--                        </ul>--}}

{{--                        <div class="btn-group" role="group" aria-label="Basic example">--}}
{{--                            <div class="card" style="width: 18rem;">--}}
{{--                                <input type="hidden" name="id" value="{{ $project->id }}">--}}
{{--                                <input type="submit" value="ยืนยัน" class='btn btn-primary form-control mt-2'>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

        </div>

        @endforeach
    </main>
@endsection

