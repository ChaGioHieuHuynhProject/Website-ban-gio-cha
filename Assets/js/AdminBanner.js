const updateStatus = (id) => {
    $.post(
        "http://localhost:8080/Website-ban-gio-cha/Admin/Banner/UpdateStatus", { id: id }
    )
}