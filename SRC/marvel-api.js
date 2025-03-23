
const marvelPersonajes = { //Quiero que sea capaz de devolverme en el objeto de main la lista de imagenes de personajes
    render: () => {
        const urlAPI = 'https://gateway.marvel.com:443/v1/public/characters?ts=1&apikey=19b0d9ef00b3b84ed00c8c5d49d2ddc6&hash=7d3751c5d0981e11d7f3d676e2d5571f'; // updated to uppercase
        const container = document.querySelector('#detalles-personajes'); //llamo por id a nuestro contenedor
        let contentHTML = ''; //creo una variable vacia para almacenar el contenido HTML

        fetch(urlAPI)
            .then(res => res.json()) //transformo la respuesta en JSON
            .then((json) => {
                console.log(json, 'RES.JSON'); //imprimo en consola la respuesta
                const characters = json.data.results;
                characters.forEach(character => {
                    let url = character.thumbnail.path + '.' + character.thumbnail.extension;
                    contentHTML += `
                        <div class="character">
                            <img src="${url}" alt="${character.name}">
                            <h3>${character.name}</h3>
                        </div>`;
                });
                container.innerHTML = contentHTML;
                marvelPersonajes.addNavigation();
            });
    },
    addNavigation: () => {
        const container = document.querySelector('#detalles-personajes');
        container.insertAdjacentHTML('beforebegin', '<button id="prev">Prev</button>');
        container.insertAdjacentHTML('afterend', '<button id="next">Next</button>');

        let currentIndex = 0;
        const characters = document.querySelectorAll('.character');
        const showCharacter = (index) => {
            characters.forEach((character, i) => {
                character.style.display = i === index ? 'block' : 'none';
            });
        };

        document.getElementById('prev').addEventListener('click', () => {
            currentIndex = (currentIndex > 0) ? currentIndex - 1 : characters.length - 1;
            showCharacter(currentIndex);
        });

        document.getElementById('next').addEventListener('click', () => {
            currentIndex = (currentIndex < characters.length - 1) ? currentIndex + 1 : 0;
            showCharacter(currentIndex);
        });

        showCharacter(currentIndex);
    }
};

marvelPersonajes.render();