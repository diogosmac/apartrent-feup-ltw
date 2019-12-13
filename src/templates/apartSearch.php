    <form class="apartmentSearch" action="search.php" method="GET">
        <div class="flex-container">
            <div>
                <h2>Rent your apartment now!</h2>
            </div>
            <div><label>WHERE</label></div>
            <div> <input class="data" type="text" name="location"></div>
            <div><label>CHECKIN </label></div>
            <div><input class="data" type="date" name="checkIn"></div>
            <div><label>CHECKOUT</label></div>
            <div><input class="data" type="date" name="checkOut"></div>
            <div><button class="button" id="submit" type="submit">Go!</button></div>
            <div id="surprise">or ... <input class="button" name="random" type="submit" value="Surprise me!" formaction="random.php"></div>
        </div>
    </form>
