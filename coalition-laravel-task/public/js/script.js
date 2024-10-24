document.addEventListener("DOMContentLoaded", function() {
    let myform = document.getElementById("form");
    myform.addEventListener("submit", function (e) {
        e.preventDefault();
        const csrfToken = document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute("content");
        let formData = new FormData(myform);
        let formObject = {};
        formData.forEach((value, key) => {
            formObject[key] = value;
        });
        fetch("/submit", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": csrfToken,
            },
            body: JSON.stringify(formObject),
        });
        document.querySelectorAll(".row").forEach(el => el.remove());
        fetchData();
    });
    
    async function fetchData() {
        await fetch("/fetch", {
            method: "GET",
            headers: {
                "Content-Type": "application/json",
            },
        })
            .then((resp) => {
                return resp.json();
            })
            .then((response) => {
                let total = 0;
                const tableBody = document.querySelector("#table tbody");
                response.forEach((element) => {
                    const row = document.createElement("tr");
                    row.className = `row`;
                    row.innerHTML = `
                            <td>${element.productName}</td>
                            <td>${element.quantity}</td>
                            <td>${element.price}</td>
                            <td>${element.DateTime}</td>
                            <td>${element.quantity * element.price}</td>
                        `;
                    tableBody.appendChild(row);
                    total += element.quantity * element.price;
                });
                const row = document.createElement("tr");
                row.className = `row`;
                row.innerHTML = `
            <td></td>
            <td></td>
            <td></td>
            <td>TOTAL:</td>
            <td>${total}</td>
        `;
                tableBody.appendChild(row);
                console.log(total);
            });
    }

    fetchData();
});
