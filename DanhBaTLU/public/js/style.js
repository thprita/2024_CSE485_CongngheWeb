//Info
function showUserInfo() {
    var userxem = document.querySelector(".userxem");
    var userInfoDiv = document.querySelector(".userInfo");
    if (userInfoDiv.style.display === "none") {
        userInfoDiv.style.display = "block";
        userxem.textContent = 'Ẩn';
        userxem.style.backgroundColor = "red";

    } else {
        userxem.textContent = 'Xem';
        userxem.style.backgroundColor = "rgb(21, 115, 71)";
        userInfoDiv.style.display = "none";
    }
}
