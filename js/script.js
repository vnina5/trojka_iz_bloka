$(document).ready(function () {
  // setPlayers();

  var order = -1;
  var isFinal = false;

  var i1 = 0;
  var i2 = 0;

  $("#sort").click(function () {
    order *= -1;
    // setTable(sortOrder);

    if (order == -1) $("#sort").html("СОРТИРАЈ ТАБЕЛУ");
    else $("#sort").html("ВРАТИ ПРВОБИТНУ ТАБЕЛУ");
  });

  // ekran za voditelja
  getPlayerKos1();
  getPlayerKos2();

  // ekran za brojaca koseva
  naKomKosuSutira();

  setInterval(function () {
    // if (isFinal) {
    //   if (order == 1) urlSort = "./handler/getDataOrderedFinal.php";
    //   else urlSort = "./handler/getDataFinal.php";
    // } else {
    //   if (order == 1) urlSort = "./handler/getDataOrdered.php";
    //   else urlSort = "./handler/getData.php";
    // }

    if (order == 1) urlSort = "./handler/getDataOrdered.php";
    else urlSort = "./handler/getData.php";

    setTable(urlSort);
  }, 1000);

  $("#finale").click(function () {
    let broj = prompt(
      "Ако сте сигурни да желите да почнете финале унесите број такмичара који пролазе у финале.\n(У финале може да прође од 8 до 20 такмичара)"
    );

    broj = parseInt(broj);
    console.log(Number.isInteger(broj));

    if (broj != null && broj != "" && broj >= 8 && broj <= 20) {
      sortTableFinal(broj);
      isFinal = true;
      order = 1;

      // kopirajTabelu();
      // console.log("finale");
    } else {
      alert("Нисте унели одговарајући број. Покушајте поново!");
    }
  });

  // $("#dodajNovog").submit(function (event) {
  //   addNewPlayer(event);
  // });
});

// ==================================================

// ==================================================
// SORTIRANJE TABELE
function setTable(urlSort) {
  $.ajax({
    type: "GET",
    url: urlSort,
    dataType: "json",
    success: function (data) {
      $("#tbl-body").empty();
      $.each(data, function (i, item) {
        if (item.kosevi == null) item.kosevi = "";
        var row =
          "<tr><td>" +
          item.ime +
          "</td><td>" +
          item.prezime +
          "</td><td>" +
          item.kosevi +
          "</td></tr>";
        $("#tbl-body").append(row);
      });
    },
  });
}

// ==================================================
// IGRACI KOJI TRENUTNO I SLEDECI SUTIRAJU - EKRAN ZA VODITELJA
function getPlayerKos1() {
  $.ajax({
    type: "GET",
    url: "./handler/getPlayers1.php",
    dataType: "json",
    success: function (data) {
      // console.log(data);

      $("#ime-tr1").empty();
      $("#ime-sl1").empty();

      let i = 0;
      $("#btn-tr1").click(function () {
        // console.log("sledeci 1");
        i++;
        setPlayer(data[i], "#ime-tr1");
        setPlayer(data[i + 1], "#ime-sl1");
      });

      setPlayer(data[i], "#ime-tr1");
      setPlayer(data[i + 1], "#ime-sl1");
    },
  });
}

function getPlayerKos2() {
  $.ajax({
    type: "GET",
    url: "./handler/getPlayers2.php",
    dataType: "json",
    success: function (data) {
      // console.log(data);

      $("#ime-tr2").empty();
      $("#ime-sl2").empty();

      let i = 0;
      $("#btn-tr2").click(function () {
        // console.log("sledeci 2");
        i++;
        setPlayer(data[i], "#ime-tr2");
        setPlayer(data[i + 1], "#ime-sl2");
      });

      setPlayer(data[i], "#ime-tr2");
      setPlayer(data[i + 1], "#ime-sl2");
    },
  });
}

// ==================================================
// DODAVANJE I UPISIVANJE KOSEVA - EKRAN ZA BROJACA KOSEVA
function naKomKosuSutira() {
  let rbkos = $("[data-kos]").text();
  if (rbkos == 1) kos1();
  if (rbkos == 2) kos2();
}

function kos1() {
  $.ajax({
    type: "GET",
    url: "./handler/getPlayers1.php",
    dataType: "json",
    success: function (data) {
      // console.log(data);

      $("#ime-kos1").empty();

      i1 = 0;
      setPlayer(data[i1], "#ime-kos1");

      // let id = data[i1].id;
      dodajKos(1, data);
    },
  });
}

