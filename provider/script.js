// Get modal element
const signInModal = document.getElementById("signInModal");

// Get button that opens the modal
const signInBtn = document.getElementById("signInBtn");

// Get the <span> element that closes the modal
const closeBtn = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
signInBtn.onclick = function() {
    signInModal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
closeBtn.onclick = function() {
    signInModal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == signInModal) {
        signInModal.style.display = "none";
    }
}
