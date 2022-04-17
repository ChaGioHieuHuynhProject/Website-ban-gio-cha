const updateStatus = (id) => {
  $.post(
    "http://localhost/KyNguyen/Website-ban-gio-cha/Admin/Banner/UpdateStatus",
    { id: id }
  );
};
