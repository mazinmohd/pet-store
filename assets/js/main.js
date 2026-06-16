console.log("PetVerse Loaded");

window.addEventListener("scroll", () => {

const navbar = document.querySelector(".navbar");

if(window.scrollY > 50){
navbar.style.background = "#f8fff8";
}else{
navbar.style.background = "#fff";
}

});


// const searchInput =
// document.getElementById("searchInput");

// searchInput.addEventListener("keyup", ()=>{

// let filter =
// searchInput.value.toLowerCase();

// let cards =
// document.querySelectorAll(".product-card");

// cards.forEach(card=>{

// let text =
// card.innerText.toLowerCase();

// if(text.includes(filter)){
// card.style.display="block";
// }else{
// card.style.display="none";
// }

// });

// });

function increaseQty(){

let qty =
document.getElementById("quantity");

qty.value =
parseInt(qty.value) + 1;

}

function decreaseQty(){

let qty =
document.getElementById("quantity");

if(qty.value > 1){
qty.value =
parseInt(qty.value) - 1;
}

}

