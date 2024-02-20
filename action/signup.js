document.addEventListener('DOMContentLoaded', function() {
    const frm1Inputs = document.querySelectorAll('.frm1 .input');
    const frm1Button = document.querySelector('#btn1');
    const frm2 = document.querySelector('.frm2');
    const backButton = document.querySelector('#btn2');

    frm1Button.addEventListener('click', function() {
      if (areInputsFilled(frm1Inputs)) {
        frm2.style.display = 'block';
        document.querySelector('.frm1').style.display = 'none';
      } else {
        alert('Mohon untuk isi semua bagian yang harus di isi sebelum lanjut');
      }
    });

    backButton.addEventListener('click', function() {
      frm2.style.display = 'none';
      document.querySelector('.frm1').style.display = 'block';
    });

    function areInputsFilled(inputs) {
      for (const input of inputs) {
        if (input.value.trim() === '') {
          return false;
        }
      }
      return true;
    }
  });


  document.addEventListener('DOMContentLoaded', function() {
    const passwordInput = document.querySelector('input[name="pas"]');
    const confirmedPasswordInput = document.querySelector('input[name="password"]');
    const signUpButton = document.querySelector('input[name="input_submit"]');

    signUpButton.addEventListener('click', function(event) {
      if (passwordInput.value !== confirmedPasswordInput.value) {
        alert('Password and Confirmed Password do not match.');
        event.preventDefault(); // Prevent form submission
      }
    });
  });