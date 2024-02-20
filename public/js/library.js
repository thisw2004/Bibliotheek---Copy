class LibraryLateFeeCalculator {

    // Calculate the late fee based on the loan date

    
    calculateLateFee(loanDate) {
        // Get the current date
        const currentDate = new Date();

        // Convert the loan date string to a Date object
        const loanDateObj = new Date(loanDate);

        // Calculate the difference in days between the current date and the loan date
        const daysDifference = Math.floor((currentDate - loanDateObj) / (1000 * 60 * 60 * 24));

        //book is within loanperiod (within 3 weeks = < 21 days)
        if (daysDifference <= 21) {
            return 0; 
        }
       
        else if (daysDifference > 21  ) {
            
            return (daysDifference - 21) * 1.65;
            //each day = €1.65
            
        }
        
        else {
            
            return "Kon boete niet berekenen,probeer opnieuw!";
        }
    }
}