function kos2() {
  $.ajax({
    type: "GET",
    url: "./handler/getPlayers2.php",
    dataType: "json",
    success: function (data) {
      // console.log(data);

      $("#ime-kos2").empty();

      i2 = 0;
      setPlayer(data[i2], "#ime-kos2");

      // let id = data[i2].id;
      dodajKos(2, data);
    },
  });
}

function dodajKos(rbkos, data) {
  let score = null;
  if (rbkos == 1) score = data[i1].kosevi;
  if (rbkos == 2) score = data[i2].kosevi;

  if (score != null) {
    score = parseInt(score);
    $("[data-score]").html(score);
  }

  $("#btn-dodaj1").click(function () {
    console.log("dao je 1 kos!");
    score += 1;
    $("[data-score]").html(score);
  });

  $("#btn-dodaj2").click(function () {
    console.log("dao je 2 kosa!");
    score += 2;
    $("[data-score]").html(score);
  });

  $("#btn-izbrisi").click(function () {
    console.log("nije dao kos!");
    score -= 1;
    $("[data-score]").html(score);
  });

  $("#btn-dao0").click(function () {
    console.log("dao je 0 koseva!");
    score += 0;
    $("[data-score]").html(score);
  });

  $("#btn-sl").click(function () {
    if (rbkos == 1) {
      userID = data[i1].id;
      writeScore(score, userID);

      i1++;
      setPlayer(data[i1], "#ime-kos1");
    }

    if (rbkos == 2) {
      userID = data[i2].id;
      writeScore(score, userID);

      i2++;
      setPlayer(data[i2], "#ime-kos2");
    }

    $("[data-score]").html("x");
    score = null;
  });
}

function writeScore(score, userID) {
  console.log("skor je" + score);

  let request = $.post("./handler/score.php", {
    score: score,
    // rbkos: rbkos,
    userID: userID,
  });
  console.log(request);
  request.done(function (response) {
    console.log(response);
  });
}

function setPlayer(player, where) {
  var rowTR = player.ime + " " + player.prezime;
  $(where).html(rowTR);
}

// ==================================================
// SORTIRAJ ZA FINALE
function sortTableFinal(br) {
  var rows = [];

  $.ajax({
    type: "GET",
    url: "./handler/getDataOrdered.php",
    dataType: "json",
    success: function (data) {
      $.each(data, function (i, item) {
        if (item.kosevi == null) return;

        if (i >= br && item.kosevi != rows[rows.length - 1].kosevi) {
          return;
        }

        rows[i] = item;
      });
      console.log(rows);
      addFinal(rows);
    },
  });
}

function addFinal(rows) {
  $.ajax({
    type: "DELETE",
    url: "./handler/deleteAll.php",
    success: function (response) {
      console.log(response); // ispiši odgovor u konzoli
    },
  });

  $.each(rows, function (i, item) {
    $.ajax({
      type: "POST",
      url: "./handler/addFinal.php",
      data: item, // podaci koje šaljemo u PHP skriptu
      success: function (response) {
        console.log(response); // ispiši odgovor u konzoli
        getPlayerKos1();
        getPlayerKos2();
      },
    });
  });
}

// ---------------------------------------------------------------

function kopirajTabelu() {
  var rows = [];
  $.ajax({
    type: "GET",
    url: "./handler/getDataOrdered.php",
    dataType: "json",
    success: function (data) {
      $.each(data, function (i, item) {
        if (item.kosevi == null) return;

        // if (i >= 9 && item.kosevi != rows[rows.length - 1].kosevi) {
        //   return;
        // }

        rows[i] = item;
      });
      // console.log(data);
      ubaciUTabelu(rows);
    },
  });
}

function ubaciUTabelu(rows) {
  $.ajax({
    type: "DELETE",
    url: "./handler/deleteAllFinal.php",
    success: function (response) {
      console.log(response); // ispiši odgovor u konzoli
    },
  });
  console.log(rows);
  $.each(rows, function (i, item) {
    $.ajax({
      type: "POST",
      url: "./handler/addFinalFinal.php",
      data: item, // podaci koje šaljemo u PHP skriptu
      success: function (response) {
        console.log(response); // ispiši odgovor u konzoli
      },
    });
  });
}
