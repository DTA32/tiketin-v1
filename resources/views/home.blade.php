<!DOCTYPE html>
<html lang="en">
@include('includes.head')
<body>
    <div>
        <p>Halo, User!</p>
        <p><strong>Mau kemana?</strong></p>
    </div>
    <div>
        <form method="post" action="{{}}">
            @csrf
            <div>
                <label for="from">Dari</label>
                <input type="text" name="from" id="from">
            </div>
            <div>
                <label for="to">Ke</label>
                <input type="text" name="to" id="to">
            </div>
            <div>
                <label for="date">Tanggal Keberangkatan</label>
                <input type="date" name="date" id="date">
            </div>
            <div>
                <label for="passengers">Penumpang</label>
                <select name="passengers" id="passengers">
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
                <label for="class">Kelas</label>
                <select name="class" id="class">
                    <option value="ekonomi">Ekonomi</option>
                    <option value="bisnis">Bisnis</option>
                    <option value="eksekutif">Eksekutif</option>
                </select>
            </div>
            <div>
                <button type="submit">Cari</button>
            </div>
    </div>
</body>
</html>
