

import './bootstrap';
import axios from "axios";


const breakdown = document.querySelector("#breakdown");
if (breakdown) {
    const subcategoryList = breakdown.querySelector("#subcategory-list");
    const categoryId = breakdown.querySelector("[name=category_id]");
    categoryId.addEventListener("change", () => {
        if (categoryId.value === "0") {
            subcategoryList.innerHTML = "";
        } else {
            axios
                .get(breakdownUrl + "/subcategory-list/" + categoryId.value)
                .then((res) => {
                    subcategoryList.innerHTML = res.data.html;
                });
        }
        console.log(categoryId.value);
    });
}


let items = document.querySelectorAll(".carousel .carousel-item");

items.forEach((el) => {
  const minPerSlide = 4;
  let next = el.nextElementSibling;
  for (var i = 1; i < minPerSlide; i++) {
    if (!next) {
      next = items[0];
    }
    let cloneChild = next.cloneNode(true);
    el.appendChild(cloneChild.children[0]);
    next = next.nextElementSibling;
  }
});

