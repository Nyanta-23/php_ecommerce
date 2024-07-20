const baseUrl = "http://localhost:8080/php_ecommerce/public";

const productHighlightImage = highlightImage();

const tooltipData = ["buyer", "seller", "orders", "products", "dashboard"];

document.addEventListener("DOMContentLoaded", () => {

  showConfirm();
  showAlert();
  changePriceWithQuantity();

  tooltipData.forEach(e => (showToolTip(e)));

  highlightImage();
});

function showToolTip(dataAttr) {
  const toolTipElement = document.querySelector(`[data-tooltip="${dataAttr}"]`);

  if (JSON.stringify(toolTipElement) != "null") {
    const tooltip = bootstrap.Tooltip.getOrCreateInstance(toolTipElement);
    toolTipElement.addEventListener("mouseover", () => {
      tooltip.show();
    });
    tooltip.hide();
  }
}

function showConfirm() {
  const modal = document.getElementById("confirm");
  if (JSON.stringify(modal) != "null") {
    const modal = new bootstrap.Modal("#confirm", {
      backdrop: true
    });
    modal.show();
  }
}
function showAlert() {
  const modal = document.getElementById("alert");
  // console.log(modal);
  if (JSON.stringify(modal) != "null") {
    const modal = new bootstrap.Modal("#alert", {
      backdrop: true
    });
    modal.show();
  }
}


function highlightImage() {
  const highlightImage = document.getElementById("product_image_highlight");

  const check = document.getElementById("product_image_input") != "null" ? document.getElementById("product_image_input") : false;


  if (check) {

    check.addEventListener("change", function (e) {
      const files = e.target.files;
      if (files.length > 0) {
        const file = files[0];
        const reader = new FileReader();


        reader.onload = function (e) {
          highlightImage.src = e.target.result;
          highlightImage.classList.add('highlight');
        };

        console.log(reader.readAsDataURL(file));
        reader.readAsDataURL(file);
      }
    });

    highlightImage.addEventListener('load', function () {
      setTimeout(() => {
        highlightImage.classList.remove('highlight');
      }, 3000); // Remove highlight after 3 seconds
    });

  }

}

function changePriceWithQuantity() {
  const amountSelect = document.getElementById("inputQuantity");
  const controllerValue = document.getElementsByClassName("controller-value");
  const price = document.getElementById("price");
  const priceNum = parseInt(price.innerText.split(',')[0].split('Rp.')[1].split('.').join(''));

  const updatePrice = () => {
    const newPrice = priceNum * parseInt(amountSelect.value);
    price.innerText = 'Rp.' + newPrice.toLocaleString('id-ID') + ',00';
  }

  controllerValue[0].addEventListener("click", () => {
    if (parseInt(amountSelect.value) > 1) {
      amountSelect.value = parseInt(amountSelect.value) - 1;
      updatePrice();
    };
  });
  controllerValue[1].addEventListener("click", () => {
    amountSelect.value = parseInt(amountSelect.value) + 1
    updatePrice();
  });

  updatePrice();
}

