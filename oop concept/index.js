function PartyAnimal(){
    this.x = 0;
    this.party = function(){
        this.x += 10;
        console.log(`${this.x} so far!!! `)
    }
    console.log(` Whats my x ?????? ${this.x}!!! `)
}
let an = new PartyAnimal();

let i = 0;
while(i < 10){
    an.party();
    i++;
}

