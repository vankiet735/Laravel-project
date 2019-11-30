<script type="text/javascript">
  function Delete($url){
   Swal.fire({
    title: 'Bạn muốn xóa?',
    text: "",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
    if(result.value){
      window.location.href = $url;
    }else if(result.dismiss == 'cancel'){
      console.log('cancel');
    }
  }
  )
}
</script>
