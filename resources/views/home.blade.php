<!DOCTYPE html>
<html lang="en">
@include('includes.head')
<body>
    <div>
        <p>Halo, User!</p>
        <p><strong>Mau kemana?</strong></p>
    </div>
    <div>
        <form method="GET" action="{{route('step1')}}">
            @csrf
            <div>
                <label for="dari">Dari</label>
                <input type="text" name="dari" id="dari">
            </div>
            <div>
                <label for="ke">Ke</label>
                <input type="text" name="ke" id="ke">
            </div>
            <div>
                <label for="tanggal">Tanggal Keberangkatan</label>
                <input type="date" name="tanggal" id="tanggal">
            </div>
            <div>
                <label for="penumpang">Penumpang</label>
                <select name="penumpang" id="penumpang">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
            </div>
            <div>
                <label for="kelas">Kelas</label>
                <select name="kelas" id="kelas">
                    <option value="1">Ekonomi</option>
                    <option value="2">Bisnis</option>
                    <option value="3">Eksekutif</option>
                </select>
            </div>
            <div>
                <button type="submit">Cari</button>
            </div>
    </div>
</body>
</html>
