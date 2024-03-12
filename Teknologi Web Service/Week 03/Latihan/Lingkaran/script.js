function calculate() {
    // Ambil nilai radius
    var radiusValue = parseFloat(document.getElementById('radius').value);

    // Hitung area dan circumference
    var areaValue = Math.PI * Math.pow(radiusValue, 2);
    var circumferenceValue = 2 * Math.PI * radiusValue;

    // Tampilkan nilai pada tabel
    document.getElementById('areaValue').innerText = areaValue.toFixed(2);
    document.getElementById('circumferenceValue').innerText = circumferenceValue.toFixed(2);

    // Tampilkan tabel
    var table = document.getElementById('result-table');
    table.classList.remove('hidden');
}