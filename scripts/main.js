// ----------------------------- Grocery Hover ------------------------------------
const viewFoods = document.querySelectorAll(".menu-view").forEach((view) => {
  view.addEventListener("mouseenter", (e) => {
    view.open = true;
  });

  view.addEventListener("mouseleave", (e) => {
    view.open = false;
  });
});

// ----------------------------- View Product onClick ------------------------------------
// when view product button is clicked turn it into hide product button
// when hide product button is clicked turn it into view product button

const viewProductBtn = document.querySelectorAll(".viewProductBtn");
viewProductBtn.forEach((btn) => {
  btn.addEventListener("click", function () {
    if (btn.classList.contains("viewProductBtn") && btn.id == "frozenFoodBtn") {
      document.getElementById(btn.id).innerHTML = "Hide Products";
      // details tag in index.php should have attribute open="true"
      document.getElementById("frozenFoods").open = true;
      btn.classList.remove("viewProductBtn");
      btn.classList.add("hideProductBtn");
    } else if (
      btn.classList.contains("hideProductBtn") &&
      btn.id == "frozenFoodBtn"
    ) {
      document.getElementById(btn.id).innerHTML = "View Products";
      document.getElementById("frozenFoods").open = false;
      btn.classList.remove("hideProductBtn");
      btn.classList.add("viewProductBtn");
    }

    if (btn.classList.contains("viewProductBtn") && btn.id == "freshFoodBtn") {
      document.getElementById(btn.id).innerHTML = "Hide Products";
      document.getElementById("freshFoods").open = true;
      btn.classList.remove("viewProductBtn");
      btn.classList.add("hideProductBtn");
    } else if (
      btn.classList.contains("hideProductBtn") &&
      btn.id == "freshFoodBtn"
    ) {
      document.getElementById(btn.id).innerHTML = "View Products";
      document.getElementById("freshFoods").open = false;
      btn.classList.remove("hideProductBtn");
      btn.classList.add("viewProductBtn");
    }

    if (btn.classList.contains("viewProductBtn") && btn.id == "beveragesBtn") {
      document.getElementById(btn.id).innerHTML = "Hide Products";
      document.getElementById("beverages").open = true;
      btn.classList.remove("viewProductBtn");
      btn.classList.add("hideProductBtn");
    } else if (
      btn.classList.contains("hideProductBtn") &&
      btn.id == "beveragesBtn"
    ) {
      document.getElementById(btn.id).innerHTML = "View Products";
      document.getElementById("beverages").open = false;
      btn.classList.remove("hideProductBtn");
      btn.classList.add("viewProductBtn");
    }

    if (btn.classList.contains("viewProductBtn") && btn.id == "homeHealthBtn") {
      document.getElementById(btn.id).innerHTML = "Hide Products";
      document.getElementById("homeHealth").open = true;
      btn.classList.remove("viewProductBtn");
      btn.classList.add("hideProductBtn");
    } else if (
      btn.classList.contains("hideProductBtn") &&
      btn.id == "homeHealthBtn"
    ) {
      document.getElementById(btn.id).innerHTML = "View Products";
      document.getElementById("homeHealth").open = false;
      btn.classList.remove("hideProductBtn");
      btn.classList.add("viewProductBtn");
    }

    if (btn.classList.contains("viewProductBtn") && btn.id == "petFoodBtn") {
      document.getElementById(btn.id).innerHTML = "Hide Products";
      document.getElementById("petFoods").open = true;
      btn.classList.remove("viewProductBtn");
      btn.classList.add("hideProductBtn");
    } else if (
      btn.classList.contains("hideProductBtn") &&
      btn.id == "petFoodBtn"
    ) {
      document.getElementById(btn.id).innerHTML = "View Products";
      document.getElementById("petFoods").open = false;
      btn.classList.remove("hideProductBtn");
      btn.classList.add("viewProductBtn");
    }
  });
});

// ----------------------------- View Product Description ------------------------------------
// function decrement <button type="button" class="minus" onclick="decrementValue()">-</button>
// function increment <button type="button" class="plus" onclick="incrementValue()">+</button>

function decrementValue() {
  // if value is 1, disable decrement button
  var value = parseInt(document.getElementById("quantity").value, 10);
  value = isNaN(value) ? 0 : value;
  value > 1 ? (value = value - 1) : "";
  document.getElementById("quantity").value = value;
}

function incrementValue() {
  // add 1 to value, however is value is 20 then disable increment button
  var value = parseInt(document.getElementById("quantity").value, 10);
  value = isNaN(value) ? 0 : value;
  value < 20 ? (value = value + 1) : "";
  document.getElementById("quantity").value = value;
}


// ----------------------------- order deets ------------------------------------

