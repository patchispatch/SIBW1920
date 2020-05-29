import InstantSearch from "./InstantSearch.js";

const searchEvents = document.querySelector("#searchEvents");
const instantSearchEvents = new InstantSearch(searchEvents, {
    resultParser: () => {},
    templateFunction: () => {}
});

