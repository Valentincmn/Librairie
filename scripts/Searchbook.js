// Attendre que le document soit chargé avant d'exécuter le code
document.addEventListener('DOMContentLoaded', function() {
    // Clé API Google Books
    const apiKey = 'AIzaSyCDlaD9oLECRLbK6CD26W7hkkqDf9oAV7s'; 

    // Écouteur d'événement sur le bouton de recherche
    document.getElementById('searchButton').addEventListener('click', function() {
        // Récupérer le terme de recherche
        const query = document.getElementById('search').value;
        
        // Appel à l'API Google Books
        fetch(`https://www.googleapis.com/books/v1/volumes?q=${query}&key=${apiKey}`)
            .then(response => response.json())
            .then(data => {
                // Récupérer la div des résultats
                const resultsDiv = document.getElementById('results');
                // Effacer les résultats précédents
                resultsDiv.innerHTML = '';
                
                // Pour chaque livre trouvé
                data.items.forEach(item => {
                    const book = item.volumeInfo;
                    const bookElement = document.createElement('div');
                    // Gérer l'image de couverture (avec image par défaut si non disponible)
                    const thumbnail = book.imageLinks ? book.imageLinks.thumbnail : 'placeholder.jpg';
                    
                    // Créer l'élément HTML pour le livre
                    bookElement.classList.add('book');
                    bookElement.innerHTML = `
                        <img src="${thumbnail}" alt="Couverture du livre">
                        <h2>${book.title}</h2>
                        <p>Auteur(s): ${book.authors ? book.authors.join(', ') : 'N/A'}</p>
                    `;
                    
                    // Ajouter le livre à la liste des résultats
                    resultsDiv.appendChild(bookElement);
                });
            })
            .catch(error => console.error('Erreur:', error));
    });
});


