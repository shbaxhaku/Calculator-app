
        console.log("ka hyre");
        // Function that display value
       function dis(val) {
        document.getElementById("result").value += val
    }

        function myFunction(event) {
        if (event.key == '0' || event.key == '1'
        || event.key == '2' || event.key == '3'
        || event.key == '4' || event.key == '5'
        || event.key == '6' || event.key == '7'
        || event.key == '8' || event.key == '9'
        || event.key == '+' || event.key == '-'
        || event.key == '*' || event.key == '/')
        document.getElementById("result").value += event.key;
    }


        // Function that evaluates the digit and return result
        function solve() {
        let expression = document.getElementById("result").value;
        let result = math.evaluate(expression);
        document.getElementById("result").value = result
        document.getElementById("hiddenExpression").value = expression;
        document.getElementById("hiddenResult").value = result;
        let data = {
        expression: expression,
        result: result
    };
        fetch('/calculate',{
        method:'POST',
        headers:{
        'Content-Type': 'application/json',
        'Accept': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    },
        body: JSON.stringify(data)
    }).then(response => response.json())
        .then(data => {
        console.log('Success:', data);
    })
        .catch((error) => {
        console.error('Error:', error);
    });


    }

        // Function that clear the display
        function clr() {
        document.getElementById("result").value = ""
    }
