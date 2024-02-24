<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>'
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <div class="form">
        <div class="basic-form">
            <h2>Basic info</h2>
            <hr>
            <div class="item">
                <label for="">EmployID</label>
                <input type="text">
            </div>
            <div class="item">
                <label for="">Last Name</label>
                <input type="text">
            </div>
            <div class="item">
                <label for="">First Name</label>
                <input type="text">
            </div>
            <div class="item">
                <label for="">Gender</label>
                <input type="radio"> Male
                <input type="radio"> Male
            </div>
            <div class="item">
                <label for="">Title</label>
                <input type="text">
            </div>
            <div class="item">
                <label for="">Suffix</label>
                <input type="text">
            </div>
            <div class="item">
                <label for="">BirthDate</label>
                <input type="text">
            </div>
            <div class="item">
                <label for="">HireDate</label>
                <input type="text">
            </div>
            <div class="item">
                <label for="">SSN # (if applicable)</label>
                <input type="text">
            </div>
            <div class="item">
                <label for="">First Name</label>
                <select name="" id="">
                    <option value="">1</option>
                </select>
            </div>
        </div>
        <div class="contact-form">
            <h2>Contact info</h2>
            <div class="item">
                <label for="">Email</label>
                <input type="text">
            </div>
            <div class="item">
                <label for="">Address</label>
                <input type="text">
            </div>
            <div class="item">
                <label for="">City</label>
                <input type="text">
            </div>
            <div class="item">
                <label for="">Region</label>
                <input type="text">
            </div>
            <div class="item">
                <label for="">Posstal Code</label>
                <input type="text">
            </div>
            <div class="item">
                <label for="">Country</label>
                <select name="" id="">
                    <option value="">1</option>
                </select>
            </div>
            <div class="item">
                <label for="">US Home Phone</label>
                <input type="text">
            </div>
            <div class="item">
                <label for="">Photo</label>
                <input type="text">
            </div>
        </div>
        <div class="optional-form">
            <div class="item">
                <label for="">Notes</label>

            </div>
            <div class="item">
                <label for="">Preferred Shift</label>
                <div class="check">
                    <input type="checkbox"> Regular
                    <input type="checkbox"> Gravy Yard
                </div>

            </div>
            <div class="item">
                <label for="">Active?</label>
                <input type="checkbox">
            </div>
            <div class="item">
                <label for="">Are you human?</label>
                <div class="human">
                    <h3>Click to change</h3>
                    <input type="text">
                </div>
            </div>
        </div>
        <div class="submit">
            <div class="top">
                <div class="submit-left">
                    <div></div>
                    <div></div>
                </div>
                <div class="submit-right">
                    <div>Submit</div>
                    <div>Cancel</div>
                </div>
            </div>
            <div>*Required</div>
        </div>
    </div>
</body>

</html>