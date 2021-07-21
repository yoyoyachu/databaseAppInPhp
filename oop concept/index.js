function PartyAnimal(nam){
    this.x = 0;
    this.name = nam;
    this.party = function(){
        this.x += 10;
        console.log(`${nam} = ${this.x}!!! `)
    }
}
let an = new PartyAnimal('Yachna');
an.party();
let bn = new PartyAnimal('Rishi');
bn.party();
let cn = new PartyAnimal('Niyu');
cn.party();


