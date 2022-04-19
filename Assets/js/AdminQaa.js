const ROOT_URL = "http://localhost:8080/website/Website-ban-gio-cha/";
const deleteQaa = (id) => {
    swal({
        title: "Bạn muốn xóa câu hỏi này?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.post(
                `${ROOT_URL}Admin/QAA/Delete`, { id: id },
                () => {
                    swal({
                        title: "Đã xóa sản phẩm!",
                        icon: "success",
                    }).then(() => {
                        window.location.href =
                            `${ROOT_URL}Admin/QAA/`;
                    });
                }
            )
        }
    });
}