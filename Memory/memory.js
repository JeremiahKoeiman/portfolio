var cards = document.querySelectorAll('.memory-card');

var hasFlippedCard = false;
var lockBoard = false;
var firstCard, secondCard;

var countFlipped = 0;
var divCountFlipped = document.getElementById('countFlipped');

var score = 0;
var maxScore = 80;
var divScore = document.getElementById('score');

divScore.innerHTML = 'Uw score is: 0';
divCountFlipped.innerHTML = 'Aantal keer geflipped: 0';

function flipCard() {
   if (lockBoard) return;
   if (this === firstCard) return;

   this.classList.add('flip');
   
   if (!hasFlippedCard){
      //first click
      countFlipped +=1;
      divCountFlipped.innerHTML = 'Aantal keer geflipped: ' + countFlipped;

      hasFlippedCard = true;
      firstCard = this;
      return;
   }
      //second click
      countFlipped +=1;
      divCountFlipped.innerHTML = 'Aantal keer geflipped: ' + countFlipped;

      hasFlippedCard = false;
      secondCard = this;

      checkForMatch();

}

function checkForMatch(){
   var isMatch = firstCard.dataset.framework === secondCard.dataset.framework;

   isMatch ? disableCards() : unflipCards();
}

function disableCards(){
   //it's a match

   score += 10;
   divScore.innerHTML = 'Uw score is: '+score;

   if (score === maxScore){
      divScore.innerHTML = '';
      divScore.innerHTML = 'Uw score is: '+score+'<br>'+'U heeft gewonnen!';
   }

   firstCard.removeEventListener('click', flipCard);
   secondCard.removeEventListener('click', flipCard);

   resetBoard();
}

function unflipCards(){
   lockBoard = true;
   //not a match

   score -= 3;
   divScore.innerHTML = 'Uw score is: '+score;

   setTimeout(() =>{
      firstCard.classList.remove('flip');
      secondCard.classList.remove('flip');

      resetBoard();
   }, 1500);
}

function resetBoard() {
   [hasFlippedCard, lockBoard] = [false, false];
   [firstCard, secondCard] = [null, null];
}

(function shuffleCards(){
   cards.forEach(card => {
      var randomPos = Math.floor(Math.random() * 12);
      card.style.order = randomPos;
   });
})();

cards.forEach(card => card.addEventListener('click', flipCard));