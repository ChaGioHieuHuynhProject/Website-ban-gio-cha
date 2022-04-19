const ROOT_URL = "http://localhost/KyNguyen/Website-ban-gio-cha/";
const deleteProduct = (id) => {
    swal({
        title: "Bạn muốn xóa sản phẩm?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
<<<<<<< HEAD
        if (willDelete) {
            $.post(
                `${ROOT_URL}Admin/Product/Delete`, { id: id },
                () => {
                    swal({
                        title: "Đã xóa sản phẩm!",
                        icon: "success",
                    }).then(() => {
                        window.location.href =
                            `${ROOT_URL}Admin/Product/`;
                    });
                }
            )
        }
=======
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
                    `${ROOT_URL}Admin/Product/`;
                });
            }
        )
      }
>>>>>>> ff0e044c8417e92ca39d15216379902ea26792ac
    });
}