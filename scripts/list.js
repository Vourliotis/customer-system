window.onload = loadCustomers();

// ajax load customers
function loadCustomers() {
  $.getJSON(
    "http://localhost/customer-system/api/customer/read.php",
    {},
    function (data, textStatus, jqXHR) {
      for (var key in data) {
        for (var i = 0; i < data[key].length; i++) {
          var id = data[key][i].id;
          var fname = data[key][i].fname;
          var lname = data[key][i].lname;
          var pnumber = data[key][i].pnumber;
          var email = data[key][i].email;
          var category = data[key][i].category;
          var endpoint =
            "http://localhost/customer-system/edit-form.php?id=" + id;
          var badge = document.createElement("tr");
          badge.innerHTML =
            "<td>" +
            fname +
            "</td>" +
            "<td>" +
            lname +
            "</td>" +
            "<td>" +
            pnumber +
            "</td>" +
            "<td>" +
            email +
            "</td>" +
            "<td>" +
            category +
            "</td>" +
            "<td>" +
            "<a href=" +
            endpoint +
            ' class="btn btn-secondary" style="border-radius:0;" id="btnEdit">Edit</a>' +
            "<button onclick='deleteCustomer(" +
            id +
            ")'class='btn btn-danger' id='btnDelete' style='border-radius:0;'> Delete </button>" +
            "</td>";
          document.getElementById(key).appendChild(badge);
        }
      }
    }
  );
}

// delete customer
function deleteCustomer(id) {
  const result = window.confirm(
    "Are you sure you want to delete this customer?"
  );
  if (result) {
    var deleteQuery = '{"id":"' + id + '"}';
    console.log(deleteQuery);
    $.ajax({
      url: "http://localhost/customer-system/api/customer/delete.php?",
      type: "DELETE",
      dataType: "json",
      data: deleteQuery,
      contentType: "application/json",
      success: function () {
        alert("Successful Deletion");
        $("#records").load("list.html #mytable");
        loadCustomers();
      },
    });
  }
}
