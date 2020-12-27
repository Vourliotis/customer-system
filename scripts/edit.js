const id = this.customer_id;

// ajax get call
$.getJSON(
  "http://localhost/customer-system/api/customer/read_one.php?id=" + id,
  {},
  function (data, textStatus, jqXHR) {
    var fname = data.fname;
    var lname = data.lname;
    var pnumber = data.pnumber;
    var email = data.email;
    var category = data.category;
    var badge = document.createElement("div");
    badge.innerHTML = fname + lname + email + category;
    document.getElementById("fname").value = fname;
    document.getElementById("lname").value = lname;
    document.getElementById("pnumber").value = pnumber;
    document.getElementById("email").value = email;
    document.getElementById("category").value = category;
  }
);

// creating json from form
const serialize_form = (form) =>
  JSON.stringify(
    Array.from(new FormData(form).entries()).reduce(
      (m, [key, value]) => Object.assign(m, { [key]: value }),
      {}
    )
  );

// form submission
$("#dataForm").on("submit", function (event) {
  event.preventDefault();
  var json = serialize_form(this);
  console.log(json);
  console.log(id);
  $.ajax({
    type: "PUT",
    url: "http://localhost/customer-system/api/customer/update.php?id=" + id,
    dataType: "json",
    data: json,
    contentType: "application/json",
    success: function () {
      alert("Successful Update");
      window.location.replace("http://localhost/customer-system/list.html");
    },
  });
});
