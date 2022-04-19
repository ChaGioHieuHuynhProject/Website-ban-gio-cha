const ROOT_URL = "http://localhost:8080/website/Website-ban-gio-cha/";
const deleteStory = (id) => {
    swal({
        title: "Bạn muốn xóa câu chuyện?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.post(
                `${ROOT_URL}Admin/Stories/Delete`, { id: id },
                () => {
                    swal({
                        title: "Đã xóa câu chuyện!",
                        icon: "success",
                    }).then(() => {
                        window.location.href =
                            `${ROOT_URL}Admin/Stories/`;
                    });
                }
            )
        }
    });
}