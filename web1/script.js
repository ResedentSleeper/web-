(function() {

	const Y_ARR = [-5, -4, -3, -2, -1, 0, 1, 2, 3];
	const R_ARR = [1, 2, 3, 4, 5];


	let msg = document.getElementById('msg');
    let submit = document.getElementById('submit-btn');
    let xText = document.getElementById("X");
    let yRadio = document.querySelectorAll('input[name="Y"]');
    let rRadio = document.querySelectorAll('input[name="R"]');

    submit.addEventListener("click", onSubmit);

    function onSubmit(event) {
    if (!(checkX() && checkY() && checkR())) 
    	event.preventDefault(); 
}

    function setMsg(msg_) {
    msg.innerText = msg_;
    if (msg_ != null)
      msg.classList.remove("hidden");
    else
      msg.classList.add("hidden");
  }

 
   function checkX() {
    xText.value = xText.value.trim();

    if (xText.value.length === 0) {
      setMsg("Поле X обязательно");
      return false;
    }

    if (isNaN(xText.value.replace(',', '.'))) {
      setMsg("В поле X следует ввести число");
      return false;
    }
    let val = +xText.value;
    if (val <= -5 || val >= 3) {
      setMsg('X должен лежать в диапазоне (-5...3)');
      return false;
    }
    return true;
    setMsg("(ﾉ◕ヮ◕)ﾉ*:･ﾟ✧Вау можно проверить данные✧ﾟ･: *ヽ(◕ヮ◕ヽ)");
  }

 
  function checkY() {
    for (let i = 0; i < yRadio.length; i++) {
      if (yRadio[i].checked) {
      	return true;
      }
    }
    setMsg("Параметр Y обязателен!");
    return false;
  } 


  function checkR() {
    for (let i = 0; i < rRadio.length; i++) {
      if (rRadio[i].checked) {
      	return true;
      }
    }
    setMsg("Параметр R обязателен!");
    return false;
  }
})();
