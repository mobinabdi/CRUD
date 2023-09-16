<!DOCTYPE html>
<html>
<head>
    <title>فرم اطلاعات</title>
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
    <h2>فرم اطلاعات</h2>
    @if(Session::get('success'))
        {{Session::get('success')}}
    @endif
    @if(Session::get('fail'))
        {{Session::get('fail')}}
    @endif
    <form action="/add" method="post">
        @csrf
        <label for="names">نام:</label>
        <input type="text" id="names" name="names" value="{{old('name')}}">
        <span> @error('names'){{$message}} @enderror</span>
        <br>
        <label for="age">سن:</label>
        <input type="number" id="age" name="age" value="{{old('age')}}">
        <span> @error('age'){{$message}} @enderror</span>
        <br>
        <label for="email">ایمیل:</label>
        <input type="email" id="email" name="email" value="{{old('email')}}">
        <span> @error('email'){{$message}} @enderror</span>
        <br><br>
        <input type="submit" value="ذخیره">
    </form>
    <br><br>

</div>
<table>
    <tr>
        <th>نام</th>
        <th>سن</th>
        <th>ایمیل</th>
        <th>تغییرات</th>
    </tr>
    @foreach($datas as $data)
    <tr>
        <td>{{$data ->names}}</td>
        <td>{{$data ->age}}</td>
        <td>{{$data ->email}}</td>
        <td>
            <div class="btn-group">
           <button><a href="delete/{{$data ->id}}" class="btn btn-danger btn-xs">حذف</a></button>
            <button><a href="edit/{{ $data ->id }}" class="btn btn-primary btn-xs">ویرایش</a></button>
            </div>
        </td>

    </tr>
    @endforeach
</table>
</body>
</html>
