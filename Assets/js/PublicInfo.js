fetch("http://localhost:8080/Website-ban-gio-cha/info.json")
  .then((response) => {
    return response.json();
  })
  .then((data) => {
    $("#footer-address").text(data["address"]);
    $("#footer-phone")
      .text(data["phoneNumber"])
      .attr("href", `tel:${data["phoneNumber"].replace(/\s/g, "")}`);
    $("#footer-email")
      .text(data["email"])
      .attr("href", `mailto:${data["email"]}`);
    $("#footer-fb").attr("href", data["facebook"]);
    $("#footer-zalo").attr("href", `https://zalo.me/${data["zalo"]}`);
  });
