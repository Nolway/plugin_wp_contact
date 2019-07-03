document.addEventListener('DOMContentLoaded', () => {
    displayForm();
});

const displayForm = () => {
    const contactForm = document.getElementById('fixed-contact-form');
    const contactBtn = document.getElementsByClassName('contact-btn-img');
    
    console.log(contactForm);
    contactBtn[0].addEventListener('click', function() {
        if (contactForm.style.display === 'none') {
            contactForm.style.display = 'block';
        } else {
            contactForm.style.display = 'none';
        }
    });
}