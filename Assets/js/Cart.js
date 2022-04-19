const ROOT_URL = "http://localhost/KyNguyen/Website-ban-gio-cha/";
const update = (index, quantity) => {
<<<<<<< HEAD
  $.ajax({
    method: "post",
    url: "http://localhost/KyNguyen/Website-ban-gio-cha/Cart/Update",
    data: { index: index, quantity: quantity },
  });
=======
  $.post(`${ROOT_URL}Cart/Update`, { index: index, quantity: quantity });
>>>>>>> 7c0877a46701f5c690aaee2014da3c3aec2295aa
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
<<<<<<< HEAD
  $.ajax({
    method: "post",
    url: "http://localhost/KyNguyen/Website-ban-gio-cha/Cart/Confirm",
    data: {
      customerName: "NDK",
      phoneNumber: "0987654321",
      customerAddress: "101B - Lê Hữu Trác",
      note: "Đòn 0.5kg",
    },
=======
  $.post(`${ROOT_URL}Cart/Confirm`, {
    customerName: "NDK",
    phoneNumber: "0987654321",
    customerAddress: "101B - Lê Hữu Trác",
    note: "Đòn 0.5kg",
>>>>>>> 7c0877a46701f5c690aaee2014da3c3aec2295aa
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
<<<<<<< HEAD
    return (window.location.href =
      "http://localhost/KyNguyen/Website-ban-gio-cha/");
=======
    return (window.location.href = ROOT_URL);
>>>>>>> 7c0877a46701f5c690aaee2014da3c3aec2295aa
  });
});
