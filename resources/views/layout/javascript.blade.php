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
        // 
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
                // $("#panduanlokasi").show();

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
                // $("#panduanlokasi").hide();
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