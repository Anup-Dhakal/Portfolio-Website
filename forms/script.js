function sendMain(){
    let parms ={
        name : document.getElementById('name').value,
        email : document.getElementById('email').value,
        sybject: document.getElementById('subject').value,
        message:document.getElementById('message').value
    }
    emailjs.send('service_nfr0ndf','template_c4fqbv9',parms).then(alert('Email sent successfully!'))
}