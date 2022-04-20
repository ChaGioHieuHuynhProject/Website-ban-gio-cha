const ROOT_URL = "http://localhost/KyNguyen/Website-ban-gio-cha/";
const updateStatus = (id) => {
  $.post(
    `${ROOT_URL}Admin/Banner/UpdateStatus`,
    { id: id }
  );
};
