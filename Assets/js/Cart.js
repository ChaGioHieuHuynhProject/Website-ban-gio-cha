const update = (index, quantity) => {
  $.ajax({
    method: "post",
    url: "http://localhost/KyNguyen/Website-ban-gio-cha/Cart/Update",
    data: { index: index, quantity: quantity },
  });
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
updateTempCost();
