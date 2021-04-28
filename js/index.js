$("#owl1").owlCarousel({
    autoplay: false,
    autoplayTimeout: 3000,
    autoplayHoverPause: true,
    autoplaySpeed: 1000, 
    items: 1, 
    loop: true,
    autoHeight: false,
    responsiveClass: true,
    responsive: {
      0: {
        margin: 10,
        items: 1,
        nav: true,
        dots: true,
      },
      600: {
        margin: 10,
        items: 3,
        nav: true,
        dots: false,
      },
      1024: {
        margin: 60,
        items: 5,
        nav: true,  
        loop: false,
        dots: false,
      },
    },
  });







  /*Form de cv */
if (document.querySelector('#file')) {
  document.querySelector('#file').addEventListener('change', function(e) {
    var boxFile = document.querySelector('.boxFile');
    boxFile.classList.remove('attached');
    boxFile.innerHTML = boxFile.getAttribute("data-text");
    if(this.value != '') {
      var allowedExtensions = /(\.pdf|\.docx)$/i;
      if(allowedExtensions.exec(this.value)) {
        boxFile.innerHTML = e.target.files[0].name;
        console.log(e.target.files[0].name)
        boxFile.classList.add('attached');
      } else {
        this.value = '';
        alert('El archivo que intentas subir no está permitido.\nLos archivos permitidos son pdf o documentos Word');
        boxFile.classList.remove('attached');
      }
    }
  });
}

grecaptcha.ready(function() {
  grecaptcha.execute( '6LfQTrYaAAAAADQRiPh0EcANjnWETd3qXDh3YFIW', {action: 'homepage'}).then(function(token) {
      // Add your logic to submit to your backend server here.
      $('#google-response').val(token)
  });
});




console.log($('.boxFile').hasClass('attached'))
