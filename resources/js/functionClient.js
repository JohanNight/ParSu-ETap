document.addEventListener("DOMContentLoaded", function() {

    // JavaScript for CC Questions
    // Get references to the radio buttons in each group
    const cc1Answers = document.querySelectorAll('.cc1-answer1');
    const cc2Answers = document.querySelectorAll('.cc2-answer2');
    const cc3Answers = document.querySelectorAll('.cc3-answer3');

        // Add event listeners to CC1 answers
        cc1Answers.forEach(answer => {
            answer.addEventListener('click', () => {
                // Uncheck other options in the same question
                cc1Answers.forEach(otherAnswer => {
                    if (otherAnswer !== answer) {
                        otherAnswer.checked = false;
                    }
                });
            });
        });

        // Add event listeners to CC2 answers
        cc2Answers.forEach(answer => {
            answer.addEventListener('click', () => {
                // Uncheck other options in the same question
                cc2Answers.forEach(otherAnswer => {
                    if (otherAnswer !== answer) {
                        otherAnswer.checked = false;
                    }
                });
            });
        });

        // Add event listeners to CC3 answers
        cc3Answers.forEach(answer => {
            answer.addEventListener('click', () => {
                // Uncheck other options in the same question
                cc3Answers.forEach(otherAnswer => {
                    if (otherAnswer !== answer) {
                        otherAnswer.checked = false;
                    }
                });
            });
        });

    const rows = document.querySelectorAll('tbody tr');

        rows.forEach(row => {
            const radioButtons = row.querySelectorAll('input[type="radio"]');

            radioButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const questionName = button.getAttribute('name');

                    // Uncheck other options in the same question
                    radioButtons.forEach(otherButton => {
                        if (otherButton.getAttribute('name') === questionName &&
                            otherButton !== button) {
                            otherButton.checked = false;
                        }
                    });
                });
            });
        });


        
        
});
