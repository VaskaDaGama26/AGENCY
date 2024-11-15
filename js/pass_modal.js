// Открыть модальное окно Portfolio
function openModal() {
    document.getElementById("PortModal").style.display = "block";
}

// Закрыть модальное окно Portfolio при клике на "x"
function closeModal() {
    document.getElementById("PortModal").style.display = "none";
}

// Открыть модальное окно News
function openModal1() {
    document.getElementById("NewsModal").style.display = "block";
}

// Закрыть модальное окно News при клике на "x"
function closeModal1() {
    document.getElementById("NewsModal").style.display = "none";
}

// Открыть модальное окно Services
function openModal2() {
    document.getElementById("ServModal").style.display = "block";
}

// Закрыть модальное окно Services при клике на "x"
function closeModal2() {
    document.getElementById("ServModal").style.display = "none";
}

// Открыть модальное окно Users(add)
function openModal3() {
    document.getElementById("UserModal").style.display = "block";
}

// Закрыть модальное окно Users(add) при клике на "x"
function closeModal3() {
    document.getElementById("UserModal").style.display = "none";
}

// Открыть модальное окно Users(edit)
function openModal4() {
    document.getElementById("UserModal1").style.display = "block";
}

// Закрыть модальное окно Users(edit) при клике на "x"
function closeModal4() {
    document.getElementById("UserModal1").style.display = "none";
}

// Открыть модальное окно ChangePass
function openModal5() {
    document.getElementById("ChangePassModal").style.display = "block";
}

// Закрыть модальное окно ChangePass при клике на "x"
function closeModal5() {
    document.getElementById("ChangePassModal").style.display = "none";
}

// Открыть модальное окно для изменения заказа
function openEditModal(orderID) {
    document.getElementById("editOrderID").value = orderID;
    document.getElementById("AdminModal").style.display = "block";
}

// Закрыть модальное окно для изменения заказа
function closeEditModal() {
    document.getElementById("AdminModal").style.display = "none";
}
