// Category Fetching

const chooseType = document.getElementById('type');
const categoryEl = document.getElementById('category');
let type = '';

function displayCategories(data) {
    const optionList = Array.from(data).map((el, index) => {
        const optionElement = document.createElement('option');
        optionElement.value = el.slug;
        optionElement.innerText = el.name;

        return optionElement;
    })

    return optionList;
}

chooseType.addEventListener('change', async () => {
    type = chooseType.value;

    if (!type) {
        categoryEl.innerHTML = '<option value="">Pilih Kategori</option>';
        categoryEl.disabled = true;
        return;
    }

    await fetch(`/api/transaction-type/${type}`)
    .then(response => {
        if (!response.ok) {
            throw console.error("The data entered is not the same as what was specified")
        }
        return response.json()
    })
    .then(data => {
        const categories = displayCategories(data.categories);

        category.innerHTML = '';
        category.disabled = false;
        category.append(...categories);
    })
    .catch(e => {
        console.error(e)
    })
})

// Nominal Setting
const nomInput = document.querySelector('input[name="nominal"]')
const cleave = new Cleave(nomInput, {
    numeral: true,
    numeralThousandsGroupStyle: 'thousand',
    delimiter: '.',
    numeralDecimalMark: ',',
    numeralDecimalScale: 0
});
