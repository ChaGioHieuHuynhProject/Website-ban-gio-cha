const deleteProduct = (id) => {
    swal({
      title: "Bạn muốn xóa sản phẩm?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        $.post(
            'http://localhost:8080/Website-ban-gio-cha/Admin/Product/Delete',
            {id: id},
            () => {
                swal({
                  title: "Đã xóa sản phẩm!",
                  icon: "success",
                }).then(() => {
                  window.location.href =
                    "http://localhost:8080/Website-ban-gio-cha/Admin/Product/";
                });
            }
        )
      }
    });
}