@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('dropzone-5.7.0\dist\dropzone.css') }}">
    <style>
        .step-form {
            font-family: 'Mitr', sans-serif;
        }

        .form-section {
            display: none;
        }

        .form-section.current {
            display: inherit;
        }

        .condi1 {
            background-color: white;
            padding-top: 30px;
            padding-left: 20px;
            padding-bottom: 20px;
            border-radius: 5px;
        }

        .condi1 h5 {
            color: #f26d7d;
            font-family: 'Mitr', sans-serif;
        }

        .condi2 h5 {
            color: white;
            font-family: 'Mitr', sans-serif;
        }

        .condi-ti h4 {
            color: black;
            font-family: 'Mitr', sans-serif;
        }

        .condi2 {
            padding: 30px 20px 20px 20px;
            border-radius: 5px;
            background-color: #223964;
        }

        .condi2 h5 {
            color: white;
        }

        .condi2 ol {
            color: white;
        }

        .form-navigation button {
            background-color: #f26d7d;
            color: white;
        }

        .step-info {
            color: white;
            background-color: #223963;
            border-radius: 3px;

        }
        .act {
            background-color: #f26d7d;
        }
        .condi-le{
            float: left;
            width: 50%;
        }
        .condi-ri{
            float: right;
            width: 50%;
        }
        .box-section{
            width: 50%;
        }


        @media (max-width: 1199.98px)  {
            .condi-le{
                width: 100%;
            }
            .condi-ri{
                width: 100%;
            }
            .box-section{
                width: 90%;
            }
        }
    </style>

