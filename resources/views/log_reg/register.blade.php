<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #9292f3;
            margin: 7%;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .register-container {
            background: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            margin-bottom: 5px;
        }

        .form-group input, 
        .form-group select {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9ff;
        }

        .form-footer {
            margin-top: 15px;
            font-size: 14px;
        }

        .form-footer a {
            color: #007bff;
            text-decoration: none;
        }

        .form-footer a:hover {
            text-decoration: underline;
        }

        .form-actions {
            margin-top: 15px;
        }

        .form-actions button {
            background-color: #3c4858;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .form-actions button:hover {
            background-color: #2e3b47;
        }
        .text-danger{
            color: rgb(233, 14, 14);
        }
        .form-group input.error {
            border-color: red;
            background-color: rgb(240, 185, 185);
        }
    </style>
</head>
<body>
    <div class="register-container">
        <form method="POST" action="{{ route('reguser') }}">
            @csrf
            <!-- Register as -->
           <div><a href="/"><h1>BookForYou</h1></a></div>
            <!-- Name -->
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" value="{{ old('name') }}" class="{{ $errors->has('name') ? 'error' : '' }}" id="name" placeholder="Enter your name" name="name">
                <span class="text-danger">
                    @error('name')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" value="{{ old('email') }}" class="{{ $errors->has('email') ? 'error' : '' }}" id="email" placeholder="Enter your email" name="email">
                <span class="text-danger">
                    @error('email')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <!-- Phone -->
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" value="{{ old('phone') }}" class="{{ $errors->has('phone') ? 'error' : '' }}" id="phone" placeholder="Enter your phone number" name="phone">
                <span class="text-danger">
                    @error('phone')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <!-- Address -->
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" value="{{ old('address') }}" class="{{ $errors->has('address') ? 'error' : '' }}" id="address" placeholder="Enter your address" name="address">
                <span class="text-danger">
                    @error('address')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <!----collage name ---->
            <div class="form-group">
                <label for="college">College Name</label>
                <input type="text" value="{{ old('college') }}" class="{{ $errors->has('college') ? 'error' : '' }}" id="name" placeholder="Enter your college name" name="college">
                <span class="text-danger">
                    @error('college')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <!---faculty name ----->
            <div class="form-group">
                <label for="faculty">Faculty</label>
                <input type="text" value="{{ old('faculty') }}" class="{{ $errors->has('faculty') ? 'error' : '' }}" id="name" placeholder="Enter your faculty" name="faculty">
                <span class="text-danger">
                    @error('faculty')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="{{ $errors->has('password') ? 'error' : '' }}" id="password" placeholder="Enter your password" name="password">
                <span class="text-danger">
                    @error('password')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" class="{{ $errors->has('password_confirmation') ? 'error' : '' }}" id="password_confirmation" placeholder="Confirm your password" name="password_confirmation">
                <span class="text-danger">
                    @error('password_confirmation')
                       {{ $message }}
                    @enderror
                </span>
            </div>


            <!-- Already registered -->
            <div class="form-footer">
                <a href="/login">Already registered?</a>
            </div>

            <!-- Register button -->
            <div class="form-actions">
                <button type="submit">REGISTER</button>
            </div>
        </form>
    </div>
</body>
</html>