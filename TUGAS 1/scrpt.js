let display = document.getElementById('display');

// Menambahkan input ke display
function appendToDisplay(value) {
    display.value += value;
}

// Menghapus semua input pada display
function clearDisplay() {
    display.value = '';
}

// Menghitung ekspresi matematika
function calculate() {
    let expression = display.value;

    // Ganti simbol '^' dengan operator pangkat '**'
    expression = expression.replace('^', '**');

    // Evaluasi hasil
    try {
        let result = eval(expression);
        display.value = result;
    } catch (error) {
        display.value = 'Error';
    }
}