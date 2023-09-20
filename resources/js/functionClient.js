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


        //to retrive the data and the populate them in each fields
        $(document).ready(function() {
            var categoryMapping = {
                'Student': 1,
                'Faculty': 2,
                'Personnel': 3,
                'Others': 4
            };
            $('#searchButton').on('click', function() {
                const csrfToken = $('meta[name="csrf-token"]').attr('content'); // Get the CSRF token from the meta tag
                const searchTerm =$('#search-id').val();
                // Send AJAX request to the server to fetch client data
                $.ajax({
                    url:'http://127.0.0.1:8000/clientSurvey/Search',
                    method: 'POST',
                    data: {'_token':csrfToken,'searchId': searchTerm },
                    dataType: 'json',
                    success: function(data) {
                        // Populate client info fields with retrieved data 
                        setTimeout(() => {
                            $('#name_of_client').val(data.name);
                            $('#gender_of_client').val(data.gender);
                            $('#age_of_client').val(data.age);
                            // Map the category string to its numeric value using categoryMapping
                            var numericCategory = categoryMapping[data.category];
                               // Set the selected option in the client_type select element based on the numeric value
                            $('#client_type').val(numericCategory);
                            
                            // Populate other fields as needed
                        }, 0);
                    },
                    error: function(xhr,status,error) {
                        console.error(error);
                        console.log("Status:", status);
                        console.error("XHR Error:", xhr);
                    }
                });
            });
        });

        // date_autofill.js
    // Get the current date in the format "YYYY-MM-DD"
    var today = new Date().toISOString().split('T')[0];

    // Set the input field's value to today's date
    document.getElementById("date_of_transaction").value = today;
        
});
