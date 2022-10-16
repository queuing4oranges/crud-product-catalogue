
const map = {
    "book"  :   "book_item", 
    "dvd"   :   "dvd_item", 
    "furniture" : "furniture_item"
};

function switchType(value) {
    console.log("change happen")
    let array = document.querySelectorAll(".option-field"); 

    array.forEach((node) => (node.setAttribute("style", "display: none")));
    element = document.getElementById(map[value]);
    element.style.display = "block";

}



