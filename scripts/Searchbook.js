document.addEventListener('DOMContentLoaded', function() {
    const apiKey = 'AIzaSyCDlaD9oLECRLbK6CD26W7hkkqDf9oAV7s'; 

    document.getElementById('searchButton').addEventListener('click', function() {
        const query = document.getElementById('search').value;
        fetch(`https://www.googleapis.com/books/v1/volumes?q=${query}&key=${apiKey}`)
            .then(response => response.json())
            .then(data => {
                const resultsDiv = document.getElementById('results');
                resultsDiv.innerHTML = ''; // Efface les résultats précédents
                data.items.forEach(item => {
                    const book = item.volumeInfo;
                    const bookElement = document.createElement('div');
                    const thumbnail = book.imageLinks ? book.imageLinks.thumbnail : 'placeholder.jpg'; // Utilisez une image par défaut si aucune image n'est disponible
                    bookElement.classList.add('book');
                    bookElement.innerHTML = `
                        <img src="${thumbnail}" alt="Couverture du livre">
                        <h2>${book.title}</h2>
                        <p>Auteur(s): ${book.authors ? book.authors.join(', ') : 'N/A'}</p>
                        <span class="favorite" data-book-id="${item.id}">☆</span>
                    `;
                    resultsDiv.appendChild(bookElement);
                });

                // Ajoute un événement de clic pour chaque étoile
                document.querySelectorAll('.favorite').forEach(star => {
                    star.addEventListener('click', function() {
                        const bookId = this.getAttribute('data-book-id');
                        toggleFavorite(bookId);
                        this.classList.toggle('favorited');
                    });
                });
            })
            .catch(error => console.error('Erreur:', error));
    });

    function toggleFavorite(bookId) {
        // Fonction qui permet de mettre en favoris un livre
        console.log(`Toggled favorite for book ID: ${bookId}`);
        // Permet de stocker les favoris dans le localStorage
    }
});
