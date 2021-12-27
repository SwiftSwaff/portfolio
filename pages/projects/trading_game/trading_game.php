<main>
    <section>
        <button id='display-get-panel'>GET Requests</button>
        <button id='display-post-panel'>POST Requests</button>
        <div id='get-panel' class='panel'>
            <h2>Valid Requests</h2>
            <ul>
                <li>user/index</li>
                <li>user/show?user_id=</li>
                <li>user/show?username=</li>
                <li>offer/index</li>
                <li>offer/random</li>
                <li>offer/show?item_id=</li>
                <li>offer/show?user_id=</li>
                <li>offer/show?username=</li>
                <li>offer/show?lowprice=&highprice=</li>
                <li>offer/remove?offer_id=</li>
            </ul>
            <label for='api-request'>https://swiftswaff.com/trading-game/api/</label>
            <input type='text' id='api-request'/>
            <button id='get-request'>GET</button>
        </div>
        <div id='post-panel' class='panel' style='display: none;'>
            <h2>Create Offer</h2>
            <form id='create-offer'>
                <label for='user_id'>User ID</label>
                <input type='text' name='user_id'/>
                <label for='item_id'>Item ID</label>
                <input type='text' name='item_id'/>
                <label for='price'>Price</label>
                <input type='text' name='price'/>
                <input type='submit' value='Submit'/>
            </form>
            <h2>Buy Offer</h2>
            <form id='buy-offer'>
                <label for='offer_id'>Offer ID</label>
                <input type='text' name='offer_id'/>
                <label for='buyer_id'>Buyer ID</label>
                <input type='text' name='buyer_id'/>
                <input type='submit' value='Submit'/>
            </form>
        </div>
        <pre id='api-response'></pre>
        <script type='text/javascript' src='/js/trading_game.js'></script>
    </section>
</main>