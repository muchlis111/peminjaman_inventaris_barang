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
                        <th>nama peminjam</th>
                        <th>nama barang</th>
                        <th>aksi</th>

                    </tr>
                    </thead>
                    <tbody id="row">

                    </tbody>
                </table>
            </div>


            <div id="Create">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                BARANG
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <form id="Form-Create">
                                            <div class="form-group">
                                                <label>NAMA PEMINJAM</label>
                                                <label>:</label>
                                                <input type="text" class="form-control" name="nama_peminjam">
                                            </div>
                                            <div class="form-group">
                                                <label>KELAS</label>
                                                <label>:</label>
                                                <input type="text" class="form-control" name="kelas">
                                            </div>
                                            <div class="form-group">
                                                <label>JURUSAN</label>
                                                <label>:</label>
                                                <input type="text" class="form-control" name="jurusan">
                                            </div>
                                            <div class="form-group">
                                                <label>NAMA BARANG</label>
                                                <label>:</label>
                                                <select class="form-control select" style="" name="barang"
                                                        id="id_barang">
                                                    <option selected>Pilih Barang</option>
                                                </select>
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
                                        <label>NAMA PEMINJAM</label>
                                        <label>:</label>
                                        <input type="text" class="form-control" name="nama_peminjam">
                                    </div>
                                    <div class="form-group">
                                        <label>KELAS</label>
                                        <label>:</label>
                                        <input type="text" class="form-control" name="kelas">
                                    </div>
                                    <div class="form-group">
                                        <label>JURUSAN</label>
                                        <label>:</label>
                                        <input type="text" class="form-control" name="jurusan">
                                    </div>
                                    <div class="form-group">
                                        <label>NAMA BARANG</label>
                                        <label>:</label>
                                        <select class="form-control select" style="" name="barang" id="id_barang">
                                            <option selected>Pilih Barang</option>
                                        </select>
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
    <div id="myModal" class="modal" fade="dialog">
        <div class="modal-dialog">

            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4><font face="impact">DETAIL PEMINJAM</font></h4>

                </div>
                <div class="modal-body">
                    <p>DETAIL PEMINJAM</p>
                    <div id="loader-wrapper">
                        <div id="loader"></div>
                    </div>
                    <table class="table table-striped">
                        <tbody id="modal-body">

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">kembali</button>
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
                        nama_peminjam = $form.find("input[name='nama_peminjam']").val(),
                        kelas = $form.find("input[name='kelas']").val(),
                        jurusan = $form.find("input[name='jurusan']").val(),
                        barang = $form.find("select[name='barang']").val();

                var posting = $.post('/api/v1/peminjaman', {
                    nama_peminjam: nama_peminjam,
                    kelas: kelas,
                    jurusan: jurusan,
                    id_barang: barang
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
                        nama_peminjam = $form.find("input[name='nama_peminjam']").val(),
                        kelas = $form.find("input[name='kelas']").val(),
                        jurusan = $form.find("input[name='jurusan']").val(),
                        barang = $form.find("select[name='barang']").val();
//                        tgl_pinjam = $form.find("input[name='tgl_pinjam']").val(),
//                        tgl_kembali = $form.find("input[name='tgl_kembali']").val();

                currentRequest = $.ajax({
                    method: "PUT",
                    url: '/api/v1/peminjaman/' + id,
                    data: {
                        nama_peminjam: nama_peminjam,
                        kelas: kelas,
                        jurusan: jurusan,
                        id_barang: barang
//                        tgl_pinjam: tgl_pinjam,
//                        tgl_kembali: tgl_kembali
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
            getBarang();
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
                $.getJSON("/api/v1/peminjaman", function (data) {
                    var jumlah = data.data.length;
                    $.each(data.data.slice(0, jumlah), function (i, data) {
                        $("#row").append(
                                "<tr>" +
                                "<td>" + (i + 1) + "</td>" +
                                "<td>" + data.nama_peminjam + "</td>" +
                                "<td>" + data.barang.nama_barang + "</td>" +
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
                        url: '/api/v1/peminjaman/' + id,
                        data: {}
                    })
                    .done(function (data_edit) {
//                    console.log(data.nomor);
//                        var $form = $(this),
                        $("input[name='id']").val(data_edit.id);
                        $("input[name='nama_peminjam']").val(data_edit.nama_peminjam);
                        $("input[name='kelas']").val(data_edit.kelas);
                        $("input[name='jurusan']").val(data_edit.jurusan);
//                        $("input[name='id_barang']").val(data.id_barang);
//                        $("input[name='tgl_pinjam']").val(data_edit.tgl_pinjam);
//                        $("input[name='tgl_kembali']").val(data_edit.tgl_kembali);
                        $.getJSON("/api/v1/data-barang", function (data) {
                            var jumlah = data.length;
                            $.each(data.slice(0, jumlah), function (i, data) {
                                if (data_edit.barang.id == data.id) {
                                    $("select[name='barang']").append("<option value='" + data.id + "' selected>" + data.nama_barang + "</option>");
                                }
                                else {
                                    $("select[name='barang']").append("<option value='" + data.id + "'>" + data.nama_barang + "</option>");
                                }
                            })
                        })
                        $('#Edit').show();
                    });
        }

        // Set data on modal body
        function Detail(id) {
          $("#modal-body").children().remove();
            $.ajax({
                method: "GET",
                url: '/api/v1/peminjaman/' + id,
                data: {},
                beforeSend: function () {
//                    $("#loader-wrapper").show();

                },
                success: function (data) {
                    $("#loader-wrapper").hide();
                    $("#modal-body").append("<tr><td>nama_peminjam</td><td>:</td><td>" + data.nama_peminjam + "</td></tr>" +
                            "<tr><td>kelas</td><td>:</td><td>" + data.kelas + "</td></tr>" +
                            "<tr><td>jurusan</td><td>:</td><td>" + data.jurusan + "</td></tr>" +
                            "<tr><td>id_barang</td><td>:</td><td>" + data.id_barang + "</td></tr>"+
                            "<tr><td>tgl_pinjam</td><td>:</td><td>" + data.tgl_pinjam + "</td></tr>"
                    );
                }

            });
        }
        function Hapus(id) {
            var result = confirm("Apakah Anda Yakin ingin Menghapus ?");
            if (result) {
                $.ajax({
                            method: "DELETE",
                            url: '/api/v1/peminjaman/' + id,
                            data: {}
                        })
                        .done(function (data) {
                            window.alert(data.result.message);
                            Index();
                        });
            }
        }
        function getBarang() {
            $('#list_barang').children().remove();
            $.getJSON("/api/v1/data-barang", function (data) {
                var jumlah = data.length;
                $.each(data.slice(0, jumlah), function (i, data) {
                    $("#id_barang").append("<option value='" + data.id + "'>" + data.nama_barang + "</option>")
                })
            })
        }

    </script>
    </body>
</div>
@endsection