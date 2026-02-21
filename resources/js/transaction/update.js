const alertContainer = document.getElementById('alert-container');

function showAlert(message, type) {
    const isError = type === 'error';
    const baseClass = "p-4 mb-4 rounded-xl flex items-center gap-3 animate-fade-in shadow-md border";
    const typeClass = isError
        ? 'bg-red-50 text-red-700 border-red-200 dark:bg-red-900/20 dark:text-red-400 dark:border-red-800'
        : 'bg-green-50 text-green-700 border-green-200 dark:bg-green-900/20 dark:text-green-400 dark:border-green-800';

    const icon = isError ? 'fa-circle-exclamation' : 'fa-circle-check';

    alertContainer.innerHTML = `
        <div class="${baseClass} ${typeClass}">
            <i class="fa-solid ${icon} text-lg"></i>
            <span class="font-medium">${message}</span>
        </div>
    `;
    setTimeout(() => { alertContainer.innerHTML = ''; }, 4000);
}

function showSuccess(response) {
    const display = document.createElement('div');
    display.id = 'display-success-data';

    display.innerHTML = `
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-md p-4 animate-fade-in">
            <div class="p-8 text-center text-white relative rounded-xl bg-green-500">
                <div class="w-20 h-20 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4 border-4 border-white/30">
                    <i class="fa-solid fa-check text-4xl"></i>
                </div>
                <h2 class="text-2xl font-bold uppercase tracking-tight">${response.message}</h2>
                <div>
                    <button type="button" id="closeDisplay" class="bg-white/50 p-2 text-lg font-bold text-green-900 mt-4 rounded-md">Selesai</button>
                </div>
            </div>
        </div>
    `;

    document.body.appendChild(display)
    // Button Close
    display.querySelector('#closeDisplay').onclick = () => {
        display.remove();
    };
}

document.getElementById('transactionForm').addEventListener('submit', async function(e) {
    e.preventDefault();

    const submitBtn = document.getElementById('submitBtn');
    const originalContent = submitBtn.innerHTML;
    const formData = new FormData(this);
    const route = document.querySelector('meta[name="route"]').content;

    // Loading State with Typed.js
    submitBtn.disabled = true;
    submitBtn.innerHTML = `
        <span>Menyimpan</span><span id="typed-dots"></span>
    `;

    const typed = new Typed('#typed-dots', {
        strings: ['...', '...'],
        typeSpeed: 100,
        loop: true,
        showCursor: false
    });

    const data = {
        transaction: formData.get('transaction'),
        category: formData.get('category'),
        nominal: formData.get('nominal'),
        notes: formData.get('description'),
        date: formData.get('date'),
    }

    const dataJson = JSON.stringify(data)

    try {
        const response = await fetch(route, {
            method: 'PUT',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: dataJson
        });

        const data = await response.json();

        if (!response.ok) {
            throw new Error(data.message || "Server Error!")
        }

        showSuccess(data)

        // setTimeout(() => {
        //     location.reload()
        // }, 3000);
    } catch (err) {
        console.error(err);
        showAlert(err.message, 'error');
    } finally {
        typed.destroy();
        submitBtn.disabled = false;
        submitBtn.innerHTML = originalContent;
    }
});
