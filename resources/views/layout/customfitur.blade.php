    <script type="text/javascript">
        $(document).ready(function() {
            var x = document.getElementById('tipe');
            var y = document.getElementById('kategori');
            var tgl = document.getElementById('tanggal');
            $("#tanggal").change(function() {
                y.value = "";
            });
            $("#tipe").change(function() {
                y.value = "";
            });
            $("#kategori").change(function() {
                if (y.value != "" && x.value != "") {
                    document.location.href = "{{url('postingan/keyword')}}" + "/" + x.value + "-" + y.value + "?tanggal=" + tgl.value;
                } else {
                    toastr.warning("Pilih Pencarian", "Masukkan list Pencarian!", {
                        timeOut: 4e3,
                        closeButton: !0,
                        debug: !1,
                        newestOnTop: !0,
                        progressBar: !0,
                        positionClass: "toast-top-right",
                        preventDuplicates: !0,
                        onclick: null,
                        showDuration: "300",
                        hideDuration: "1000",
                        extendedTimeOut: "1000",
                        showEasing: "swing",
                        hideEasing: "linear",
                        showMethod: "fadeIn",
                        hideMethod: "fadeOut",
                        tapToDismiss: !1
                    });
                }
            });
        })
        $(document).ready(function() {
            $(".more").click(function() {
                let id = $(this).attr("more_id");
                var id_postingan = document.getElementById('id_postingan-' + id);
                var keterangan_lapor = document.getElementById('keterangan-' + id);
                id_postingan.value = id;
                var x = keterangan_lapor.value;
                // $(".aksi").click(function() {
                //     var x = keterangan.value;
                $.ajax({
                    url: "{{route('add_lapor')}}",
                    type: 'POST',
                    data: {
                        '_method': 'POST',
                        '_token': '{{ csrf_token() }}',
                        'id_postingan': id,
                        'keterangan_lapor': x
                    },
                    success: function(response) {
                        if (response.yes) {
                            sweetAlert({
                                type: 'success',
                                title: 'Berhasil!',
                                text: 'Terima Kasih atas partisipasi anda telah melaporkan  postingan yang menyimpang.',
                                showConfirmButton: false,
                                timer: 2000
                            });
                            keterangan_lapor.value = "";
                            document.querySelector('#close-' + id).click();
                        }
                        if (response.not) {
                            sweetAlert({
                                type: 'warning',
                                title: 'Anda Sudah Lapor',
                                text: 'Anda telah melaporkan Postingan ini.',
                                showConfirmButton: false,
                                timer: 2000
                            });
                            keterangan_lapor.value = "";
                            document.querySelector('#close-' + id).click();
                        }
                        if (response.kosong) {
                            toastr.warning("Lengkapi Form", "Isiskan Keterangan Laporan!", {
                                timeOut: 4e3,
                                closeButton: !0,
                                debug: !1,
                                newestOnTop: !0,
                                progressBar: !0,
                                positionClass: "toast-top-right",
                                preventDuplicates: !0,
                                onclick: null,
                                showDuration: "300",
                                hideDuration: "1000",
                                extendedTimeOut: "1000",
                                showEasing: "swing",
                                hideEasing: "linear",
                                showMethod: "fadeIn",
                                hideMethod: "fadeOut",
                                tapToDismiss: !1
                            });
                            keterangan_lapor.value = "";
                        }
                    }
                });
            });
        });
        $(document).ready(function() {
            $("#copy").hide();
            $("#add-more").click(function() {
                var html = $("#copy").html();
                $("#after-add-more").after(html);
            });

            $("body").on("click", "#remove", function() {
                $(this).parents("#control-group").remove();
            });
        });



        $("#submit").hide();
        var penemuan = document.getElementById('penemuan');
        var pertanyaan = document.getElementById('pertanyaan');
        var lokasi1 = document.getElementById('lokasi1');
        var lokasi2 = document.getElementById('lokasi2');
        var lokasi3 = document.getElementById('lokasi3');
        $(document).ready(function() {
            $("#btn-lost").click(function() {
                toastr.error("Beralih Postingan", "Form Postingan " + $("#btn-lost").val(), {
                    timeOut: 1e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    positionClass: "toast-top-right",
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                });
                $("#submit").show();
                $("#form-lost1").show();
                $("#form-lost2").show();
                $("#form-lost3").show();

                penemuan.required = false;
                pertanyaan.required = false;
                lokasi1.required = true;
                lokasi2.required = true;
                lokasi3.required = true;
                $("#form-found1").hide();
                $("#form-found2").hide();
                $("#form-found3").hide();
            });
            $("#btn-found").click(function() {
                toastr.info("Beralih Postingan", "Form Postingan " + $("#btn-found").val(), {
                    timeOut: 1e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    positionClass: "toast-top-right",
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                });
                $("#submit").show();
                $("#form-lost1").hide();
                $("#form-lost2").hide();
                $("#form-lost3").hide();
                // 
                penemuan.required = true;
                pertanyaan.required = true;
                lokasi1.required = false;
                lokasi2.required = false;
                lokasi3.required = false;
                $("#form-found1").show();
                $("#form-found2").show();
                $("#form-found3").show();
            });
        })
    </script>
    <!-- <script>
        (function($) {
            "use strict"

            new quixSettings({
                version: "light", //2 options "light" and "dark"
                layout: "vertical", //2 options, "vertical" and "horizontal"
                navheaderBg: "color_1", //have 10 options, "color_1" to "color_10"
                headerBg: "color_1", //have 10 options, "color_1" to "color_10"
                sidebarStyle: "full", //defines how sidebar should look like, options are: "full", "compact", "mini" and "overlay". If layout is "horizontal", sidebarStyle won't take "overlay" argument anymore, this will turn into "full" automatically!
                sidebarBg: "color_1", //have 10 options, "color_1" to "color_10"
                sidebarPosition: "fixed", //have two options, "static" and "fixed"
                headerPosition: "fixed", //have two options, "static" and "fixed"
                containerLayout: "wide", //"boxed" and  "wide". If layout "vertical" and containerLayout "boxed", sidebarStyle will automatically turn into "overlay".
                direction: "ltr" //"ltr" = Left to Right; "rtl" = Right to Left
            });


        })(jQuery);
    </script> -->