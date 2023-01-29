const nameInput = document.getElementsByName("name")[0];
const dobInput = document.getElementsByName("dob")[0];
const addressInput = document.getElementsByName("address")[0];
const postcodeInput = document.getElementsByName("postcode")[0];
const formEl = document.getElementById("contactForm");
const submitBtnEl = document.getElementById("submitBtn");
const resultBtnEl = document.getElementById("resultBtn");

function postData(event) {
    event.preventDefault();
    const url = "../api/create.php";
    let formData = {
        name: nameInput.value,
        dob: dobInput.value,
        address: addressInput.value,
        postcode: postcodeInput.value,
    };

    for (let key in formData) {
        if (!formData[key]) {
            formData[key] = null;
        }
    }

    $.ajax({
        type: "POST",
        contentType: "application/json",
        url: url,
        data: JSON.stringify(formData),
        dataType: "JSON",
    })
        .done(function (response) {
            alert(response.message);
            window.location.reload();
        })
        .fail(function (error) {
            alert(error.statusText);
        });
}

function getData() {
    const url = "../api/read.php";
    const tbody = $("table tbody");

    $.get(url, function (data) {
        let html = "";
        if (data.length === 0) {
            html += `<tr><td colspan="5" class="text-center">No data found</td></tr>`;
        } else {
            data.forEach(function (customer) {
                html += `<tr>
                            <td>${customer.name}</td>
                            <td>${customer.age}</td>
                            <td>${customer.address}</td>
                            <td>${customer.postcode}</td>
                            <td>${customer.state}</td>
                        </tr>`;
            });
        }
        tbody.html(html);
    }).fail(function () {
        alert("Error querying data");
    });
}

submitBtnEl.addEventListener("click", postData);
resultBtnEl.addEventListener("click", getData);
