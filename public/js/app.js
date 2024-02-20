$(document).ready(function() { //js icm jquery
    //wait for the document to be fully loaded,to prevent errors
    const calculator = new LibraryLateFeeCalculator();
    //creating instance of LibraryLateFeeCalculator
    $('#calculateButton').click(function() {
        //get btn first,the the action when the buttons is clicked

        //get loandate from blade.php
        const loanDateInput = $('#loanDate').val();
        
        //caluculate the fee (add value from #loanDate with it)
        const lateFee = calculator.calculateLateFee(loanDateInput);

        //get element,display the fee with 2 decimals
        $('#lateFeeResult').text(`Boete: €${lateFee.toFixed(2)}`);
    });
});
