const countries = [
    { name: "Canada", continent: "North America", cities: ["Calgary","Montreal","Toronto"], photos: ["canada1.jpg","canada2.jpg","canada3.jpg"] },
    { name: "United States", continent: "North America", cities: ["Boston","Chicago","New York","Seattle","Washington"], photos: ["us1.jpg","us2.jpg"] },
    { name: "Italy", continent: "Europe", cities: ["Florence","Milan","Naples","Rome"], photos: ["italy1.jpg","italy2.jpg","italy3.jpg","italy4.jpg","italy5.jpg","italy6.jpg"] },
    { name: "Spain", continent: "Europe", cities: ["Almeria","Barcelona","Madrid"], photos: ["spain1.jpg","spain2.jpg"] }
];

// window.onload=function{
//     let con = "";
//     for (let i=0;i<countries.length;i++){
//         let somethings = document.createElement("div")
//         somethings.className = "item";
//
//         let head = document.createElement("h2");
//         h2.innerHTML = countries[i].name;
//         somethings.appendChild(head);
//
//         let place = document.createElement("p");
//         place.innerHTML = countries[i].continent;
//         somethings.appendChild(place);
//
//         let cities = document.createElement("h3");
//         cities.innerHTML = "Cities";
//         somethings.appendChild(cities);
//
//         let inner1 = document.createElement("div");
//         inner1.className = "inner-box";
//         for (let j=0;i<countries[j].cities.length;j++){
//             let city = document.createElement("p");
//             city.innerHTML = countries[i].cities[j];
//             inner1.appendChild("city");
//         }
//         somethings.appendChild(inner1);
//
//
//         let inner2 = document.createElement("div");
//         inner2.className = "inner-box";
//
//         let photo = document.createElement("h3");
//         photo.innerHTML = "Popular Photos";
//         for (let j =0;j<countries[i].photos.length;j++){
//             let img = document.createElement("img");
//             img.src = "countries[i].photos[j]";
//             img.className = "photo";
//             inner2.appendChild(img);
//         }
//         somethings.appendChild(inner2);
//
//         let buttom = document.createElement("buttom");
//         buttom.innerHTML = "Visit";
//         somethings.appendChild(buttom);
//
//         con += somethings.innerHTML;
//     }
//     let container = document.getElementsByClassName("flex-container justify");
//     container.innerHTML = con + '';
// }



window.onload = function () {
    let con = "";

    for (let i=0;i<countries.length;i++) {
        con += "<div class='item'>";
        con += "<h2>" + countries[i].name + "</h2>";
        con += "<p>" + countries[i].continent+"</p>";


        con += "<div class='inner-box'>";
        con += "<h3>Cities</h3>";
        con += "<ul>";
        for (let j=0;j<countries[i].cities.length;j++){
            con += "<li>"+ countries[i].cities[j]+"</li>";
        }
        con += "</ul>";
        con += "</div>";

        con += "<div class='inner-box'>";
        con += "<h3>Popular Photos</h3>";
        for (let j=0;j<countries[i].photos.length;j++){

            con += "<img src='images/"+ countries[i].photos[j]+ "' class='photo'>";
        }
        con += "</div>";

        con += "<button>Visit</button>";

        con += "</div>";
    }

    let container = document.getElementsByClassName("flex-container justify")[0];
    container.innerHTML = con + "";
};