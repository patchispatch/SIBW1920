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
                if(query.length < 3) {
                    this.populateResults([]);
                    return;
                }

                let that = this;
                $.ajax({
                    data: {query},
                    url: "/search",
                    type: "post",
                    beforeSend: function() {
                        that.setLoading(true);
                    },
                    success: function(results) {
                        that.populateResults(results);
                        that.setLoading(false);
                    },
                    error: function() {
                        console.log("No se ha podido ejecutar correctamente la llamada del buscador.");
                    }
                })
            }, 500);
        });

        this.elements.input.addEventListener("focus", () => {
            this.elements.resultsContainer.classList.add("instant-search__results-container--visible");
        });

        this.elements.input.addEventListener("blur", () => {
            this.elements.resultsContainer.stopPropagation();
            this.elements.resultsContainer.classList.remove("instant-search__results-container--visible");   
        });
    }

    populateResults(results) {
        // Eliminar resultados anteriores
        while(this.elements.resultsContainer.firstChild) {
            this.elements.resultsContainer.removeChild(this.elements.resultsContainer.firstChild);
        }

        // Actualizar lista de resultados bajo la barra de búsqueda
        for(const result of results) {
            this.elements.resultsContainer.appendChild(this.createResultElement(result));
        }
    }

    setLoading(b) {
        this.elements.main.classList.toggle("instant-search__loading", b)
    }

    createResultElement(result) {
        const anchorElement = document.createElement("a");

        anchorElement.classList.add("instant-search__result");
        anchorElement.insertAdjacentHTML("afterbegin", this.options.templateFunction(result));
        
        if("id" in result) {
            anchorElement.setAttribute("href", "/evento/" + result.id);
        }

        return anchorElement;
    }
}

export default InstantSearch;