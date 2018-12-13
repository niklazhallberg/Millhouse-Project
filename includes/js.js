let button = document.querySelector("#button");
let errorMessage = document.querySelector(".error-message");

let editForm = document.querySelector(".edit-post-form");


let required1 = document.querySelector("#heading");
let required2 = document.querySelector("#post-content");
let required3 = document.querySelector("#image");
let required4 = document.querySelector("#category");
let tooLongTitle = "<span class='error-message'>The title cannot be longer than 70 characters.</span>";
let allRequiredMessage = "<span class='error-message'>Fill in all fields please.</span>";



button.addEventListener("click", function(event){
    event.preventDefault();
    if (required1.value == "" || required2.value == "" || required3.value == "" || required4.value == "" ) {
        editForm.innerHTML = allRequiredMessage;
      } else if (required1.value.length >= 70) {
        editForm.innerHTML = tooLongTitle;
      }
});

