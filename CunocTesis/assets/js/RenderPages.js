function loadPage(page) {
    fetch(`../../view/${page}.php`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Error al cargar la página');
            }
            return response.text();
        })
        .then(html => {
            document.getElementById('content').innerHTML = html;
        })
        .catch(error => {
            document.getElementById('content').innerHTML = '<h1>Página no encontrada</h1>';
            console.error(error);
        });
}

// Cargar la página de inicio por defecto
window.onload = () => loadPage('student-tesis');