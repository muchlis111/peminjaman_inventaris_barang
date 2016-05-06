@extends('layouts.master')
@section('content')
        <!--BEGIN CONTENT-->
<div class="page-content">
    <div class="panel panel-grey" style="background:#FFF;">
        <div id="page-title" class="panel-heading"></div>
        <div class="panel-body">
            <center>
                <div id="loader2">
                    <img src=" {!! asset('assets/images/icons/download1.gif') !!}">
                </div>
            </center>
            <div id="Index">
                <button class="btn btn-blue" onclick="Create()"><i class="fa fa-plus-circle"></i></button>
                <p>
                <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>email</th>
                        <th>password</th>
                        <th>nomor hp</th>
                        <th>aksi</th>

                    </tr>
                    </thead>
                    <tbody id="row">
                    </tbody>
                    {{--<tfoot>--}}
                    {{--<tr>--}}
                    {{--<th></th>--}}
                    {{--<th><i>4 People</i></th>--}}
                    {{--<th></th>--}}
                    {{--<th><i>1 Approved</i></th>--}}
                    {{--</tr>--}}
                    {{--</tfoot>--}}
                </table>
            </div>



            <div id="Create">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                USER
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <form id="Form-Create">
                                            <div class="form-group">
                                                <label>NAMA</label>
                                                <label>:</label>
                                                <input type="text" class="form-control" name="nama">
                                            </div>
                                            <div class="form-group">
                                                <label>EMAIL</label>
                                                <label>:</label>
                                                <input type="text" class="form-control" name="email">
                                            </div>
                                            <div class="form-group">
                                                <label>PASSWORD</label>
                                                <label>:</label>
                                                <input type="password" class="form-control" name="password">
                                            </div>
                                            <div class="form-group">
                                                <label>NOMOR HP</label>
                                                <label>:</label>
                                                <input type="text" class="form-control" name="no_hp">
                                            </div>

                                            <input class="btn btn-outline btn-info" type="submit" value="Simpan">
                                            <button type="button" class="btn btn-outline btn-primary"
                                                    onclick="Index()">Kembali
                                            </button>

                                        </form>
                                    </div>
                                </div>

                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>

                </div>

            </div>
            <div id="Edit">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" id="Form-Edit">
                                <div class="row">
                                    <input type="hidden" name="id">
                                    <div class="form-group">
                                        <label>NAMA</label>
                                        <label>:</label>
                                        <input type="text" class="form-control" name="nama">
                                    </div>
                                    <div class="form-group">
                                        <label>EMAIL</label>
                                        <label>:</label>
                                        <input type="text" class="form-control" name="email">
                                    </div>
                                    <div class="form-group">
                                        <label>PASSWORD</label>
                                        <label>:</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                    <div class="form-group">
                                        <label>NOMOR HP</label>
                                        <label>:</label>
                                        <input type="text" class="form-control" name="no_hp">
                                    </div>

                                    <div class="form-group">
                                        <input class="btn btn-outline btn-info" type="submit" value="Simpan">
                                        <button type="button" class="btn btn-outline btn-primary"
                                                onclick="Index()">kembali
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--<script src="{!! asset('assets/bower_components/jquery/dist/jquery.min.js') !!}"></script>--}}

    <script src="{!! asset('assets/script/jquery-1.10.2.min.js') !!}"></script>
    <script src="{!! asset('assets/script/jquery-migrate-1.2.1.min.js') !!}"></script>
    <script>
        $(document).ready(function () {
            var currentRequest = null;
            $('#Create').hide();
            $('#Edit').hide();
            Index();
            $("#Form-Create").submit(function (event) {
                event.preventDefault();
                var $form = $(this),

                        nama = $form.find("input[name='nama']").val(),
                        email = $form.find("input[name='email']").val(),
                        password = $form.find("input[name='password']").val(),
                        no_hp = $form.find("input[name='no_hp']").val();

                var posting = $.post('/api/v1/user', {
                    nama: nama,
                    email: email,
                    password: password,
                    no_hp: no_hp
                });
                // Put the results in a div
                posting.done(function (data) {
//                    console.log(data);
                    window.alert(data.result.message);
                    Index();
                });
            });

            $("#Form-Edit").submit(function (event) {
                event.preventDefault();
                var $form = $(this),
                        id = $form.find("input[name='id']").val(),
                        nama = $form.find("input[name='nama']").val(),
                        email = $form.find("input[name='email']").val(),
                        password = $form.find("input[name='password']").val(),
                        no_hp = $form.find("input[name='no_hp']").val();
                currentRequest = $.ajax({
                    method: "PUT",
                    url: '/api/v1/user/' + id,
                    data: {
                        nama: nama,
                        email: email,
                        password: password,
                        no_hp: no_hp
                    },
                    beforeSend: function () {
                        if (currentRequest != null) {
                            currentRequest.abort();
                        }
                    },
                    success: function (data) {
                        window.alert(data.result.message);
                        Index();
                    },
                    error: function (data) {
                        window.aleart(data.result.message);
                        Index();
                    }
                })
            });
        });
        function Index() {
            $('#Create').hide();
            $('#Edit').hide();
            $('#Index').show();
            document.getElementById("Form-Create").reset();
            document.getElementById("Form-Edit").reset();
            getAjax();
        }

        function Create() {
            $('#Index').hide();
            $('#Edit').hide();
            $('#Create').show();
            document.getElementById("Form-Create").reset();
            document.getElementById("Form-Edit").reset();

        }
        function getAjax() {
            $("#row").children().remove();
            $("#loader2").delay(2000).animate({
                opacity: 0,
                width: 0,
                height: 0
            }, 500);
            setTimeout(function () {
                $.getJSON("/api/v1/data-user", function (data) {
                    var jumlah = data.length;
                    $.each(data.slice(0, jumlah), function (i, data) {
                        $("#row").append(
                                "<tr>" +
                                "<td>" + (i + 1) + "</td>" +
                                "<td>" + data.nama + "</td>" +
                                "<td>" + data.email + "</td>" +
                                "<td>" + data.no_hp + "</td>" +
                                "<td>" +
                                "<button type='button' class='btn bttn-outline btn-info' " +
                                "data-toggle='modal' data-target='#myModal' " +
                                "onclick='Detail(\"" + data.id + "\")'>Detail</button>" +
                                "<button type='button' class='btn btn-outline btn-primary' " +
                                "onclick='Edit(\"" + data.id + "\")'>Edit</button>" +
                                "<button type='button' class='btn btn-outline btn-danger' " +
                                "onclick='Hapus(\"" + data.id + "\")'>Delete</button>" +
                                "</td>" +
                                "</tr>");
                    })
                });
            }, 2200);
        }
        function Edit(id) {
            $('#Index').hide();
            $('#Create').hide();
            $('#Edit').hide();
            document.getElementById("Form-Create").reset();
            document.getElementById("Form-Edit").reset();
            $.ajax({
                        method: "Get",
                        url: '/api/v1/user/' + id,
                        data: {}
                    })
                    .done(function (data) {
//                    console.log(data.nomor);
//                        var $form = $(this),
                        $("input[name='id']").val(data.id);
                        $("input[name='nama']").val(data.nama);
                        $("input[name='email']").val(data.email);
                        $("input[name='password']").val(data.password);
                        $("input[name='no_hp']").val(data.no_hp);
                        $('#Edit').show();
                    });
        }

        // Set data on modal body
        function Detail(id) {
//            $("#modal-body").children().remove();
            $.ajax({
                method: "GET",
                url: '/api/vi/user/' + id,
                data: {},
                beforeSend: function () {
//                    $("#loader-wrapper").show();

                },
                success: function (data) {
                    $("#loader-wrapper").hide();
                    $("#modal-body").append("<tr><td>nama</td><td>:</td><td>" + data.nama + "</td></tr>" +
                            "<tr><td>email</td><td>:</td><td>" + data.email + "</td></tr>" +
                            "<tr><td>password</td><td>:</td><td>" + data.password + "</td></tr>" +
                            "<tr><td>no_hp</td><td>:</td><td>" + data.no_hp + "</td></tr>"
                    );
                }

            });
        }
        function Hapus(id) {
            var result = confirm("Apakah Anda Yakin ingin Menghapus ?");
            if (result) {
                $.ajax({
                            method: "DELETE",
                            url: '/api/v1/user/' + id,
                            data: {}
                        })
                        .done(function (data) {
                            window.alert(data.result.message);
                            Index();
                        });
            }
        }

    </script>
    </body>
</div>
@endsection