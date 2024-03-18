<form action="/hubtel" method="post">
    @csrf
    <label>
        <input name="code" value="{{\Illuminate\Support\Str::random(10)}}"/>
    </label>
    <button type="submit">submit</button>
</form>
