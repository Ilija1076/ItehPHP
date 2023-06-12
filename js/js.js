$("#dodajForm").submit(function () {
  event.preventDefault();

  const $form = $(this);
  const $inputs = $form.find("input, select, button");
  const serializedData = $form.serialize();
  console.log(serializedData);
  let obj = $form.serializeArray().reduce(function (json, { name, value }) {
    json[name] = value;
    return json;
  }, {});
  console.log(obj);
  $inputs.prop("disabled", true);

  request = $.ajax({
    url: "handler/add.php",
    type: "post",
    data: serializedData,
  });

  request.done(function (response, textStatus, jqXHR) {
    if (response === "Successfully added destination") {
      alert("Destination added successfully.");
      location.reload(true);
    } else console.log("Failed to add destination: " + response);
  });

  request.fail(function (jqXHR, textStatus, errorThrown) {
    console.error("The following error occurred: " + textStatus, errorThrown);
  });
});

$("#btnAdd").submit(function () {
  $("myModal").modal("toggle");
  return false;
});
