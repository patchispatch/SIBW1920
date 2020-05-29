import InstantSearch from "./InstantSearch.js";

const searchEvents = document.querySelector("#searchEvents");
const instantSearchEvents = new InstantSearch(searchEvents, {
    templateFunction: (result) => {
        return `
            <div class="instant-search__title">${result.titulo}</div>
            <p class="instant-search__paragraph">${result.titulo}</div>
        `;
    }
});

