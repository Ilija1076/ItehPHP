$("#addForm").submit(function (event) {
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
  $("myModal").modal("toggle");
  return false;
});

function lookup() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("table");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

$("#btn-delete").click(function () {
  const checkboxes = $("input[name=select]:checked");
  const selectedIds = checkboxes
    .map(function () {
      return $(this).val();
    })
    .get();

  if (selectedIds.length > 0) {
    const request = $.ajax({
      url: "handler/delete.php",
      type: "post",
      data: {
        ids: selectedIds,
      },
    });

    request.done(function (response) {
      if (response === "Successfully deleted a destination") {
        checkboxes.closest("tr").remove();
        console.log("Destinations deleted successfully");
        alert("Destinations deleted successfully");
      } else {
        console.log("Error deleting destinations: " + response);
        alert("Error deleting destinations");
      }
    });
  }
});

$("#btn-edit").click(function () {
  const checkedCheckbox = $("input[name=select]:checked");
  if (checkedCheckbox.length === 1) {
    const selectedRow = checkedCheckbox.closest("tr");
    const currentRowId = selectedRow.attr("id");
    selectedRow.find("td").attr("contenteditable", "true");
    selectedRow.addClass("editing");
    $("#btn-finish").show();
    console.log("Current Row ID: " + currentRowId);
    const columnIndex = selectedRow.find("td:nth-child(3)").index();
    const columnName = $("th").eq(columnIndex).text().trim().toLowerCase();
    field = columnName;
  }
});

$("#btn-finish").click(function () {
  const editedRow = $("tr.editing");
  const currentRowId = editedRow.attr("id");
  if (currentRowId) {
    const cells = editedRow.find("td");
    const updatedValues = {
      id: currentRowId.split("-")[1],
      [field]: cells.eq(2).text().trim(),
      distance: cells.eq(3).text().trim(),
      time: cells.eq(4).text().trim(),
      departure: cells.eq(5).text().trim(),
    };
    console.log("Updated Values:", updatedValues);
    $.ajax({
      url: "handler/update.php",
      type: "POST",
      data: updatedValues,
      success: function (response) {
        if (response === "Successfully updated a destination") {
          console.log("Destination updated successfully");
          alert("Destination updated successfully");
          editedRow.find("td").removeAttr("contenteditable");
          editedRow.removeClass("editing");
        } else {
          console.log("Error updating destination: " + response);
          alert("Error updating destination: " + response);
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log("AJAX request failed: " + textStatus + ", " + errorThrown);
        alert("AJAX request failed: " + textStatus + ", " + errorThrown);
      },
      complete: function () {
        $("#btn-finish").hide();
      },
    });
  }
});
