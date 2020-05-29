import InstantSearch from "./InstantSearch.js";

const searchEvents = document.querySelector("#searchEvents");
const instantSearchEvents = new InstantSearch(searchEvents, {
    templateFunction: (result) => {
        let b;
        if(result.publicado == 0) {
            b = "Borrador";
        }
        else {
            b = "Evento";
        }
        
        return `
            <div class="instant-search__title">${result.titulo}</div>
            <p class="instant-search__paragraph">${b}</div>
        `;
    }
});

