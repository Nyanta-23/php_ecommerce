const baseUrl = "http://localhost:8080/php_ecommerce/public";

$('.datepicker').datepicker();

document.addEventListener("DOMContentLoaded", () => {

  showModalLogout();
  showToolTipToBeSeller();




});

function showModalLogout() {
  const modal = document.getElementById("modal");
  if (JSON.stringify(modal) != "null") {
    const modalLogout = new bootstrap.Modal("#modal", {
      backdrop: true
    });
    modalLogout.show();
  }
}

function showToolTipToBeSeller() {

  const tooltipElmSeller = document.querySelector('[data-tooltip="seller"]');

  if (JSON.stringify(tooltipElmSeller) != "null") {
    const tooltip = bootstrap.Tooltip.getOrCreateInstance(tooltipElmSeller);
    tooltipElmSeller.addEventListener("mouseover", () => {
      tooltip.show();
    });
    tooltip.hide();
  }
}
