<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sincronización de Input y Checkboxes</title>
    <style>
        .genres-container {
            display: flex;
            flex-wrap: wrap;
        }
        .genre {
            margin-right: 10px;
        }
        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin: 10px 0;
        }
    </style>
</head>
<body>

    <h2>Selecciona géneros:</h2>
    
    <input type="text" id="genreInput" placeholder="Selecciona o escribe géneros..." />

    <div class="genres-container">
        <label class="genre"><input type="checkbox" value="Acción"> Acción</label>
        <label class="genre"><input type="checkbox" value="Aventura"> Aventura</label>
        <label class="genre"><input type="checkbox" value="Fantasía"> Fantasía</label>
        <label class="genre"><input type="checkbox" value="Sobrenatural"> Sobrenatural</label>
        <label class="genre"><input type="checkbox" value="Drama"> Drama</label>
        <label class="genre"><input type="checkbox" value="Misterio"> Misterio</label>
    </div>

    <script>
        // Referencias a los elementos
        const genreInput = document.getElementById('genreInput');
        const checkboxes = document.querySelectorAll('.genre input[type="checkbox"]');
        
        // Mantener una lista de géneros seleccionados en el orden de selección
        let selectedGenres = [];

        // Función para actualizar el input basado en los checkboxes marcados
        function updateInputFromCheckboxes() {
            // Recorremos los checkboxes para ajustar la lista de géneros seleccionados
            checkboxes.forEach(checkbox => {
                if (checkbox.checked && !selectedGenres.includes(checkbox.value)) {
                    // Si está marcado y no está en la lista, lo añadimos
                    selectedGenres.push(checkbox.value);
                } else if (!checkbox.checked && selectedGenres.includes(checkbox.value)) {
                    // Si está desmarcado y está en la lista, lo eliminamos
                    selectedGenres = selectedGenres.filter(genre => genre !== checkbox.value);
                }
            });

            // Actualizamos el valor del input
            genreInput.value = selectedGenres.join(', ');
        }

        // Función para actualizar los checkboxes basado en el input
        function updateCheckboxesFromInput() {
            const inputGenres = genreInput.value.split(',').map(genre => genre.trim());

            // Actualizamos los checkboxes según lo que hay en el input
            checkboxes.forEach(checkbox => {
                checkbox.checked = inputGenres.includes(checkbox.value);
            });

            // También actualizamos la lista `selectedGenres` para reflejar el nuevo orden
            selectedGenres = inputGenres;
        }

        // Evento para cuando se marcan o desmarcan los checkboxes
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', updateInputFromCheckboxes);
        });

        // Evento para cuando se edita el input manualmente
        genreInput.addEventListener('input', updateCheckboxesFromInput);
    </script>

</body>
</html>
