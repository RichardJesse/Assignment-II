const form = document.getElementById('signup-form');
form.addEventListener('submit', async function (event) {
    event.preventDefault();

    const formData = new FormData(form);
    const toastElement = new bootstrap.Toast(document.getElementById('toast'));

   
    document.getElementById('username-error').innerText = '';
    document.getElementById('email-error').innerText = '';
    document.getElementById('password-error').innerText = '';

    try {
        const response = await fetch('signUp_logic.php', {
            method: 'POST',
            body: formData
        });
        
        // console.log(response.json());
        const result = await response.json();

        const toastMessageElement = document.getElementById('toast-message');
        toastMessageElement.textContent = result.message;

        const toast = document.getElementById('toast');
        if (result.status === 'success') {
            toast.classList.remove('text-bg-danger');
            toast.classList.add('text-bg-success');
           
            window.location.href = result.redirect;
        } else {
            
            if (result.field === 'username') {
                document.getElementById('username-error').innerText = result.message;
            } else if (result.field === 'email') {
                document.getElementById('email-error').innerText = result.message;
            } else if (result.field === 'password') {
                document.getElementById('password-error').innerText = result.message;
            }

            toast.classList.remove('text-bg-success');
            toast.classList.add('text-bg-danger');
        }

        toastElement.show();

    } catch (error) {
        console.error(error);

        const toastMessageElement = document.getElementById('toast-message');
        toastMessageElement.textContent = 'An unexpected error occurred. Please try again later.';
        toastElement.show();
    }
});
