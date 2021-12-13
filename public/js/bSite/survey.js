document.getElementById('print').addEventListener('click', function() {
    var content = document.getElementById('content');
    var opt = {
            margin:       0.7,
            filename:     'survey_sheet.pdf',
            image:        { type: 'jpeg', quality: 0.98 },
            html2canvas:  { scale: 2 },
            jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
            };
    html2pdf().set(opt).from(content).save();
});