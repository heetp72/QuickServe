// Get elements
const loginModal = document.getElementById('loginModal');
const signupModal = document.getElementById('signupModal');
const loginBtn = document.getElementById('loginBtn');
const signupBtn = document.getElementById('signupBtn');
const closeLogin = document.getElementById('closeLogin');
const closeSignup = document.getElementById('closeSignup');
const toSignup = document.getElementById('toSignup');
const toLogin = document.getElementById('toLogin');
// Signup form validation
const signupForm = document.getElementById('signupForm');
const password = document.getElementById('password');
const confirmPassword = document.getElementById('confirmPassword');
const passwordError = document.getElementById('passwordError');

// Open login modal
loginBtn.onclick = function() {
    loginModal.style.display = "flex";
}

// Open signup modal
signupBtn.onclick = function() {
    signupModal.style.display = "flex";
}

// Close login modal
closeLogin.onclick = function() {
    loginModal.style.display = "none";
}

// Close signup modal
closeSignup.onclick = function() {
    signupModal.style.display = "none";
}

// Switch from login to signup
toSignup.onclick = function(e) {
    e.preventDefault();
    loginModal.style.display = "none";
    signupModal.style.display = "flex";
}

// Switch from signup to login
toLogin.onclick = function(e) {
    e.preventDefault();
    signupModal.style.display = "none";
    loginModal.style.display = "flex";
}

// Close modal when clicking outside of the modal
window.onclick = function(event) {
    if (event.target === loginModal) {
        loginModal.style.display = "none";
    }
    if (event.target === signupModal) {
        signupModal.style.display = "none";
    }
}

