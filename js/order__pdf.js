document.getElementById('generate-pdf').addEventListener('click', function() {
    // Создание нового экземпляра jsPDF
    var doc = new jspdf.jsPDF('l','','a4');

    // Загрузка шрифта Liberation Sans
    var fontUrl = '/fonts/LiberationSans-Regular.ttf'; // Путь к файлу шрифта
    var font = new FontFace('Liberation Sans', `url(${fontUrl})`); 
    
    // Добавление шрифта в документ
    font.load().then(function(loadedFont) {
        document.fonts.add(loadedFont);
        // Добавление шрифта в jsPDF
        doc.addFont(fontUrl, 'Liberation Sans', 'normal');

        // Установка шрифта
        doc.setFont('Liberation Sans');
        // Добавление текста на русском
        doc.text('Заказ сформирован:', 10, 10);
        // Сохранение PDF
        doc.save('example.pdf');
    });
});