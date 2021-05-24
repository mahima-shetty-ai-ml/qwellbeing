window.onload = function () {
    document.getElementById("download")
        .addEventListener("click", () => {
            const invoice = this.document.getElementById("report");
            console.log(invoice);
            console.log(window);
            var opt = {
                
                filename: 'myreport.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'A3', orientation: 'portrait' },
                pagebreak:{after:['#card1','#card2','#card3','#card4']}
            };
            html2pdf().from(invoice).set(opt).save();
        })
}