jQuery(document).ready(function($) {

    $('#load-more').click(function() {
        $.ajax({
            url: my_ajax_object.ajax_url, // URL AJAX di WordPress
            data: {
                'action': 'load_more_articles', // Nome dell'azione
                // Puoi aggiungere altri parametri qui, come il numero di pagina o il numero di articoli da caricare
            },
            success: function(data) {
                // Aggiungi gli articoli caricati al DOM
                $('#where-to-put-articles').append(data);
            },
            error: function(error) {
                // Gestisci eventuali errori
                console.log(error);
            }
        });
    });
    
});
