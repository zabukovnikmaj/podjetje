<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Branch office</title>
</head>
<body>
    <h1>Enter information about the branch office</h1>
    <form action="" method="POST">
        <label for="name">Branch name</label><br>
        <input type="text" name="name"><br><br>

        <label for="address">Branch address</label><br>
        <input type="text" name="address"><br><br>

        <label for="products">Products name</label><br>
        <input type="text" name="products[]"><br><br>

        <script>
            // Get the input elements
            const inputElements = document.querySelectorAll('input[name="products[]"]');

            // Get the form element
            const formElement = inputElements[0].closest('form');

            // Attach an event listener to the form element
            formElement.addEventListener('input', function(event) {
                // Check if the target of the event is an input element with the name "products[]"
                if (event.target && event.target.name === 'products[]') {
                    // Get the index of the input element in the NodeList
                    const index = Array.from(inputElements).indexOf(event.target);

                    // Check if the input element has a value
                    if (event.target.value !== '') {
                        // Check if the current input element is the last one
                        if (index === inputElements.length - 1) {
                            // Create a new empty input element
                            const newInputElement = document.createElement('input');
                            newInputElement.type = 'text';
                            newInputElement.name = 'products[]';
                            newInputElement.style.display = 'block';

                            // Insert the new input element after the current input element
                            formElement.insertBefore(newInputElement, event.target.nextSibling);
                        }
                    }

                    // Remove any empty input fields after the current input field
                    for (let i = index + 1; i < inputElements.length; i++) {
                        if (inputElements[i].value === '') {
                            formElement.removeChild(inputElements[i]);
                            inputElements[i].style.display = 'none';
                        }
                    }
                }
            });

        </script>

        <input type="submit" value="Save branch office data">
    </form>
</body>
</html>

