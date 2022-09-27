

import './bootstrap';
import axios from "axios";
import { Modal } from 'bootstrap';






import { services } from '../js/components/services.js';
import { servicesData } from '../js/data/servicesData.js';

services('#services_block', servicesData);

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


