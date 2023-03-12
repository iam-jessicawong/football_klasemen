(() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')
  
  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      // const formData = new FormData(form);
      // const klub = formData.get('klub');
      // const kota = formData.get('kota');

      // let isKlubEmpty = klub.trim() == "" ? true : false
      // let isKotaEmpty = kota.trim() == "" ? true : false

      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }
      form.classList.add('was-validated')
    }, false)
  })
})()

function TrimText(el) {
  el.value = el.value.
  replace(/(^\s*)/gi, ""). // removes leading and trailing spaces
  replace(/[ ]{2,}/gi, " "). // replaces multiple spaces with one space
  replace(/\n +/, "\n"); // removes spaces after newlines
  return;
 }

document.addEventListener('input', function (ev) {
  if(ev.target.tagName === 'INPUT' || ev.target.tagName === 'TEXTAREA')
    TrimText(ev.target);
});

const addform = document.getElementsByTagName("form")
const closebtn = document.getElementById("close")
const showForm = () => {
  closebtn.classList.remove("d-none")
  Array.from(addform).forEach(el => {
    el.classList.remove("d-none")
  })
}

const closeForm = () => {
  closebtn.classList.add("d-none")
  Array.from(addform).forEach(el => {
    el.classList.add("d-none")
  })
}

const inputScore = document.getElementById('inputscore')
const klub1 = document.getElementsByName('klub1')[0]
const klub2 = document.getElementsByName('klub2')[0]
console.log(klub1, klub1);
const checkinput = (ev) => {
  if(klub1 && klub2 && klub1.value == klub2.value) {
    klub1.setCustomValidity("invalid")
    klub2.setCustomValidity("invalid")
    alert('klub 1 dan 2 tidak boleh sama')
    
    ev.preventDefault()
    ev.stopPropagation()
  } else {
    klub1.setCustomValidity("")
    klub2.setCustomValidity("")
  }
}

inputScore.addEventListener("change", checkinput, false)
inputScore.addEventListener("submit", checkinput, false)

console.log(klub1);