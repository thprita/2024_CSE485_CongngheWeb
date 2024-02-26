<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>'
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>

    <div class="container">
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
                        <?php
                        $first_names = array("John", "Mary", "David", "Dylan");
                        foreach ($first_names as $name) {
                            echo "<option value='$name'>$name</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="contact-form">
                <h2>Contact info</h2>
                <hr>
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
                        <?php
                        $countries = array(
                            "Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Anguilla",
                            "Antigua & Barbuda",
                            "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan",
                            "Bahamas", "Bahrain",
                            "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin",
                            "Bermuda", "Bhutan",
                            "Bolivia", "Bosnia & Herzegovina", "Botswana", "Brazil", "British Virgin
                        Islands", "Brunei",
                            "Bulgaria", "Burkina Faso", "Burundi", "Vietnam"
                        );
                        // You can use the $countries array in your PHP code as needed.
                        foreach ($countries as $country) {
                            echo "<option value='$country'>$country</option>";
                        }
                        ?>

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
                <h2>Optional info</h2>
                <hr>
                <div class="item">
                    <label for="" class="notes">Notes</label>
                    <textarea id="notes" name=""></textarea>
                    <script>
                        CKEDITOR.replace('notes');
                    </script>
                </div>
                <div class="item shift">
                    <label for="">Preferred Shift</label>
                    <div class="check">
                        <input type="checkbox"> Regular
                        <br>
                        </br><input type="checkbox"> Gravy Yard
                    </div>

                </div>
                <div class="item">
                    <label for="" class="active">Active?</label>
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
                        <div><i class="fa-solid fa-left-long"></i></div>
                        <div><i class="fa-solid fa-right-long"></i></div>
                    </div>
                    <div class="submit-right">
                        <div>Submit</div>
                        <div>Cancel</div>
                    </div>
                </div>
                <div>*Required</div>
            </div>
        </div>
    </div>
</body>

</html>