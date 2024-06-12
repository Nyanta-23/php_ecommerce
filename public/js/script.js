const baseUrl = "http://localhost:8080/php_ecommerce/public";

document.addEventListener("DOMContentLoaded", () => {

  showModal();

})

function showModal() {
  const modal = document.getElementById("modal");

  if (JSON.stringify(modal) != "null") {
    const modalLogout = new bootstrap.Modal("#modal", {
      backdrop: true
    });

    modalLogout.show();

    

  }
}
