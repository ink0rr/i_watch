<section class="movie-bg">
    <div class="container">
        <div class="align-items-center py-4">
            <?= $breadcrumbs ?>
            <div class="row">
                <div class="col-md-8">
                    <div class="d-flex justify-content-center shadow-sm bg-light p-4 rounded">
                        <div id="seat-map">
                            <div class="text-white bg-dark bg-opacity-50 rounded w-100 py-2 text-center fw-bold">Layar</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="shadow-sm bg-light p-3 rounded">
                        <?php foreach ($movie as $row) : ?>
                            <input type="hidden" class="price" data-harga="<?= $row['price'] ?>">
                            <div class="row border-bottom border-muted">
                                <div class="col-2">
                                    <img src="<?= base_url("uploads/movies/{$row['movie_id']}.jpg") ?>" alt="Image <?= $row['movie_id'] ?>" width="100%" class="img-fluid mt-1 rounded">
                                </div>
                                <div class="col-10 ">
                                    <h5 class="mb-0 fw-bold" style="color:#4C3575">
                                        <?php if (strlen($row['title']) > 24) {
                                            $fixed = substr($row['title'], 0, 24) . '...';
                                            echo $fixed;
                                        } else {
                                            echo $row['title'];
                                        } ?>
                                    </h5>
                                    <h5 class="fw-bold mb-0">
                                        <?= $row['name'] ?>
                                    </h5>
                                    <small class="mb-0 fw-bold text-muted">
                                        <?php
                                        $date = date_create($row['start_time']);
                                        echo date_format($date, 'd M');
                                        ?> |
                                        <?php
                                        $date = date_create($row['start_time']);
                                        echo date_format($date, 'H:i');
                                        ?>

                                    </small>
                                </div>
                            </div>

                        <?php endforeach; ?>
                        <div id="legend"></div>
                    </div>
                    <div class="shadow-sm bg-light rounded mt-4">
                        <form action="<?= base_url('/reservasi/pembayaran') ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="screening_id" value="<?= $screenings['id'] ?>">
                            <input type="hidden" class="counter-val" name="total" value="">
                            <select hidden name="seat[]" class="selected-seats" multiple="multiple"></select>
                            <div class="booking-details p-1">
                                <div class="border-bottom border-muted">
                                    <h5 class="fw-bold text-muted px-3 pt-2 pb-1"> Tempat duduk yang dibeli (<span class="counter">0</span>):</h5>
                                </div>
                                <div class="px-3 pt-1 pb-3 mb-0">
                                    <ul class="selected-seats-display list-group p-0"></ul>
                                    <p>Total: Rp<b><span id="total">0</span></b>,-</p>
                                    <button class="btn btn-primary fw-bold" style="background-color:#4C3575; margin: 0 auto;">Checkout</button>
                                </div>
                            </div>
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
        const $counter_val = $('.counter-val');
        const $total = $('#total');
        const $price = $('.price').data("harga");
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
                    price: parseInt($price),
                    category: '',
                },
            },
            legend: {
                node: $('#legend'),
                items: [
                    ['e', 'available', 'Tersedia'],
                    ['e', 'unavailable', 'Sudah terisi'],
                ],
            },
            naming: {
                rows: ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K'],
                columns: ['1', '2', '3', '4', '', '5', '6', '7', '8', '', '9', '10', '11', '12'],
                getId: function(character, row, column) {
                    return row + column;
                },
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
                        .attr('value', this.settings.id)
                        .attr('alt', this.settings.data.price)
                        .data('seatId', this.settings.id)
                        .appendTo($cart);

                    $counter_val.attr('value', sc.find('selected').length + 1);
                    $counter.text(sc.find('selected').length + 1);
                    $total.text(recalculateTotal(sc) + this.data().price);

                    return 'selected';
                } else if (this.status() === 'selected') {
                    $counter_val.attr('value', sc.find('selected').length - 1);
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
        <?php foreach ($seats as $row) : ?> sc.get(['<?= $row['name'] ?>']).status('unavailable');
        <?php endforeach; ?>
    });

    function recalculateTotal(sc) {
        let total = 0;

        sc.find('selected').each(function() {
            total += this.data().price;
        });

        return total;
    }
</script>