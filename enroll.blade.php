@extends('layouts.app')

<style>
    .enrollform{
        font-family: 'Mitr', sans-serif;
    }
    .enroll-left{
        float: left;
        background-color: #223963;
        padding: 80px 50px 0 80px;
        width: 35%;

    }
    .enroll-left h4{
        font-family: 'Mitr', sans-serif;
        color: white;
    }
    .enroll-left p{
        font-family: 'Mitr', sans-serif;
        color: white;
    }
    .enroll-r{
        float: right;
        background-color: white;
        width: 65%;
    }
    .btn-enroll{
        color: white;
        background-color: #f26d7d;
        border-radius: 3px;
        font-family: 'Mitr', sans-serif;
        font-size: 14px;
        border: none;
        transition: 0.3s;
        float: right;
    }
    .btn-enroll:hover{
        color: white;
        background-color: palevioletred;
        border-radius: 3px;
        font-family: 'Mitr', sans-serif;
        font-size: 14px;
        border: none;
    }
    @media (max-width: 575.98px){
        .enroll-r{
            width: 100%;
            margin-left: 10%;
        }
        .enroll-left{
            width: 100%;
        }
    }

</style>


@section('content')

    <div class="row">
        <div class="enroll-left">
            <h4>ลงทะเบียน</h4>
            <h4 class="pt-4">ข้อมูลสำหรับสมาชิกที่ต้องการเปิดเรี่ยไร</h4>
            <p class="pt-4">โปรดกรอกข้อมูลให้ถูกต้องและครบถ้วน ควรตรวจสอบให้ถี่ถ้วน</p>
        </div>

        <div class="enroll-r pt-5">
            <div class="row justify-content-center col-sm-10">
                <div class="col-md-10">
                    <form action="/enrollform" method="POST" enctype="multipart/form-data" class="enrollform
                    needs-validation" novalidate>
                        {{ csrf_field() }}
                        <div class="row mx-sm-0">
                            <div class="col px-sm-1">
                                <label>คำนำหน้า</label>
                                <select class="form-control" name="prefix">
                                    <option>นาย</option>
                                    <option>นาง</option>
                                    <option>นางสาว</option>
                                </select>
                            </div>
                            <div class="col px-sm-1">
                                <label>ชื่อ</label>
                                <input type="text" class="form-control" placeholder="ระบุชื่อ" name="firstname"
                                       value="testname1" id="validationCustom05" required>
                                <div class="invalid-feedback">
                                    กรุณาระบุชื่อ
                                </div>
                            </div>
                            <div class="col px-sm-1">
                                <label>นามสกุล</label>
                                <input type="text" class="form-control" placeholder="ระบุนามสกุล" name="lastname"
                                       value="testlastname" id="validationCustom05" required>
                                <div class="invalid-feedback">
                                    กรุณาระบุนามสกุล
                                </div>
                            </div>
                        </div>
                        <div class="form-group pt-2">
                            <label>ชื่อองค์กรหรือบริษัท (ถ้ามี)</label>
                            <input type="text" class="form-control" placeholder="องค์กรหรือบริษัท" name="company" value="testcompany">
                        </div>
                        <div class="form-group">
                            <label>เลขบัตรประชาชน</label>
                            <input type="text" class="form-control" placeholder="ระบุเลขบัตรประชาชน 13 หลัก"
                                   pattern="[0-9]{1}[0-9]{4}[0-9]{5}[0-9]{2}[0-9]{1}" name="idcard"
                                   value="2561188965475" id="validationCustom05" required>
                            <div class="invalid-feedback">
                                กรุณาระบุเลขบัตรประชาชน
                            </div>
                        </div>
                        <div class="row mx-sm-0">
                            <div class="col px-sm-1">
                                <label>บ้านเลขที่</label>
                                <input type="text" class="form-control" placeholder="ระบุบ้านเลขที่" name="housenum"
                                       value="88/9" id="validationCustom05" required>
                                <div class="invalid-feedback">
                                    กรุณาระบุบ้านเลขที่
                                </div>
                            </div>
                            <div class="col px-sm-1">
                                <label>ถนน</label>
                                <input type="text" class="form-control" placeholder="ระบุบถนน" name="road"
                                       value="testroad" id="validationCustom05" required>
                                <div class="invalid-feedback">
                                    กรุณาระบุถนน
                                </div>
                            </div>
                        </div>
                        <div class="row mx-sm-0">
                            <div class="col-6 px-sm-1">
                                <label>แขวง</label>
                                <input type="text" class="form-control" placeholder="ระบุแขวง" name="district"
                                       value="testdistrict" id="validationCustom05" required>
                                <div class="invalid-feedback">
                                    กรุณาระบุแขวง
                                </div>
                            </div>
                            <div class="col-6 px-sm-1">
                                <label>เขต</label>
                                <input type="text" class="form-control" placeholder="ระบุบเขต" name="country"
                                       value="testcountry" id="validationCustom05" required>
                                <div class="invalid-feedback">
                                    กรุณาระบุเขต
                                </div>
                            </div>
                        </div>
                        <div class="row mx-sm-0">
                            <div class="col-6 px-sm-1">
                                <label>จังหวัด</label>
                                <select name="province" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                    <option value="กรุงเทพมหานคร">กรุงเทพมหานคร</option>
                                    <option value="กระบี่">กระบี่ </option>
                                    <option value="กาญจนบุรี">กาญจนบุรี </option>
                                    <option value="กาฬสินธุ์">กาฬสินธุ์ </option>
                                    <option value="กำแพงเพชร">กำแพงเพชร </option>
                                    <option value="ขอนแก่น">ขอนแก่น</option>
                                    <option value="จันทบุรี">จันทบุรี</option>
                                    <option value="ฉะเชิงเทรา">ฉะเชิงเทรา </option>
                                    <option value="ชัยนาท">ชัยนาท </option>
                                    <option value="ชัยภูมิ">ชัยภูมิ </option>
                                    <option value="ชุมพร">ชุมพร </option>
                                    <option value="ชลบุรี">ชลบุรี </option>
                                    <option value="เชียงใหม่">เชียงใหม่ </option>
                                    <option value="เชียงราย">เชียงราย </option>
                                    <option value="ตรัง">ตรัง </option>
                                    <option value="ตราด">ตราด </option>
                                    <option value="ตาก">ตาก </option>
                                    <option value="นครนายก">นครนายก </option>
                                    <option value="นครปฐม">นครปฐม </option>
                                    <option value="นครพนม">นครพนม </option>
                                    <option value="นครราชสีมา">นครราชสีมา </option>
                                    <option value="นครศรีธรรมราช">นครศรีธรรมราช </option>
                                    <option value="นครสวรรค์">นครสวรรค์ </option>
                                    <option value="นราธิวาส">นราธิวาส </option>
                                    <option value="น่าน">น่าน </option>
                                    <option value="นนทบุรี">นนทบุรี </option>
                                    <option value="บึงกาฬ">บึงกาฬ</option>
                                    <option value="บุรีรัมย์">บุรีรัมย์</option>
                                    <option value="ประจวบคีรีขันธ์">ประจวบคีรีขันธ์ </option>
                                    <option value="ปทุมธานี">ปทุมธานี </option>
                                    <option value="ปราจีนบุรี">ปราจีนบุรี </option>
                                    <option value="ปัตตานี">ปัตตานี </option>
                                    <option value="พะเยา">พะเยา </option>
                                    <option value="พระนครศรีอยุธยา">พระนครศรีอยุธยา </option>
                                    <option value="พังงา">พังงา </option>
                                    <option value="พิจิตร">พิจิตร </option>
                                    <option value="พิษณุโลก">พิษณุโลก </option>
                                    <option value="เพชรบุรี">เพชรบุรี </option>
                                    <option value="เพชรบูรณ์">เพชรบูรณ์ </option>
                                    <option value="แพร่">แพร่ </option>
                                    <option value="พัทลุง">พัทลุง </option>
                                    <option value="ภูเก็ต">ภูเก็ต </option>
                                    <option value="มหาสารคาม">มหาสารคาม </option>
                                    <option value="มุกดาหาร">มุกดาหาร </option>
                                    <option value="แม่ฮ่องสอน">แม่ฮ่องสอน </option>
                                    <option value="ยโสธร">ยโสธร </option>
                                    <option value="ยะลา">ยะลา </option>
                                    <option value="ร้อยเอ็ด">ร้อยเอ็ด </option>
                                    <option value="ระนอง">ระนอง </option>
                                    <option value="ระยอง">ระยอง </option>
                                    <option value="ราชบุรี">ราชบุรี</option>
                                    <option value="ลพบุรี">ลพบุรี </option>
                                    <option value="ลำปาง">ลำปาง </option>
                                    <option value="ลำพูน">ลำพูน </option>
                                    <option value="เลย">เลย </option>
                                    <option value="ศรีสะเกษ">ศรีสะเกษ</option>
                                    <option value="สกลนคร">สกลนคร</option>
                                    <option value="สงขลา">สงขลา </option>
                                    <option value="สมุทรสาคร">สมุทรสาคร </option>
                                    <option value="สมุทรปราการ">สมุทรปราการ </option>
                                    <option value="สมุทรสงคราม">สมุทรสงคราม </option>
                                    <option value="สระแก้ว">สระแก้ว </option>
                                    <option value="สระบุรี">สระบุรี </option>
                                    <option value="สิงห์บุรี">สิงห์บุรี </option>
                                    <option value="สุโขทัย">สุโขทัย </option>
                                    <option value="สุพรรณบุรี">สุพรรณบุรี </option>
                                    <option value="สุราษฎร์ธานี">สุราษฎร์ธานี </option>
                                    <option value="สุรินทร์">สุรินทร์ </option>
                                    <option value="สตูล">สตูล </option>
                                    <option value="หนองคาย">หนองคาย </option>
                                    <option value="หนองบัวลำภู">หนองบัวลำภู </option>
                                    <option value="อำนาจเจริญ">อำนาจเจริญ </option>
                                    <option value="อุดรธานี">อุดรธานี </option>
                                    <option value="อุตรดิตถ์">อุตรดิตถ์ </option>
                                    <option value="อุทัยธานี">อุทัยธานี </option>
                                    <option value="อุบลราชธานี">อุบลราชธานี</option>
                                    <option value="อ่างทอง">อ่างทอง </option>
                                    <option value="อื่นๆ">อื่นๆ</option>
                                </select>
                            </div>
                            <div class="col-4 px-sm-1">
                                <label>รหัสไปรษณีย์</label>
                                <input type="text" class="form-control" placeholder="ระบุรหัสไปรษณีย์"
                                       name="postalcode" pattern="[0-9]{5}" value="15200" id="validationCustom05" required>
                                <div class="invalid-feedback">
                                    กรุณากรอกรหัสไปรษณีย์
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>เบอร์โทรศัพท์</label>
                            <input type="text" class="form-control" placeholder="ระบุเบอร์โทรศัพท์ 10 หลัก"
                                   pattern="[0-9]{3}[0-9]{3}[0-9]{4}" name="tel" value="0856589654" id="validationCustom05" required>
                            <div class="invalid-feedback">
                                กรุณากรอกเบอร์โทรศัพท์
                            </div>
                        </div>
                        <div class="form-group">
                            <label >แนบรูปภาพบัตรประชาชน</label>
                            <input type="file" class="form-control-file" name="idcardimg" id="validationCustom05" required>
                            <div class="invalid-feedback">
                                กรุณาแนบรูปภาพบัตรประชาชน
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                <label class="form-check-label" for="invalidCheck">
                                    ข้าพเจ้าได้ทำการตรวจสอบข้อมูลทั้งหมดอย่างที่ถ้วนแล้ว
                                </label>
                                <div class="invalid-feedback">
                                    กรุณากดยืนยันเมื่อทำการตรวจสอบข้อมูล
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input class="btn-enroll mb-3 mt-3 pt-1 pl-5 pb-1 pr-5" type="submit" name="submit"
                                   value="ลงทะเบียน">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        @if(session('success_message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{session('success_message')}}
            </div>
        @endif

    </div>
    {{--@include('sweetalert::alert')--}}
@endsection

@section('scripts')
    <script>
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
@endsection
