const ROOT_URL = "http://localhost/KyNguyen/Website-ban-gio-cha/";
const deleteProduct = (id) => {
    swal({
      title: "Bạn muốn xóa sản phẩm?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        $.post(
            `${ROOT_URL}Admin/Product/Delete`,
            {id: id},
            () => {
                swal({
                  title: "Đã xóa sản phẩm!",
                  icon: "success",
                }).then(() => {
                  window.location.href =
                    `${ROOT_URL}Admin/Product/;
                });
            }
        )
      }
    });
}