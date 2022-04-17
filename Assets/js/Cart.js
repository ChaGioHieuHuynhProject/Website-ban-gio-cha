const update = (index, quantity) => {
    $.ajax({
        type: "post",
        url: "http://localhost/KyNguyen/Website-ban-gio-cha/Cart/Update",
        data: {index: index, quantity: quantity}
    })
}