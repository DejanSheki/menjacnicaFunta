const api_url = 'https://kurs.resenje.org/api/v1/rates/today';

async function getList() {
    const response = await fetch(api_url);
    const data = await response.json();
    const result = data.rates;

    /////// oduzimanje i dodavanje procenta i zaokruzivanje decimale /////////////
    function minusPercent(n, p) {
        return n - (n * (p / 100));
    }

    function plusPercent(n, p) {
        return n + (n * (p / 100));
    }

    function precise(x) {
        return Number.parseFloat(x).toFixed(1);
    }

    //////////// dodavanje provizije i  zaokruzivanje decimala odredjenih valuta////////////
    for (var i = 0; i < result.length; i++) {
        if (result[i].code === "EUR") {
            result[i].cash_buy = plusPercent(result[i].cash_buy, 0.25);
            result[i].cash_sell = minusPercent(result[i].cash_sell, 0.25);
        } else if (result[i].code === "USD" || result[i].code === "CHF") {
            result[i].cash_buy = minusPercent(result[i].cash_buy, 1.5);
            result[i].cash_sell = plusPercent(result[i].cash_sell, 1.5);
        } else if (result[i].code === "AUD" || result[i].code === "CAD" || result[i].code === "HRK" || result[i].code === "DKK" || result[i].code === "HUF" || result[i].code === "NOK" || result[i].code === "SEK" || result[i].code === "GBP" || result[i].code === "BAM" || result[i].code === "RUB" || result[i].code === "CNY" || result[i].code === "JPY" || result[i].code === "PLN" || result[i].code === "CZK") {
            result[i].exchange_buy = minusPercent(result[i].exchange_middle, 3);
            result[i].exchange_sell = plusPercent(result[i].exchange_middle, 3);
        }
    }
    for (var i = 0; i < result.length; i++) {
        if (result[i].code === "EUR" || result[i].code === "USD" || result[i].code === "CHF") {
            result[i].cash_buy = precise(result[i].cash_buy);
            result[i].cash_sell = precise(result[i].cash_sell);
        }
    }

    ////// formiranje niza potrebnih valuta //////
    let allocatedCurrencies = [];

    for (var i = 0; i < result.length; i++) {
        if ((result[i].code === "EUR")) {
            let currency = {};
            currency = {
                id: 0,
                slika: "img/EU.png",
                valuta: "Evro",
                oznaka: result[i].code,
                apoen: result[i].parity,
                kup: Number(result[i].cash_buy).toFixed(4),
                sre: result[i].exchange_middle,
                pro: Number(result[i].cash_sell).toFixed(4),

            };
            allocatedCurrencies.push(currency);
        }
        if ((result[i].code === "USD")) {
            let currency = {};
            currency = {
                id: 1,
                slika: "img/Flags-Icon-Set/48x48/US.png",
                valuta: "Američki Dolar",
                oznaka: result[i].code,
                apoen: result[i].parity,
                kup: Number(result[i].cash_buy).toFixed(4),
                sre: result[i].exchange_middle,
                pro: Number(result[i].cash_sell).toFixed(4),
            };
            allocatedCurrencies.push(currency);
        }
        if ((result[i].code === "CHF")) {
            let currency = {};
            currency = {
                id: 2,
                slika: "img/Flags-Icon-Set/48x48/CH.png",
                valuta: "Švajcarski Franak",
                oznaka: result[i].code,
                apoen: result[i].parity,
                kup: Number(result[i].cash_buy).toFixed(4),
                sre: result[i].exchange_middle,
                pro: Number(result[i].cash_sell).toFixed(4),
            };
            allocatedCurrencies.push(currency);
        }
        if ((result[i].code === "AUD")) {
            let currency = {};
            currency = {
                id: 3,
                slika: "img/Flags-Icon-Set/48x48/AU.png",
                valuta: "Australijski Dolar",
                oznaka: result[i].code,
                apoen: result[i].parity,
                kup: result[i].exchange_buy.toFixed(4),
                sre: result[i].exchange_middle,
                pro: result[i].exchange_sell.toFixed(4),
            };
            allocatedCurrencies.push(currency);
        }
        if ((result[i].code === "GBP")) {
            let currency = {};
            currency = {
                id: 4,
                slika: "img/Flags-Icon-Set/48x48/GB.png",
                valuta: "Funta Sterlinga",
                oznaka: result[i].code,
                apoen: result[i].parity,
                kup: result[i].exchange_buy.toFixed(4),
                sre: result[i].exchange_middle,
                pro: result[i].exchange_sell.toFixed(4),
            };
            allocatedCurrencies.push(currency);
        }
        if ((result[i].code === "CAD")) {
            let currency = {};
            currency = {
                id: 5,
                slika: "img/Flags-Icon-Set/48x48/CA.png",
                valuta: "Kanadski Dolar",
                oznaka: result[i].code,
                apoen: result[i].parity,
                kup: result[i].exchange_buy.toFixed(4),
                sre: result[i].exchange_middle,
                pro: result[i].exchange_sell.toFixed(4),
            };
            allocatedCurrencies.push(currency);
        }
        if ((result[i].code === "SEK")) {
            let currency = {};
            currency = {
                id: 6,
                slika: "img/Flags-Icon-Set/48x48/SE.png",
                valuta: "Švedska Kruna",
                oznaka: result[i].code,
                apoen: result[i].parity,
                kup: result[i].exchange_buy.toFixed(4),
                sre: result[i].exchange_middle,
                pro: result[i].exchange_sell.toFixed(4),
            };
            allocatedCurrencies.push(currency);
        }
        if ((result[i].code === "DKK")) {
            let currency = {};
            currency = {
                id: 7,
                slika: "img/Flags-Icon-Set/48x48/DK.png",
                valuta: "Danska Kruna",
                oznaka: result[i].code,
                apoen: result[i].parity,
                kup: result[i].exchange_buy.toFixed(4),
                sre: result[i].exchange_middle,
                pro: result[i].exchange_sell.toFixed(4),
            };
            allocatedCurrencies.push(currency);
        }
        if ((result[i].code === "NOK")) {
            let currency = {};
            currency = {
                id: 8,
                slika: "img/Flags-Icon-Set/48x48/NO.png",
                valuta: "Norveška Kruna",
                oznaka: result[i].code,
                apoen: result[i].parity,
                kup: result[i].exchange_buy.toFixed(4),
                sre: result[i].exchange_middle,
                pro: result[i].exchange_sell.toFixed(4),
            };
            allocatedCurrencies.push(currency);
        }
        if ((result[i].code === "HRK")) {
            let currency = {};
            currency = {
                id: 9,
                slika: "img/Flags-Icon-Set/48x48/HR.png",
                valuta: "Hrvatska Kuna",
                oznaka: result[i].code,
                apoen: result[i].parity,
                kup: result[i].exchange_buy.toFixed(4),
                sre: result[i].exchange_middle,
                pro: result[i].exchange_sell.toFixed(4),
            };
            allocatedCurrencies.push(currency);
        }
        if ((result[i].code === "BAM")) {
            let currency = {};
            currency = {
                id: 10,
                slika: "img/Flags-Icon-Set/48x48/BA.png",
                valuta: "Bosanska Marka",
                oznaka: result[i].code,
                apoen: result[i].parity,
                kup: result[i].exchange_buy.toFixed(4),
                sre: result[i].exchange_middle,
                pro: result[i].exchange_sell.toFixed(4),
            };
            allocatedCurrencies.push(currency);
        }
        if ((result[i].code === "RUB")) {
            let currency = {};
            currency = {
                id: 11,
                slika: "img/Flags-Icon-Set/48x48/RU.png",
                valuta: "Ruska Rublja",
                oznaka: result[i].code,
                apoen: result[i].parity,
                kup: result[i].exchange_buy.toFixed(4),
                sre: result[i].exchange_middle,
                pro: result[i].exchange_sell.toFixed(4),
            };
            allocatedCurrencies.push(currency);
        }
        if ((result[i].code === "CNY")) {
            let currency = {};
            currency = {
                id: 12,
                slika: "img/Flags-Icon-Set/48x48/CN.png",
                valuta: "Kineski Juan",
                oznaka: result[i].code,
                apoen: result[i].parity,
                kup: result[i].exchange_buy.toFixed(4),
                sre: result[i].exchange_middle,
                pro: result[i].exchange_sell.toFixed(4),
            };
            allocatedCurrencies.push(currency);
        }
        if ((result[i].code === "JPY")) {
            let currency = {};
            currency = {
                id: 13,
                slika: "img/Flags-Icon-Set/48x48/JP.png",
                valuta: "Japanski Jen",
                oznaka: result[i].code,
                apoen: result[i].parity,
                kup: result[i].exchange_buy.toFixed(4),
                sre: result[i].exchange_middle,
                pro: result[i].exchange_sell.toFixed(4),
            };
            allocatedCurrencies.push(currency);
        }
        if ((result[i].code === "HUF")) {
            let currency = {};
            currency = {
                id: 14,
                slika: "img/Flags-Icon-Set/48x48/HU.png",
                valuta: "Mađarska Forinta",
                oznaka: result[i].code,
                apoen: result[i].parity,
                kup: result[i].exchange_buy.toFixed(4),
                sre: result[i].exchange_middle,
                pro: result[i].exchange_sell.toFixed(4),
            };
            allocatedCurrencies.push(currency);
        }
        if ((result[i].code === "CZK")) {
            let currency = {};
            currency = {
                id: 15,
                slika: "img/Flags-Icon-Set/48x48/CZ.png",
                valuta: "Češka Kruna",
                oznaka: result[i].code,
                apoen: result[i].parity,
                kup: result[i].exchange_buy.toFixed(4),
                sre: result[i].exchange_middle,
                pro: result[i].exchange_sell.toFixed(4),
            };
            allocatedCurrencies.push(currency);
        }
        if ((result[i].code === "PLN")) {
            let currency = {};
            currency = {
                id: 16,
                slika: "img/Flags-Icon-Set/48x48/PL.png",
                valuta: "Poljski Zlot",
                oznaka: result[i].code,
                apoen: result[i].parity,
                kup: result[i].exchange_buy.toFixed(4),
                sre: result[i].exchange_middle,
                pro: result[i].exchange_sell.toFixed(4),
            };
            allocatedCurrencies.push(currency);
        }
        if ((result[i].code === "TRY")) {
            let currency = {};
            currency = {
                id: 17,
                slika: "img/Flags-Icon-Set/48x48/TR.png",
                valuta: "Turska Lira",
                oznaka: result[i].code,
                apoen: result[i].parity,
                kup: result[i].exchange_buy.toFixed(4),
                sre: result[i].exchange_middle,
                pro: result[i].exchange_sell.toFixed(4),
            };
            allocatedCurrencies.push(currency);
        }

    }
    console.log(allocatedCurrencies);
    ///////////// sortiranje po id /////////////
    // allocatedCurrencies.sort(function(a, b) {
    //     return (a.id) - (b.id);
    // });
    allocatedCurrencies.sort((a, b) => (a.id) - (b.id));

    ///////// kreiranje tabele ///////////
    window.onload = () => {
        loadTableData(allocatedCurrencies)
    }

    function loadTableData(allocatedCurrencies) {

        const tableBody = document.getElementById("tableData");
        let dataHtml = '';
        for (let currencys of allocatedCurrencies) {
            dataHtml += `<tr><td><img src=" ${currencys.slika} " /></td><td>${currencys.valuta}</td><td>${currencys.oznaka}</td><td>${currencys.apoen}</td><td>${currencys.kup}</td><td>${currencys.sre}</td><td>${currencys.pro}</td></tr>`;
        }

        tableBody.innerHTML = dataHtml;
    }
    ////////////////////////////////////////////

}

getList();







// for (let currencys of allocatedCurrencies) {
//     dataHtml += `<div class="wrap"><div class= "1"><img src=" ${currencys.slika} " </div><div class= "2">${currencys.valuta}</div><div class= "3">${currencys.oznaka}</div><div class= "4">${currencys.apoen}</div><div>${currencys.kup}</div><div>${currencys.sre}</div><div>${currencys.pro}</div></div>`;
// }