<!DOCTYPE html>
<html>
<head>
    <title>فرم ویرایش</title>
</head>
<style>
    .container {
        width: 300px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    h2 {
        text-align: center;
    }

    label {
        display: block;
        margin-bottom: 10px;
    }

    input[type="text"],
    input[type="number"],
    input[type="email"] {
        width: 100%;
        padding: 5px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    input[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #4CAF50;
        color: #fff;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }

</style>
<body>
<div class="container">

    <h2>فرم {{$Title}}</h2>
    @if(Session::get('success'))
        {{Session::get('success')}}
    @endif
    @if(Session::get('fail'))
        {{Session::get('fail')}}
    @endif
    <form action="{{route('update')}}" method="post">
        @csrf
        <input type="hidden" name="cid" value="{{$Info ->id}}">
        <label for="names">نام:</label>
        <input type="text" id="names" name="names" value="{{ $Info ->names }}">
        <span> @error('names'){{$message}} @enderror</span>
        <br>
        <label for="age">سن:</label>
        <input type="number" id="age" name="age" value="{{$Info ->age}}">
        <span> @error('age'){{$message}} @enderror</span>
        <br>
        <label for="email">ایمیل:</label>
        <input type="email" id="email" name="email" value="{{$Info ->email}}">
        <span> @error('email'){{$message}} @enderror</span>
        <br><br>
        <input type="submit" value="آپدیت">
    </form>
    <br><br>
</div>
</body>
</html>

