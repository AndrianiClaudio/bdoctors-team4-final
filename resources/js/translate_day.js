// document.getElementById("translate_day").innerHTML;
// document.getElementById("translate_day");
let td = "";
switch (document.getElementById("translate_day").innerHTML.trim()) {
    case "Monday":
        td = "Lunedi";
        break;
    case "Tuesday":
        td = "Martedi";
        break;
    case "Wednesday":
        td = "Mercoledi";
        break;
    case "Thursday":
        td = "Giovedi";
        break;
    case "Friday":
        td = "Venerdi";
        break;
    case "Saturday":
        td = "Sabato";
        break;
    case "Sunday":
        td = "Domenica";
        break;
}
document.getElementById("translate_day").innerHTML = td;

// console.log(document.getElementById("translate_week_month").innerHTML);
let wm = "";
switch (document.getElementById("translate_week_month").innerHTML.trim()) {
    case "1":
        wm = "Gennaio";
        break;
    case "2":
        wm = "Febbraio";
        break;
    case "3":
        wm = "Marzo";
        break;
    case "4":
        wm = "Aprile";
        break;
    case "5":
        wm = "Maggio";
        break;
    case "6":
        wm = "Giugno";
        break;
    case "7":
        wm = "Luglio";
        break;
    case "8":
        wm = "Agosto";
        break;
    case "9":
        wm = "Settembre";
        break;
    case "10":
        wm = "Ottobre";
        break;
    case "11":
        wm = "Novembre";
        break;
    case "12":
        wm = "Dicembre";
        break;
}

document.getElementById("translate_week_month").innerHTML = wm;
