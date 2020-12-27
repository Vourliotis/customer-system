// form to json
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
  const json = serialize_form(this);
  console.log(json);
  $.ajax({
    type: "POST",
    url: "http://localhost/customer-system/api/customer/create.php",
    dataType: "json",
    data: json,
    contentType: "application/json",
    complete: function () {
      alert("Successful Submission");
      window.location.replace("http://localhost/customer-system/list.html");
    },
  });
});
