<section class="movie-bg">
    <div class="container">
        <div class="align-items-center py-4">
            <div class="p-3">
                <div class="row">
                    <div class="col-md-8">
                        <div class="d-flex shadow">

                        </div>
                        <div class="d-flex justify-content-center shadow-sm bg-light p-4 rounded">
                            <div id="seat-map">
                                <div class="text-white bg-dark bg-opacity-50 rounded w-100 py-2 text-center fw-bold">Layar</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="shadow-sm bg-light p-4 rounded">
                            <form action="#" method="post">
                                <input type="hidden" class="counter">
                                <select hidden name="seat[]" class="selected-seats"></select>
                                <div class="booking-details">
                                    <h5 class="fw-bold"> Tempat duduk yang dibeli (<span class="counter">0</span>):</h5>
                                    <ul class="selected-seats-display list-group p-0 my-3"></ul>
                                    <p>Total: <b>Rp.<span id="total">0</span></b></p>
                                    <button class="btn btn-primary fw-bold" style="background-color:#4C3575; margin: 0 auto;">Checkout</button>
                                    <div id="legend"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    jQuery(function() {
        const $cart_display = $('.selected-seats-display');
        const $cart = $('.selected-seats');
        const $counter = $('.counter');
        const $total = $('#total');
        const sc = $('#seat-map').seatCharts({
            map: [
                'eeee_eeee_eeee',
                'eeee_eeee_eeee',
                'eeee_eeee_eeee',
                'eeee_eeee_eeee',
                'eeee_eeee_eeee',
                'eeee_eeee_eeee',
                'eeee_eeee_eeee',
                'eeee_eeee_eeee',
                'eeee_eeee_eeee',
                'eeee_eeee_eeee',
                'eeee_eeee_eeee',
            ],
            seats: {
                e: {
                    price: 50000,
                    category: '',
                },
            },
            naming: {
                rows: ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K'],
                columns: ['1', '2', '3', '4', '', '5', '6', '7', '8', '', '9', '10', '11', '12'],
                getLabel: function(character, row, column) {
                    return row + column;
                },
            },
            click: function() {
                if (this.status() === 'available') {
                    $('<li class="badge badge-primary mt-2 p-2"> Seat ' + this.settings.label + '</b> | <a href="#" class="cancel-cart-item text-danger "><i class="fa-solid fa-trash text-danger"></i> Batal</a></li>')
                        .attr('data-group', 'cart-item-' + this.settings.id)
                        .data('seatId', this.settings.id)
                        .appendTo($cart_display);

                    $('<option selected>R' + (this.settings.row + 1) + ' L' + this.settings.label + ' P' + this.settings.data.price + '</option>')
                        .attr('data-group', 'cart-item-' + this.settings.id)
                        .attr('value', this.settings.id + '|' + this.settings.data.price)
                        .attr('alt', this.settings.data.price)
                        .data('seatId', this.settings.id)
                        .appendTo($cart);

                    $counter.text(sc.find('selected').length + 1);
                    $total.text(recalculateTotal(sc) + this.data().price);

                    return 'selected';
                } else if (this.status() === 'selected') {
                    $counter.text(sc.find('selected').length - 1);
                    $total.text(recalculateTotal(sc) - this.data().price);

                    $('li[data-group="cart-item-' + this.settings.id).remove();
                    $('option[data-group="cart-item-' + this.settings.id).remove();

                    return 'available';
                } else if (this.status() === 'unavailable') {
                    return 'unavailable';
                } else {
                    return this.style();
                }

            },
        });

        $cart_display.on('click', '.cancel-cart-item', function() {
            sc.get($(this).parents('li:first').data('seatId')).click();
        });

        sc.find('a.unavailable').each(function(seatId) {
            console.log(this.data());
        });
    });

    function recalculateTotal(sc) {
        let total = 0;

        sc.find('selected').each(function() {
            total += this.data().price;
        });

        return total;
    }
</script>