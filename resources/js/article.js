function sortTable(column) {
    const urlParams = new URLSearchParams(window.location.search);
    let direction = urlParams.get("sort_direction") === "asc" ? "desc" : "asc";
    urlParams.set("sort_by", column);
    urlParams.set("sort_direction", direction);
    window.location.search = urlParams.toString();
}
window.sortTable = sortTable;

