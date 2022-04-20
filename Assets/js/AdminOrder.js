const ROOT_URL = "http://localhost/KyNguyen/Website-ban-gio-cha/";
const updateShipFee = (orderId, fee) => {
  $.post(`${ROOT_URL}/Admin/Order/UpdateShipFee`, { orderId: orderId, fee: fee },
  () => {
      swal({
        title: "Thêm phí ship thành công!",
        icon: "success",
      });
  });
};
