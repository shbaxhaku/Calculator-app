<x-app-layout>
    <script>

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

            var cal = document.getElementById("calcu");
            cal.onkeyup = function (event) {
                if (event.keyCode === 13) {
                    event.preventDefault();

                    solve();
                }
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
                })

            }

        // Function that clear the display
        function clr() {
            document.getElementById("result").value = ""
        }
    </script>
    <script src=
                "https://cdnjs.cloudflare.com/ajax/libs/mathjs/10.6.4/math.js"
            integrity=
                "sha512-BbVEDjbqdN3Eow8+empLMrJlxXRj5nEitiCAK5A1pUr66+jLVejo3PmjIaucRnjlB0P9R3rBUs3g5jXc8ti+fQ=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"></script>
    <script src=
                "https://cdnjs.cloudflare.com/ajax/libs/mathjs/10.6.4/math.min.js"
            integrity=
                "sha512-iphNRh6dPbeuPGIrQbCdbBF/qcqadKWLa35YPVfMZMHBSI6PLJh1om2xCTWhpVpmUyb4IvVS9iYnnYMkleVXLA=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"></script>

    <!-- For styling -->
    <style>
        table {
            border: 1px solid black;
            margin-left: auto;
            margin-right: auto;
        }

        input[type="button"] {
            width: 100%;
            padding: 20px 40px;
            background-color: green;
            color: white;
            font-size: 24px;
            font-weight: bold;
            border: none;
            border-radius: 5px;
        }

        input[type="text"] {
            padding: 20px 30px;
            font-size: 24px;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            border: 2px solid black;
        }
    </style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Calculator') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="form-group">
                        <form id="calculationForm">
                            @csrf
                            <table id="calcu">
                                <tr>
                                    <td colspan="3"><input type="text" id="result"></td>
                                    <td>
                                        <input type="button" value="c" onclick="clr()"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="button" value="1" onclick="dis('1')"
                                               onkeydown="myFunction(event)"> </td>
                                    <td><input type="button" value="2" onclick="dis('2')"
                                               onkeydown="myFunction(event)"> </td>
                                    <td><input type="button" value="3" onclick="dis('3')"
                                               onkeydown="myFunction(event)"> </td>
                                    <td><input type="button" value="/" onclick="dis('/')"
                                               onkeydown="myFunction(event)"> </td>
                                </tr>
                                <tr>
                                    <td><input type="button" value="4" onclick="dis('4')"
                                               onkeydown="myFunction(event)"> </td>
                                    <td><input type="button" value="5" onclick="dis('5')"
                                               onkeydown="myFunction(event)"> </td>
                                    <td><input type="button" value="6" onclick="dis('6')"
                                               onkeydown="myFunction(event)"> </td>
                                    <td><input type="button" value="*" onclick="dis('*')"
                                               onkeydown="myFunction(event)"> </td>
                                </tr>
                                <tr>
                                    <td><input type="button" value="7" onclick="dis('7')"
                                               onkeydown="myFunction(event)"> </td>
                                    <td><input type="button" value="8" onclick="dis('8')"
                                               onkeydown="myFunction(event)"> </td>
                                    <td><input type="button" value="9" onclick="dis('9')"
                                               onkeydown="myFunction(event)"> </td>
                                    <td><input type="button" value="-" onclick="dis('-')"
                                               onkeydown="myFunction(event)"> </td>
                                </tr>
                                <tr>
                                    <td><input type="button" value="0" onclick="dis('0')"
                                               onkeydown="myFunction(event)"> </td>
                                    <td><input type="button" value="." onclick="dis('.')"
                                               onkeydown="myFunction(event)"> </td>

                                    <!-- solve function call function solve to evaluate value -->
                                    <td><input type="button" value="=" onclick="solve()"> </td>

                                    <td><input type="button" value="+" onclick="dis('+')"
                                               onkeydown="myFunction(event)"> </td>
                                </tr>
                            </table>
                            <input type="hidden" name="hiddenExpression" id="hiddenExpression">
                            <input type="hidden" name="hiddenResult" id="hiddenResult">
                        </form>
                    </div>
                    @if (isset($result))
                                        <div>Result: {{ $result }}</div>
                                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
