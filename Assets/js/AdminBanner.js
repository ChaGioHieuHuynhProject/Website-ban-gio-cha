const updateStatus = (id) => {
    $.post(
        "http://localhost/website/Website-ban-gio-cha/Admin/Banner/UpdateStatus", { id: id }
    )
}