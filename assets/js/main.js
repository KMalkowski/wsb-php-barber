// OPEN CLOSE MOBILE MENU
const mobileMenu = document.querySelector(".mobile-menu")
const closeMobileMenu = document.querySelector(".close-mobile-menu")
const openMobileMenu = document.querySelector(".open-mobile-menu")


closeMobileMenu.addEventListener('click', ()=>{
    mobileMenu.classList.add('hidden')
})

openMobileMenu.addEventListener('click', ()=>{
    mobileMenu.classList.remove('hidden')
})

//check if the login section is in the DOM (when user logged out)
if(document.querySelector('.click-to-login')){
    //CHANGE LOGIN TO REGISTER AND THE OTHER WAY AROUND
    const loginSection = document.querySelector('#login-section')
    const registerSection = document.querySelector('#register-section')

    const clickToLogin = document.querySelector('.click-to-login')
    const clickToRegister = document.querySelector('.click-to-register')

    clickToLogin.addEventListener('click', (e)=>{
        e.preventDefault()
        registerSection.classList.add('hidden')
        loginSection.classList.remove('hidden')
    })

    clickToRegister.addEventListener('click', (e)=>{
        e.preventDefault()
        registerSection.classList.remove('hidden')
        loginSection.classList.add('hidden')
    })

    //SCROLL TO LOGIN SECTION SMOOTHLY
    const clickToScrollToLogin = document.querySelector('#login-button-scroll')
    clickToScrollToLogin.addEventListener('click', ()=>{
        smoothScrollToLogin();
    })

    //CHECK IF PASSWORDS MACH
    const password = document.querySelector('#r_password');
    const repeatPassword = document.querySelector('#repeatPassword');

    function validatePassword(){
        if(password.value !== repeatPassword.value) {
            repeatPassword.setCustomValidity("Passwords Don't Match");
        } else {
            repeatPassword.setCustomValidity('');
        }
    }

    function smoothScrollToLogin(){
        document.querySelector('#login-section').scrollIntoView({
            behavior: 'smooth'
        });
    }

    repeatPassword.onchange = validatePassword;
}

