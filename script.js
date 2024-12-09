document.querySelector('form').addEventListener('submit', function(event) {
    const name = document.getElementById('name').value;
    const surname = document.getElementById('surname').value;
    if (!name || !surname) {
        alert('Заполните все обязательные поля!');
        event.preventDefault();
    }
});