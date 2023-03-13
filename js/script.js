const btnDodaj1 = document.getElementById("btn-dodaj1");
const btnDodaj2 = document.getElementById("btn-dodaj2");
const btnIzbrisi = document.getElementById("btn-izbrisi");
const btnDao0 = document.getElementById("btn-dao0");
const btnSledeci = document.getElementById("btn-sl");
const dataKos = document.querySelector("[data-kos]");
const btnSortiraj = document.querySelector(".btn-sortiraj");

let score = null;

btnDodaj1.addEventListener("click", () => {
  console.log("dao je 1 kos!");
  score += 1;
  dataKos.textContent = score;
});

btnDodaj2.addEventListener("click", () => {
  console.log("dao je 2 kosa!");
  score += 2;
  dataKos.textContent = score;
});

btnIzbrisi.addEventListener("click", () => {
  console.log("nije dao kos!");
  score -= 1;
  dataKos.textContent = score;
});

btnDao0.addEventListener("click", () => {
  console.log("dao je 0 koseva!");
  score = 0;
  dataKos.textContent = score;
});

btnSledeci.addEventListener("click", () => {
  console.log(score);
  writeScore();
});

function writeScore() {
  let request = $.post("./handler/score.php", { score: score });
  console.log(request);
  request.done(function (response) {
    console.log(response);
  });
}