@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                @if(session('success_message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{session('success_message')}}
                    </div>
                @endif


                <form action="/stepform" method="POST" enctype="multipart/form-data" class="step-form needs-validation" novalidate>
                    @csrf
                    <div class="form-section">
                        <h4 class="text-center pt-4" style="font-family: 'Mitr',sans-serif">โปรดอ่านให้ละเอียดก่อนเสนอโครงการ</h4>
                        <div class="condi-le">
                            <div class="condi1">
                                <h5>ผู้ที่มีคุณสมบัติต่อไปนี้ไม่สามารถเปิดเรี่ยไรได้</h5>
                                <ol>
                                    <li>ผู้ที่อายุต่ำกว่า 16 ปี</li>
                                    <li>ผู้ที่พนักงานเจ้าหน้าที่เห็นว่ามีหลักฐานไม่น่าไว้วางใจ</li>
                                </ol>
                            </div>
                            <div class="condi1 mt-3">
                                <h5>โครงการที่มีจุดประสงค์ต่อไปนี้ไม่สามารถเปิดเรี่ยไรได้</h5>
                                <ol>
                                    <li>เรี่ยไรเพื่อจ่ายค่าปรับให้กับตนเองและผู้อื่น</li>
                                    <li>เรี่ยไรเพื่อผลประโยชน์ของตนเองเกินความจำเป็น</li>
                                </ol>
                            </div>

                        </div>

                        <div class="condi-ri">
                            <div class="condi2">
                                <h5>โครงการที่มีจุดประสงค์ต่อไปนี้ไม่สามารถเปิดเรี่ยไรได้</h5>
                                <ol>
                                    <li>เสนอโครงการโดย<u>กรอกแบบฟอร์มในเว็บไซต์ให้ครบถ้วน</u>เท่านั้น</li>
                                    <li>ต้องทำการ<u>ลงทะเบียน</u>ก่อนกรอกแบบฟอร์มเสนอโครงการ</li>
                                    <li>ทางเว็บไซต์จะใช้เวลา<u>ตรวจสอบและแจ้งกลับประมาณ 3-7 วัน</u></li>
                                    <li>เมื่อ<u>ยอดถึงตามที่กำหนด</u>แม้ยังไม่ครบกำหนดวัน
                                        เว็บไซต์จะ<u>ปิดการรับบริจาคทันที</u></li>
                                    <li>โปรดแนบ<u>สำเนาใบอนุญาตเรี่ยไร</u>ถ้ามี</li>
                                    <li>เมื่อมีการ<u>ถอนเงินออกจากธนาคาร
                                            จะต้องแนบหลักฐานและชี้แจง</u>ว่านำเงินส่วนนั้นไปทำอะไร</li>
                                    <li>ต้องมีการ<u>อัปเดตความคืบหน้าอย่างสม่ำเสมอ</u>ไม่ว่าจะอยู่ระหว่างเรี่ยไร
                                        หรือปิดโครงการไปแล้ว</li>
                                    <li>ต้องระบุ<u>แผนการใช้เงิน</u>ให้ชัดเจน เงินส่วนไหนจะใช้กับอะไรบ้าง</li>
                                </ol>
                            </div>
                        </div>
                        <p class="mt-3">กรุณาสมัครสมาชิกและยืนยันตัวตนก่อนเสนอโครงการ<br>
                            <a href="#" class="text-info">ฉันยังไม่ได้สมัครสมาชิก</a>
                            <a href="#" class="text-info">ฉันยังไม่ได้ยืนยันตัวตน</a>
                        </p>
                        {{-- <div class="form-check">--}}
                        {{-- <input type="checkbox" class="form-check-input" id="exampleCheck1">--}}
                        {{-- <label class="form-check-label" for="exampleCheck1">Check me out</label>--}}
                        {{-- </div>--}}
                    </div>
                    <!--form-section1-->

                    <div class="form-section col-12 mt-4 pt-4 pb-4" style="border-radius: 5px;">
                        <h4 class="text-center" style="font-family: 'Mitr', sans-serif">แบบฟอร์มเสนอโครงการ</h4>
                        <div class="step-progress row justify-content-center">
                            <div class="mb-3">
                                <label class="mr-3 pt-2 pl-5 pb-2 pr-5 step-info act">1. ข้อมูลโครงการ</label>
                                <label class="mr-3 pt-2 pl-5 pb-2 pr-5 step-info">2. รูปภาพประกอบ</label>
                                <label class="mr-3 pt-2 pl-5 pb-2 pr-5 step-info">3. บัญชีธนาคาร</label>
                                <label class="mr-3 pt-2 pl-5 pb-2 pr-5 step-info">4. เสร็จสิ้น</label>
                            </div>
                        </div>
                        <div class="row justify-content-center bg-white rounded">
                            <div class="box-section">
                                <label>ชื่อโครงการ</label>
                                <input type="text" id="validationCustom03" class="form-control" placeholder="ระบุชื่อ" name="projectname" required>
                                <div class="invalid-feedback">
                                    โปรดระบุชื่อโครงการ
                                </div>

                                <label class="mt-3">รายละเอียดโครงการ</label>
                                <textarea type="text" id="validationCustom03" class="form-control md-textarea"
                                          placeholder="ระบุรายละเอียด"
                                          name="detail" length="120" required></textarea>
                                <div class="invalid-feedback">
                                    โปรดระบุรายละเอียดโครงการ
                                </div>

                                <label class="mt-3">วัตถุประสงค์</label>
                                <input type="text" id="validationCustom03" class="form-control"
                                       placeholder="ระบุวัตถุประสงค์" name="object" required>
                                <div class="invalid-feedback">
                                    โปรดระบุวัตถุประสงค์
                                </div>

                                <label class="mt-3">แผนการใช้เงิน</label>
                                <table id='myTable' class='table table-striped order-list' >
                                    <thead>
                                    <td class='text-center'>รายการใช้เงิน</td>
                                    <td class='text-center' colspan="2">จำนวนเงิน (บาท)</td>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <input type="text" name="list[]" class="form-control" id="validationCustom03" required/>
                                        </td>
                                        <td colspan="2">
                                            <input type="number" name="total[]" class="form-control" id="validationCustom03"required/>
                                        </td>
                                    </tr>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td colspan="3">
                                            <input type="button" class="btn btn-lg btn-block d-flex
                                            justify-content-center btn-outline-info" id="addrow" value="เพิ่ม" />
                                        </td>
                                    </tr>
                                    </tfoot>
                                </table>
                                <div class="invalid-feedback">
                                    โปรดระบุแผนการใช้เงิน
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label>วันที่เริ่มเรี่ยไร</label>
                                        <input type="date" class="form-control" placeholder="วัน/เดือน/ปี" name="startat"
                                               id="validationCustom03" required>
                                    </div>
                                    <div class="invalid-feedback">
                                        โปรดระบุวันที่เริ่มเรี่ยไร
                                    </div>
                                    <div class="col">
                                        <label>วันที่สิ้นสุดเรี่ยไร</label>
                                        <input type="date" class="form-control" placeholder="วัน/เดือน/ปี" name="endat"
                                               id="validationCustom03" required>
                                    </div>
                                    <div class="invalid-feedback">
                                        โปรดระบุันที่สิ้นสุดเรี่ยไร
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <label class="mt-3">เบอร์โทรศัพท์</label>
                                        <input type="text" class="form-control" placeholder="ระบุเบอร์โทรศัพท์"
                                               name="tel" id="validationCustom03" required>
                                    </div>
                                    <div class="invalid-feedback">
                                        โปรดระบุเบอร์โทรศัพท์
                                    </div>
                                    <div class="col">
                                        <label class="mt-3">อีเมล</label>
                                        <input type="text" class="form-control" placeholder="ระบุอีเมล" name="email"
                                               id="validationCustom03" required>
                                    </div>
                                    <div class="invalid-feedback">
                                        โปรดระบุอีเมล
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="mt-3 w-100">Social media</label>
                                    <div class="col-auto">
                                        <label>Facebook</label>
                                        <label class="sr-only" for="inlineFormInputGroup">Facebook</label>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fa fa-facebook-f"></i></div>
                                            </div>
                                            <input type="text" class="form-control" id="inlineFormInputGroup"
                                                   placeholder="Facebook">
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <label>Facebook</label>
                                        <label class="sr-only" for="inlineFormInputGroup">Facebook</label>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fa fa-facebook-f"></i></div>
                                            </div>
                                            <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Username">
                                        </div>
                                    </div>
                                </div>

                                <label class="mt-3">หมวดหมู่</label>
                                <select class="form-control" name="cate">
                                    <option value="1">เยาวชน</option>
                                    <option value="2">ผู้ป่วย</option>
                                    <option value="3">สัตว์</option>
                                    <option value="4">สิ่งแวดล้อม</option>
                                    <option value="5">อื่นๆ</option>
                                </select>

                                <label class="mt-3">แนบสำเนาใบอนุญาต (ถ้ามี)</label>
                                <div class="border rounded bg-light p-4" id='eviimg'>
                                    <p class='text-muted'>Drop File here or click me!</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-section col-12 pt-4 pb-4" style="border-radius: 5px;">
                        <h4 class="text-center" style="font-family: 'Mitr', sans-serif">แบบฟอร์มเสนอโครงการ</h4>
                        <div class="step-progress row justify-content-center">
                            <div class="mb-3">
                                <label class="mr-3 pt-2 pl-5 pb-2 pr-5 step-info act">1. ข้อมูลโครงการ</label>
                                <label class="mr-3 pt-2 pl-5 pb-2 pr-5 step-info act">2. รูปภาพประกอบ</label>
                                <label class="mr-3 pt-2 pl-5 pb-2 pr-5 step-info">3. บัญชีธนาคาร</label>
                                <label class="mr-3 pt-2 pl-5 pb-2 pr-5 step-info">4. เสร็จสิ้น</label>
                            </div>
                        </div>
                        <div class="row justify-content-center bg-white rounded">
                            <div class="box-section">
                                <label>เลือกรูปภาพ</label>
                                <div class="border rounded bg-light p-4" id='pjimg' id="validationCustom03">
                                    <p class='text-muted'>Drop Files here or click me!</p>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="form-section col-12 pt-4 pb-4" style="border-radius: 5px;">
                        <h4 class="text-center" style="font-family: 'Mitr', sans-serif">แบบฟอร์มเสนอโครงการ</h4>
                        <div class="step-progress row justify-content-center">
                            <div class="mb-3">
                                <label class="mr-3 pt-2 pl-5 pb-2 pr-5 step-info act">1. ข้อมูลโครงการ</label>
                                <label class="mr-3 pt-2 pl-5 pb-2 pr-5 step-info act">2. รูปภาพประกอบ</label>
                                <label class="mr-3 pt-2 pl-5 pb-2 pr-5 step-info act">3. บัญชีธนาคาร</label>
                                <label class="mr-3 pt-2 pl-5 pb-2 pr-5 step-info">4. เสร็จสิ้น</label>
                            </div>
                        </div>
                        <div class="row justify-content-center bg-white rounded">
                            <div class="box-section">
                                <label>ชื่อบัญชี</label>
                                <input type="text" class="form-control" placeholder="ระบุชื่อบัญชี" name="namebank"
                                       value="ชนก" id="validationCustom03" required>
                                <div class="invalid-feedback">
                                    โปรดระบุื่อบัญชี
                                </div>
                                <label class="mt-3">เลขที่บัญชี</label>
                                <input type="text" class="form-control" placeholder="ระบุชเลขที่บัญชี" name="numberbank"
                                       value="45898866" id="validationCustom03" required>
                                <div class="invalid-feedback">
                                    โปรดระบุเลขที่บัญชี
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label class="mt-3">ธนาคาร</label>
                                        <select class="form-control" name="bank">
                                            <option>ธนาคารกสิกร</option>
                                            <option>ธนาคารกรุงไทย</option>
                                            <option>ธนาคารไทยพาณิชย์</option>
                                            <option>ธนาคารกรุงเทพ</option>
                                            <option>ธนาคารออมสิน</option>
                                            <option>ธนาคารทหารไทย</option>
                                            <option>ธนาคารกรุงศรี</option>
                                            <option>ธนาคารธนชาต</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label class="mt-3">สาขา</label>
                                        <input type="text" class="form-control" placeholder="ระบุสาขา" name="branch"
                                               value="ปิ่น" id="validationCustom03" required>
                                        <div class="invalid-feedback">
                                            โปรดระบุสาขา
                                        </div>
                                    </div>
                                </div>
                                <label class="mt-3">แนบรูปภาพสมุดบัญชี</label>
                                <div class="border rounded bg-light p-4" id='acimg'>
                                    <p class='text-muted'>Drop Files here or click me!</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-navigation">
                        <button type="button" class="previous btn btn-info float-left mt-2">ย้อนกลับ</button>
                        <button type="button" class="next btn float-right mt-2">ดำเนินการต่อ</button>
                        <button type="submit" class="btn btn-success float-right mt-2">เสร็จสิ้น</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
    @parent

    <script src="{{ asset('dropzone-5.7.0\dist\dropzone.js') }}"></script>
    <script>
        // -----------------------------------validate-------------------------------------
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

        var eviimg = new Dropzone("#eviimg", { url: "/UploadImage", method: 'POST', maxFiles:1,
            init: function () {
                this.on("sending", function (file, xhr, data) {
                    data.append('_token', "{{ csrf_token() }}");
                    data.append('eleid', "eviimg");
                    $('#eviimg').after("<input type='hidden' name='file_eviimg[]' value='"+file.name+"'>");
                })
            }
        });
        var eviimg = new Dropzone("#pjimg", { url: "/UploadImage", method: 'POST',
            init: function () {
                this.on("sending", function (file, xhr, data) {
                    data.append('_token', "{{ csrf_token() }}");
                    data.append('eleid', "pjimg");
                    $('#pjimg').after("<input type='hidden' name='file_pjimg[]' value='"+file.name+"'>");
                })
            }
        });
        var eviimg = new Dropzone("#acimg", { url: "/UploadImage", method: 'POST', maxFiles:1,
            init: function () {
                this.on("sending", function (file, xhr, data) {
                    data.append('_token', "{{ csrf_token() }}");
                    data.append('eleid', "acimg");
                    $('#acimg').after("<input type='hidden' name='file_acimg[]' value='"+file.name+"'>");
                })
            }
        });
        $(document).ready(function() {
            $('#smartwizard').smartWizard({
                selected: 0,
                theme: 'dots',
                autoAdjustHeight: true,
                transitionEffect: 'fade',
                showStepURLhash: false,
            });

        });

        $(function() {
            var $sections = $('.form-section');

            function navigateTo(index) {
                $sections.removeClass('current').eq(index).addClass('current');
                $('.form-navigation .previous').toggle(index > 0);
                var atTheEnd = index >= $sections.length - 1;
                $('.form-navigation .next').toggle(!atTheEnd);
                $('.form-navigation [type=submit]').toggle(atTheEnd);
            }

            function curIndex() {
                return $sections.index($sections.filter('.current'));
            }

            $('.form-navigation .previous').click(function() {
                navigateTo(curIndex() - 1);
            });

            $('.form-navigation .next').click(function() {
                // $('.step-form').parsley().whenValidate({
                //    group: 'block-' + curIndex()
                // }).done(function () {
                navigateTo(curIndex() + 1);
                // });
            });
            // $sections.each(function (index,section) {
            //     $(section).find(':input').attr('data-parsley-group','block'+index);
            // });

            navigateTo(0);
        });

        // ------------------------------------plan--------------------------------------
        $(document).ready(function() {
            var counter = 0;

            $("#addrow").on("click", function() {
                var newRow = $("<tr>");
                var cols = "";

                cols += '<td><input type="text" class="form-control" name="list[]"/></td>';
                cols += '<td><input type="number" class="form-control" name="total[]"/></td>';
                cols += '<td><input type="button" class="ibtnDel btn btn-md btn-outline-danger"  value="ลบ"></td>';
                newRow.append(cols);
                $("table.order-list").append(newRow);
                counter++;
            });

            $("table.order-list").on("click", ".ibtnDel", function(event) {
                $(this).closest("tr").remove();
            });
        });

        function calculateRow(row) {
            var price = +row.find('input[name^="price"]').val();

        }

        function calculateGrandTotal() {
            var grandTotal = 0;
            $("table.order-list").find('input[name^="price"]').each(function() {
                grandTotal += +$(this).val();
            });
            $("#grandtotal").text(grandTotal.toFixed(2));
        }
    </script>
@endsection
