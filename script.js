document.addEventListener('DOMContentLoaded', function () {
    const buttons = document.querySelectorAll('.select-time');
    const submitButton = document.getElementById('submit-selection');
    let selectedTimes = [];

    buttons.forEach(button => {
        button.addEventListener('click', function () {
            const availableSeats = parseInt(button.getAttribute('data-available'));
            const time = button.getAttribute('data-time');

            if (availableSeats > 0) {
                // Update available seats
                const newAvailableSeats = availableSeats - 1;
                button.setAttribute('data-available', newAvailableSeats);
                button.textContent = `${time} (${newAvailableSeats} ที่นั่งเหลือ)`;

                // Mark as selected
                button.style.backgroundColor = '#45a049';
                button.style.cursor = 'not-allowed';

                // Add to selected times array
                selectedTimes.push(`${time} - ${newAvailableSeats} ที่นั่งเหลือ`);

                // Enable submit button if any time is selected
                submitButton.disabled = false;
            }
        });
    });

    submitButton.addEventListener('click', function () {
        if (selectedTimes.length > 0) {
            alert('คุณได้เลือกเวลา: \n' + selectedTimes.join('\n'));
        }
    });
});
