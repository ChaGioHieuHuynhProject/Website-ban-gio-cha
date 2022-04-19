const ROOT_URL = "http://localhost/KyNguyen/Website-ban-gio-cha/";
const update = (index, quantity) => {
  $.post(`${ROOT_URL}Cart/Update`, { index: index, quantity: quantity });
  $(`#total-${index}`).text(
    new Intl.NumberFormat().format(
      $(`#price-${index}`).text().replace(",", "") * quantity
    )
  );
  updateTempCost();
};
const updateTempCost = () => {
  var totalList = $(".total span");
  var sum = 0;
  totalList.each((index, ele) => {
    sum += parseInt($(ele).text().replace(",", ""));
  });
  $("#temp-cost").text(new Intl.NumberFormat().format(sum));
};
const confirmOrder = () => {
  var name = $("#name").val();
  var address = $("#address").val();
  var phoneNumber = $("#phoneNumber").val();
  var note = $("#note").val();
  if (!(name && address && phoneNumber)) {
    console.log("bug")
    return;
  }
  $.post(
    `${ROOT_URL}Cart/Confirm`,
    {
      customerName: name,
      phoneNumber: phoneNumber,
      customerAddress: address,
      note: note,
    }
  );
  swal({
    title: "Đặt hàng thành công!",
    text: "Shop sẽ liên lạc với bạn trong vài phút!\nCảm ơn bạn đã lựa chọn shop.",
    icon: "success",
    button: {
      text: "Trở về trang chủ!",
      className: "back-to-home",
    },
  }).then(() => {
    return (window.location.href =
      "http://localhost/KyNguyen/Website-ban-gio-cha/");
  });
};
updateTempCost();
