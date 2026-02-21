let transactionCount = 0;
const alertContainer = document.getElementById('alert-container');
const historyList = document.getElementById('sessionHistory');
const sessionCountEl = document.getElementById('sessionCount');

const dateInput = document.getElementById('date');
function setDate() {
    const today = new Date();

    const y = today.getFullYear();
    const m = String(today.getMonth() + 1).padStart(2, '0');
    const d = String(today.getDate()).padStart(2, '0');

    const dateToday = `${y}-${m}-${d}`;

    dateInput.value = dateToday;
}
setDate()

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

function displaySuccessData(response) {
    // Mengambil data dari struktur response Laravel
    const transaction = response.data;
    const type = response.type;
    const isIncome = type === 'income';
    const transactionDate = new Date(transaction.transaction_date).toLocaleString("id-ID", {
        day: "2-digit",
        month: "long",
        year: "numeric",
    });

    const display = document.createElement('div');
    display.id = 'display-success-data';

    display.innerHTML = `
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-md p-4 animate-fade-in">
            <div class="bg-white dark:bg-gray-800 w-full max-w-md rounded-3xl shadow-2xl overflow-hidden animate-scale-up">
                <div class="${isIncome ? 'bg-green-500' : 'bg-blue-500'} p-8 text-center text-white relative">
                    <div class="w-20 h-20 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4 border-4 border-white/30">
                        <i class="fa-solid fa-check text-4xl"></i>
                    </div>
                    <h2 class="text-2xl font-bold uppercase tracking-tight">${response.message}</h2>
                </div>
                <div class="p-8">
                    <div class="space-y-4 text-sm">
                        <div class="flex justify-between border-b dark:border-gray-700 pb-3">
                            <span class="text-gray-500 dark:text-gray-400">Tanggal</span>
                            <span class="font-bold text-gray-900 dark:text-white">${transactionDate}</span>
                        </div>
                        <div class="flex justify-between border-b dark:border-gray-700 pb-3">
                            <span class="text-gray-500 dark:text-gray-400">Nominal</span>
                            <span class="font-bold text-gray-900 dark:text-white">Rp ${Number(transaction.nominal).toLocaleString('id-ID')}</span>
                        </div>
                        <div class="flex justify-between border-b dark:border-gray-700 pb-3">
                            <span class="text-gray-500 dark:text-gray-400">Catatan</span>
                            <span class="font-bold text-gray-900 dark:text-white">${transaction.notes || '-'}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-500 dark:text-gray-400">Status</span>
                            <span class="font-bold ${isIncome ? 'text-green-600' : 'text-blue-600'} capitalize">${type}</span>
                        </div>
                    </div>
                    <button id="closeDisplay" class="w-full mt-10 py-4 bg-gray-900 dark:bg-gray-700 text-white rounded-2xl font-extrabold hover:bg-black transition-all">Selesai</button>
                </div>
            </div>
        </div>
    `;

    document.body.appendChild(display);
    // Button Close
    display.querySelector('#closeDisplay').onclick = () => {
        display.remove();
    };
}

// --- UPDATE HISTORY ---
function addToHistory(response) {
    const transaction = response.data;
    const type = response.type;
    const transactionDate = new Date(transaction.transaction_date).toLocaleString("id-ID", {
        day: "2-digit",
        month: "long",
        year: "numeric",
    });

    const isIncome = type === 'income';

    if (transactionCount === 0) historyList.innerHTML = '';

    transactionCount++;
    sessionCountEl.textContent = `${transactionCount} Data`;

    const html = `
        <div class="bg-white dark:bg-gray-800 p-5 rounded-2xl border border-gray-200 dark:border-gray-700 flex justify-between items-center shadow-sm hover:shadow-md transition-all animate-slide-in">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl flex items-center justify-center ${isIncome ? 'bg-green-100 text-green-600 p-0.5' : 'bg-red-100 text-red-600 p-0.5'}">
                    <i class="fa-solid ${isIncome ? 'fa-arrow-up' : 'fa-arrow-down'}"></i>
                </div>
                <div>
                    <h4 class="font-bold text-gray-800 dark:text-white">Kategori: ${transaction.category.name}</h4>
                    <p class="text-xs text-gray-400">${transactionDate}</p>
                </div>
            </div>
            <div class="text-right">
                <p class="font-black text-lg ${isIncome ? 'text-green-600' : 'text-red-600'}">
                    ${isIncome ? '+' : '-'} Rp ${Number(transaction.nominal).toLocaleString('id-ID')}
                </p>
                <p class="text-xs text-gray-500 italic truncate max-w-[150px]" title="${transaction.notes || ''}">
                    ${transaction.notes || '-'}
                </p>
            </div>
        </div>
    `;

    historyList.insertAdjacentHTML('afterbegin', html);
}

// --- FORM SUBMISSION ---
document.getElementById('transactionForm').addEventListener('submit', async function(e) {
    e.preventDefault();

    const submitBtn = document.getElementById('submitBtn');
    const originalContent = submitBtn.innerHTML;
    const form = this;
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
        category: formData.get('category'),
        nominal: formData.get('nominal'),
        notes: formData.get('description'),
        date: formData.get('date'),
        type: formData.get('type')
    }

    const dataJson = JSON.stringify(data)

    try {
        const response =  await fetch(route, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: dataJson
        })

        const data = await response.json();

        if (!response.ok) {
            throw new Error(data.message || "Server Error!")
        }

        function resetCategoryList() {
            const categoryEl = document.getElementById('category');
            categoryEl.innerHTML = '<option value="">Pilih Kategori</option>';
            categoryEl.disabled = true;
        }

        // Display Data
        displaySuccessData(data);
        addToHistory(data);
        showAlert(data.message);

        // Reset Default
        form.reset();
        setDate();
        resetCategoryList();
    } catch (err) {
        console.error(err);
        showAlert(err.message, 'error');
    } finally {
        typed.destroy();
        submitBtn.disabled = false;
        submitBtn.innerHTML = originalContent;
    }
});
