

<form method="post" action="{{ route('search') }}">
    @csrf

    <input type="checkbox" id="vehicle1" name="" value="as">
    <label for="vehicle1"> I have a bike</label><br>
    <input type="checkbox" id="vehicle2" name="v[]" value="Car">
    <label for="vehicle2"> I have a car</label><br>
    <input type="checkbox" id="vehicle3" name="v[]" value="Boat">
    <label for="vehicle3"> I have a boat</label><br>
    <input type="text" name="janre">
    <button type="submit">sdsd</button>

</form>
