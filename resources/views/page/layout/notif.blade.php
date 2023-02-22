@if(session('add'))
<script type="text/javascript">
  toastr.success("Data Success", "{{session('add')}}", {
    timeOut: 5e3,
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
  })
</script>
@endif
@if(session('up'))
<script type="text/javascript">
  toastr.success("Data Success", "{{session('up')}}", {
    timeOut: 5e3,
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
  })
</script>
@endif
@if(session('del'))
<script type="text/javascript">
  toastr.error("Data Success", "{{session('del')}}", {
    timeOut: 5e3,
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
  })
</script>
@endif
@if(session('add_kegiatan'))
<script type="text/javascript">
  sweetAlert({
    title: "Data Berhasil",
    text: "Kegiatan di tambahkan, menunggu validasi",
    type: "success",
    closeOnConfirm: false,
    showLoaderOnConfirm: true,
  });
</script>
@endif
@if(session('up_kegiatan'))
<script type="text/javascript">
  sweetAlert({
    title: "Data Berhasil",
    text: "Kegiatan di Ubah, silahkan tunggu validasi",
    type: "success",
    closeOnConfirm: false,
    showLoaderOnConfirm: true,
  });
</script>
@endif