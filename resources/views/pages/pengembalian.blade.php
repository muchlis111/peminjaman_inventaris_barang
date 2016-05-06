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
                <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>nama peminjam</th>
                        <th>id barang</th>
                        <th>tanggal pinjam</th>
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

        </div>
    </div>
    {{--<script src="{!! asset('assets/bower_components/jquery/dist/jquery.min.js') !!}"></script>--}}

    <script src="{!! asset('assets/script/jquery-1.10.2.min.js') !!}"></script>
    <script src="{!! asset('assets/script/jquery-migrate-1.2.1.min.js') !!}"></script>
    <script>
        $(document).ready(function () {
            $('#Create').hide();
            $('#Edit').hide();
            Index();
        });
        function Index() {
            $('#Create').hide();
            $('#Edit').hide();
            $('#Index').show();
            getAjax();
        }

        function Kembali(id) {
            var currentRequest = null;

            currentRequest = $.ajax({
                method: "PUT",
                url: '/api/v1/pengembalian/' + id,
                data: {},
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
            });
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
                        if (data.status == 1) {
                            $("#row").append(
                                    "<tr>" +
                                    "<td>" + (i + 1) + "</td>" +
                                    "<td>" + data.nama_peminjam + "</td>" +
                                    "<td>" + data.barang.nama_barang + "</td>" +
                                    "<td>" + data.tgl_pinjam + "</td>" +
                                    "<td>" +
                                    "<button type='button' class='btn bttn-outline btn-info' " +
                                    "data-toggle='modal' data-target='#myModal' " +
                                    "onclick='Detail(\"" + data.id + "\")'>Detail</button>" +
                                    "<button type='button' class='btn btn-outline btn-danger' " +
                                    "onclick='Hapus(\"" + data.id + "\")'>Delete</button>" +
                                    "</td>" +
                                    "</tr>");
                        }
                        if (data.status == 0) {
                            $("#row").append(
                                    "<tr>" +
                                    "<td>" + (i + 1) + "</td>" +
                                    "<td>" + data.nama_peminjam + "</td>" +
                                    "<td>" + data.barang.nama_barang + "</td>" +
                                    "<td>" + data.tgl_pinjam + "</td>" +
                                    "<td>" +
                                    "<button type='button' class='btn bttn-outline btn-success' " +
                                    "onclick='Kembali(\"" + data.id + "\")' id='Kembalikan'>Kembali</button>" +
                                    "</td>" +
                                    "</tr>");
                        }
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
                        url: '/api/v1/pengembalian/' + id,
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
                        $("input[name='tgl_pinjam']").val(data_edit.tgl_pinjam);
                        $("input[name='tgl_kembali']").val(data_edit.tgl_kembali);
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

    </script>
    </body>
</div>
@endsection