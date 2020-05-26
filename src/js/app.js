{
    const body = document.body;
    class myDeck {
		constructor(el) {
            this.mycards = document.querySelectorAll(".my-cards .card-container");
            this.selected = null;
			this.initEvents();
		}
		initEvents() {
            this.mycards.forEach(item => {
                item.addEventListener('click', event => {
                    if(this.selected == null){
                        this.selected = item;
                        this.selectedCard(item)
                        let opponentDeck = new theirDeck();
                        let rand = Math.floor(Math.random() * opponentDeck.theircards.length);
                        opponentDeck.selectedCard(rand);
                    }
                })
            })
        }
        selectedCard(selected){
            selected.classList.add("active");
            //console.log(selected.getAttribute('data-mycard-id'));
        }
    }
    class theirDeck {
		constructor(el) {
            this.theircards = document.querySelectorAll(".their-cards .card-container");
            this.selected = null;
		}
        selectedCard(selectedId){
            let selected = document.querySelector('.card-container[data-opponentcard-id="'+selectedId+'"]');
            setTimeout(function(){ 
                selected.classList.add("active");
            }, 1000);
        }
    }
    new myDeck();
}