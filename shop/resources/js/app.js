

import './bootstrap';
import axios from "axios";

// sub category loader after selecting category
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




