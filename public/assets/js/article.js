let currentSort = {
    column: 'id',
    direction: 'asc',
}

function sortTable(column) {
    const urlParams = new URLSearchParams(window.location.search);
    let direction = urlParams.get("sortDirection") === "asc" ? "desc" : "asc";
    urlParams.set("sortBy", column);
    urlParams.set("sortDirection", direction);
    window.location.search = urlParams.toString();
}

document.getElementById("search").addEventListener("input", function (e) {
    const value = e.target.value;
    const urlParams = new URLSearchParams(window.location.search);
    urlParams.set("search", value);
    urlParams.set("page", 1);
    window.location.search = urlParams.toString();
});

document.addEventListener("DOMContentLoaded", function () {
    const customElement = document.createElement("div");
    customElement.innerText = "Custom JavaScript is running!";
    customElement.style.backgroundColor = "lightgreen";
    customElement.style.padding = "10px";
    customElement.style.textAlign = "center";

    document.body.appendChild(customElement);
});
