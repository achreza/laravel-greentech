<!DOCTYPE html>
<html>

<head>
    <title>Google SignIn</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
    <!-- load bootstrap css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <!-- load fontawesome -->
    <style>
        body {
            padding-top: 70px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="jumbotron">
            <h1 class="text-primary text-center"><span class="fa fa-user"></span> Profile Information</h1>
            <div class="row">
                <div class="col-sm-6">
                    <div class="well">
                        <form action="/auth/register" method="post" name="register_form">
                            <label for="email">Email : </label>
                            <input name="email" type="email" value="<%= user.emails[0].value %>" readonly />
                            <br />
                            <label for="fullname">Full Name : </label>
                            <input name="fullname" id="fullname" type="text" />
                            <br />
                            <label for="phone_number">Phone Number : </label>
                            <input name="phone_number" id="phone_number" type="number" />
                            <br />
                            <label for="institution">Institution : </label>
                            <input name="institution" id="institution" type="text" />
                            <br />
                            <label for="country">Choose a Country:</label>
                            <select name="country" id="country" name="country">
                                <option value="volvo">Volvo</option>
                                <option value="saab">Saab</option>
                                <option value="fiat">Fiat</option>
                                <option value="audi">Audi</option>
                            </select>
                            <br />
                            <label for="gender">Select your Gender:</label>
                            <select name="gender" id="gender" name="gender">
                                <option value="volvo">Man</option>
                                <option value="saab">Woman</option>
                            </select>
                            <br />
                            <label for="category">Select your category:</label>
                            <select name="category" id="category" name="category">
                                <option value="2">Presenter</option>
                                <option value="3">Participant</option>
                            </select>
                            <br />
                            <input type="submit" value="Register" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
