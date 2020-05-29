class InstantSearch {
    constructor(instantSearch, options) {
        this.options = options;
        this.elements = {
            main: instantSearch,
            input: instantSearch.querySelector(".instant-search__input"),
            resultsContainer: document.createElement("div"),
        }

        this.elements.resultsContainer.classList.add("instant-search__results-container");
        this.elements.main.appendChild(this.elements.resultsContainer);

        this.addListeners();
    }

    addListeners() {
        let delay;

        this.elements.input.addEventListener("input", () => {
            clearTimeout(delay);
            
            const query = this.elements.input.value;

            delay = setTimeout(() => {
                if(query.lehgth < 3) {
                    this.populateResults([]);
                    return;
                }

                let that = this;
                $.ajax({
                    data: {query},
                    url: "/search",
                    type: "get",
                    beforeSend: function() {
                        that.setLoading(true);
                    },
                    success: function(results) {
                        console.log("Todo bien");
                        that.populateResults(results);
                        that.setLoading(false);
                    }
                })
            }, 500);
        })
    }

    populateResults(results) {
        console.log("Resultados:");
        console.log(results);
    }

    setLoading(b) {
        this.elements.main.classList.toggle("instant-search__loading", b)
    }
}

export default InstantSearch;