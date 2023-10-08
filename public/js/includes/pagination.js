let pag_link = document.getElementsByClassName("pag_link");

let currentValue = 1;

function activeLink() {
  for (l of pag_link) {
    l.classList.remove("active_pag");
  }
  event.target.classList.add("active_pag");
  currentValue = event.target.value;
}

function prevPag() {
  if (currentValue > 1) {
    for (l of pag_link) {
      l.classList.remove("active_pag");
    }
    currentValue--;
    console.log(currentValue);
    pag_link[currentValue - 1].classList.add("active_pag");
  }
}

function nextPag() {
  if (currentValue < 5) {
    for (l of pag_link) {
      l.classList.remove("active_pag");
    }
    currentValue++;
    pag_link[currentValue - 1].classList.add("active_pag");
  }
}

let pagination_container_eventlog = document.getElementById(
  "pagination_container_eventlog"
);
let go_to_page_eventlog = document.getElementById("go_to_page_eventlog");

function pagination_hide() {
  console.log("Here");
  pagination_container_eventlog.classList.add(
    "pagination_container_eventlog_hide"
  );
  go_to_page_eventlog.classList.add("go_to_page_eventlog_hide");
}
