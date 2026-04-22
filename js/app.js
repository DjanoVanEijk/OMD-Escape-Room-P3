// Deze functie opent de modal voor teamregistratie

function openForm() {
  document.getElementById('overform').style.display = 'block';
  document.getElementById('formmodal').style.display = 'block';
}

// Deze functie opent de modal en toont de vraag
function openModal(index) {
  // Zoek het element met de class 'box' en het bijbehorende data-index
  let box = document.querySelector(`.box[data-index='${index}']`);

  // Controleer of de vraag al beantwoord is
  if (box.classList.contains('answered')) {
    return; // Sluit de functie af als de vraag al beantwoord is
  }

  // Haal de vraag en het juiste antwoord uit de dataset van de box
  let riddleText = box.dataset.riddle;
  let correctAnswer = box.dataset.answer;

  // Zet de vraagtekst in het modalvenster
  document.getElementById('riddle').innerText = riddleText;

  // Zet het correcte antwoord in de modal, zodat we het later kunnen vergelijken
  document.getElementById('modal').dataset.answer = correctAnswer;

  // Sla de huidige box index op in de modal zodat we deze later kunnen gebruiken
  document.getElementById('modal').dataset.boxIndex = index;

  // Maak het antwoordveld leeg
  document.getElementById('answer').value = '';

  // Toon de overlay en de modal door de display-stijl te veranderen naar 'block'
  document.getElementById('overlay').style.display = 'block';
  document.getElementById('modal').style.display = 'block';
}

// Deze functie sluit de modal en de overlay
function closeModal() {
  // Zet de overlay en modal weer op 'none' zodat ze niet meer zichtbaar zijn
  document.getElementById('overlay').style.display = 'none';
  document.getElementById('modal').style.display = 'none';
  // Maak de feedback tekst leeg
  document.getElementById('feedback').innerText = '';
}
// Punten //
let punten = 0;

// Deze functie controleert of het ingevoerde antwoord correct is
function checkAnswer() {
  // Haal het antwoord van de gebruiker op uit het invoerveld en verwijder onnodige spaties
  let userAnswer = document.getElementById('answer').value.trim();

  // Haal het juiste antwoord op uit de modal
  let correctAnswer = document.getElementById('modal').dataset.answer;

  // Haal het feedback element op om de gebruiker te informeren
  let feedback = document.getElementById('feedback');

  // Vergelijk het antwoord van de gebruiker met het juiste antwoord (hoofdlettergevoeligheid negeren)
  if (userAnswer.toLowerCase() === correctAnswer.toLowerCase()) {
    // Als het antwoord juist is, geef positieve feedback
    feedback.innerText = 'Correct! Goed gedaan!';
    feedback.style.color = 'green';
    punten = punten + 1;
    
    // Voeg de 'answered' class toe aan de box zodat deze niet opnieuw geopend kan worden
    let boxIndex = document.getElementById('modal').dataset.boxIndex;
    let box = document.querySelector(`.box[data-index='${boxIndex}']`);
    box.classList.add('answered');

    // Sluit de modal na 1 seconde
    setTimeout(closeModal, 1000);

  } else {
    // Als het antwoord fout is, geef negatieve feedback
    feedback.innerText = 'Fout, probeer opnieuw!';
    feedback.style.color = 'red';
  }
  console.log(punten);
  // Ga naar volgende page //
 
function nextPage() {
  document.getElementById('nextpage').style.display = 'block';
  document.getElementById('endroom').style.display = 'block';
}

  if(punten === 3){
    setTimeout(nextPage, 1000);
  }

  let boxes = document.querySelectorAll('.box');
}

// Timer functionaliteit

let tijd = parseInt(localStorage.getItem("tijd")) || 600;

let timer;

function formatTijd(seconden) {
  let min = Math.floor(seconden / 60);
  let sec = seconden % 60;
  if (sec < 10) sec = "0" + sec;
  return min + ":" + sec;
}

function update() {
  let clock = document.getElementById("timers");
  clock.innerHTML = formatTijd(tijd);
  localStorage.setItem("tijd", tijd);
}

function end() {
  tijd--;
  update();
  
  if (tijd <= 0) {
    clearInterval(timer);
    document.getElementById("overlayverlies").style.display = "block";
  } else {
    document.getElementById("overlayverlies").style.display = "none";
  };
}

timer = setInterval(end, 1000);

// Functie om de overlay te tonen