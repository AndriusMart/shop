function services(selector, data) {
  // validuojame atejusius duomenis
  const inputResult = isValidServiceInput(selector, data);
  if (inputResult !== true) {
    return console.error(inputResult);
  }

  // logika
  const DOM = document.querySelector(selector);
  if (!DOM) {
    return console.error(
      "Nerastas elementas i kuri reikia sugeneruoti nauja turini"
    );
  }

  let HTML = "";

  for (const item of data) {
    if (!isValidServiceItem(item)) {
      continue;
    }
    HTML += `<div class="hero-lower" style="background: ${item.bgcolor}">
                    <a class="hero-lower-a" href="#" title="Akcijos">
                        <i class="fa fa-${item.icon} hero-lower-i"></i>
                        <h6 class="hero-lower-h">${item.title}</h6>
                    </a>
            </div>`;
  }

  // validuojame rezultata
  if (HTML === "") {
    return console.error("Duomenyse nera normalios/teisingos informacijos");
  }

  // graziname rezultata
  DOM.innerHTML = HTML;

  return true;
}

function isValidServiceInput(selector, data) {
  if (typeof selector !== "string" || selector === "") {
    return "Selektorius turi buti ne tuscias string`as";
  }

  if (!Array.isArray(data) || data.length === 0) {
    return "Services function requires non-empty array of data";
  }

  return true;
}

function isValidServiceItem(data) {
  if (
    typeof data !== "object" ||
    data === null ||
    Array.isArray(data) ||
    typeof data.icon !== "string" ||
    !data.icon ||
    data.icon.length > 15 ||
    typeof data.title !== "string" ||
    !data.title ||
    data.title.length > 100 ||
    typeof data.bgcolor !== "string" ||
    !data.bgcolor ||
    data.bgcolor.length > 30 ||
    Object.keys(data).length !== 3
  ) {
    return false;
  }
  return true;
}


