const form = document.getElementById('login-form');
form.addEventListener('submit', async function (event) {
    event.preventDefault();

    const formData = new FormData(form);
    const toastElement = new bootstrap.Toast(document.getElementById('toast'));

    try {
        const response = await fetch('login_logic.php', {
            method: 'POST',
            body: formData
        });




        const result = await response.json();


        const toastMessageElement = document.getElementById('toast-message');
        toastMessageElement.textContent = result.message;


        const toast = document.getElementById('toast');
        if (result.status === 'success') {
            toast.classList.remove('text-bg-danger');
            toast.classList.add('text-bg-success');

        } else {
            toast.classList.remove('text-bg-success');
            toast.classList.add('text-bg-danger');
        }

        toastElement.show();
        setTimeout(() => {
            window.location.href = 'index.php';
        }, 1000);

    } catch (error) {
        console.log(error)

        const toastMessageElement = document.getElementById('toast-message');
        toastMessageElement.textContent = 'An unexpected error occurred. Please try again later.';
        toastElement.show();
    }
});