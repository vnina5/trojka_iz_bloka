$(document).ready(function () {
  // setPlayers();

  var order = -1;
  var isFinal = false;

  $("#sort").click(function () {
    order *= -1;
    // setTable(sortOrder);

    if (order == -1) $("#sort").html("СОРТИРАЈ ТАБЕЛУ");
    else $("#sort").html("ВРАТИ ПРВОБИТНУ ТАБЕЛУ");
  });

  setPlayerKos1();
  setPlayerKos2();

  setInterval(function () {
    if (isFinal) {
      if (order == 1) urlSort = "./handler/getDataOrderedFinal.php";
      else urlSort = "./handler/getDataFinal.php";
    } else {
      if (order == 1) urlSort = "./handler/getDataOrdered.php";
      else urlSort = "./handler/getData.php";
    }

    setTable(urlSort);
  }, 1000);

  $("#finale").click(function () {
    confirm("Да ли сте сигурни да желите да почнете финале?");
    sortTableFinal();
    isFinal = true;
    order = 1;
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
// IGRACI KOJI TRENUTNO I SLEDECI SUTIRAJU
function setPlayerKos1() {
  $.ajax({
    type: "GET",
    url: "./handler/getPlayers.php",
    dataType: "json",
    success: function (data) {
      console.log(data);

      $("#ime-tr1").empty();
      $("#ime-sl1").empty();

      var rowTR = data[0].ime + " " + data[0].prezime;
      $("#ime-tr1").html(rowTR);
      var rowSL = data[2].ime + " " + data[2].prezime;
      $("#ime-sl1").html(rowSL);
    },
  });
}

function setPlayerKos2() {
  $.ajax({
    type: "GET",
    url: "./handler/getPlayers.php",
    dataType: "json",
    success: function (data) {
      console.log(data);

      $("#ime-tr2").empty();
      $("#ime-sl2").empty();

      var rowTR = data[1].ime + " " + data[1].prezime;
      $("#ime-tr2").html(rowTR);
      var rowSL = data[3].ime + " " + data[3].prezime;
      $("#ime-sl2").html(rowSL);
    },
  });
}

// ==================================================
// SORTIRAJ ZA FINALE
function sortTableFinal() {
  var rows = [];

  $.ajax({
    type: "GET",
    url: "./handler/getDataOrdered.php",
    dataType: "json",
    success: function (data) {
      $.each(data, function (i, item) {
        if (item.kosevi == null) return;

        if (i >= 9 && item.kosevi != rows[rows.length - 1].kosevi) {
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
    url: "./handler/deleteAllFinal.php",
    success: function (response) {
      console.log(response); // ispiši odgovor u konzoli
    },
  });
  console.log(rows);
  $.each(rows, function (i, item) {
    $.ajax({
      type: "POST",
      url: "./handler/addFinal.php",
      data: item, // podaci koje šaljemo u PHP skriptu
      success: function (response) {
        console.log(response); // ispiši odgovor u konzoli
      },
    });
  });
}

// ==================================================
// DODAVANJE NOVOG IGRACA U TABELU

// function addNewPlayer(event) {
// event.preventDefault(); // spriječi uobičajeno slanje forme
// var formData = $(this).serialize(); // dohvati podatke iz forme
// $.ajax({
//   url: "./handler/add.php", // putanja do PHP skripte koja će dodati novi red
//   type: "POST",
//   data: formData, // podaci koje šaljemo u PHP skriptu
//   success: function (response) {
//     console.log(response); // ispiši odgovor u konzoli
//   },
// });

//   var form = $("#dodajNovog")[0];
//   var formData = new FormData(form);
//   event.preventDefault();
//   // console.log(formData);

//   request = $.ajax({
//     url: "./handler/add.php",
//     type: "POST",
//     processData: false,
//     contentType: false,
//     data: formData,
//   });
//   // console.log(request);

//   request.done(function (response, textStatus, jqXHR) {
//     // console.log(textStatus);
//     // console.log(jqXHR);
//     console.log(response);

//     if (response == 1) {
//       alert("Uspesno dodato");
//     } else {
//       console.log("Neuspesno" + response);
//     }
//   });

//   request.fail(function (jqXHR, textStatus, errorThrown) {
//     console.error("Greska: " + textStatus, errorThrown);
//   });
// }
