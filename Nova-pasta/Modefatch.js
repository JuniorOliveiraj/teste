
const GetApiPokemon = () => {
    const getPokemonUrl = id => `https://pokeapi.co/api/v2/pokemon/${id}`;
    const pokemonPromises = [];
    for (let i = 1; i <= 150; i++) {
        pokemonPromises.push(fetch(getPokemonUrl(i)).then(response => {
            return response.json();
        }).catch(motivo => {
            console.log(motivo)
            console.log('then não foi');
        }));
    }

    const loading = `
     
        <div class="spinner-border text-danger" style="width:200px; height:200px;" role="status">
            <span class="sr-only" style="width:400px;" >Loading...</span>
        </div>
   
    `;


    const Cardspokemon = document.getElementById('Cardspokemon')
    Cardspokemon.innerHTML = loading;
    Promise.all(pokemonPromises).then(pokemons => {
        const ListPokemons = pokemons.reduce((accumulator, pokemon) => {
            const types = pokemon.types.map(typeInfo => typeInfo.type.name);
            accumulator += `
            <div class="col-sm-3"> 
            <div class="card" style="max-width:400px;">
                <div class="card-body">     
                <img class="card-img-top" alt="${pokemon.name}" style="width:100%;" src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/${pokemon.id}.png">
                <h2  class="card-title">${pokemon.id}. ${pokemon.name}. </h2>
                <p class="card-text">${types.join(' | ')}</p>                               
                </div>
            </div>
            </div>
        `;
            return accumulator;
        }, '');

        Cardspokemon.innerHTML = ListPokemons;
    }).catch(motivo => {
        console.log(motivo);
        console.log('then não foi');
    });
}
GetApiPokemon()