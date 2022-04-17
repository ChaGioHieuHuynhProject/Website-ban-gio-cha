const ROOT_URL = "http://localhost:8080/Website-ban-gio-cha/";
const update = (index, quantity) => {
  $.post(`${ROOT_URL}Cart/Update`, { index: index, quantity: quantity });
  $(`#total-${index}`).text($(`#price-${index}`).text() * quantity);
  updateTempCost();
};
const updateTempCost = () => {
  var totalList = $(".total span");
  var sum = 0;
  totalList.each((index, ele) => {
    sum += parseInt($(ele).text());
  });
  $("#temp-cost").text(sum);
};
const confirmOrder = () => {
  $.post(`${ROOT_URL}Cart/Confirm`, {
    customerName: "NDK",
    phoneNumber: "0987654321",
    customerAddress: "101B - Lê Hữu Trác",
    note: "Đòn 0.5kg",
  });
};
updateTempCost();
$("#confirm-btn").click(() => {
  swal({
    title: "Đặt hàng thành công!",
    text: "Shop sẽ liên lạc với bạn trong vài phút!\nCảm ơn bạn đã lựa chọn shop.",
    icon: "success",
    button: {
      text: "Trở về trang chủ!",
      className: "back-to-home",
    },
  }).then(() => {
    return (window.location.href = ROOT_URL);
  });
});
